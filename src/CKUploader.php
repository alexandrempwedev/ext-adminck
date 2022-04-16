<?php

namespace Xn\AdminCK;

use Xn\Admin\Form\Field;

class CKUploader extends Field
{
    public static $js = [
        '/vendor/admin-ck/ckfinder/ckfinder.js',
    ];

    protected $view = 'admin-ck::ckuploader';

    public function render()
    {
        $filebrowserUploadUrl = route('ckfinder-connector');
        $this->script = <<<EOT
function selectFileWithCKFinder( el ) {
    CKFinder.config( { connectorPath: '{$filebrowserUploadUrl}' } );
    CKFinder.popup( {
        chooseFiles: true,
        onInit: function( finder ) {
            finder.on( 'files:choose', function( evt ) {
                var url = evt.data.files.first().getUrl();
                $(el).siblings('input').val(url);
                $(el).siblings('img').attr('src',url);
            } );
            finder.on( 'file:choose:resizedImage', function( evt ) {
                $(el).siblings('input').val(evt.data.resizedUrl);
                $(el).siblings('img').val(evt.data.resizedUrl);
            } );
        }
    } );
}
$("button{$this->getElementClassSelector()}").off().on('click',function() {
    selectFileWithCKFinder(this);
});

EOT;
        return parent::render();
    }
}