<?php

namespace Xn\AdminCK;

use Xn\Admin\Form\Field;

class CKEditor extends Field
{
	protected static $js = [
        '/vendor/admin-ck/ckeditor/ckeditor.js',
        '/vendor/admin-ck/ckfinder/ckfinder.js',
    ];

    protected $view = 'admin-ck::ckeditor';

    public function render()
    {
        $filebrowserUploadUrl = route('ckfinder-connector');
        $filebrowserBrowseUrl = route('ckfinder-browser');
        $this->script = <<<EOT
        CKEDITOR.replaceAll(function (textarea, config) {
            if (textarea.classList.contains("admin-ck") && !textarea.classList.contains("active")){
                textarea.classList.add("active");
                config.filebrowserBrowseUrl = '{$filebrowserBrowseUrl}?type=Files';
                config.filebrowserImageBrowseUrl = '{$filebrowserBrowseUrl}?type=Images';
                config.filebrowserUploadUrl = '{$filebrowserUploadUrl}?command=QuickUpload&type=Files';
                config.filebrowserImageUploadUrl = '{$filebrowserUploadUrl}?command=QuickUpload&type=Images';
                config.fullPage = textarea.dataset.full;
                return true;
            }
            return false;
        });
        EOT;

        return parent::render();
    }
}