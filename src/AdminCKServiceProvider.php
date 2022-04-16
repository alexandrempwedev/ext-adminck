<?php

namespace Xn\AdminCK;

use Illuminate\Support\ServiceProvider;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpKernel\Kernel;
use Xn\Admin\Admin;
use Xn\Admin\Form;
use CKSource\CKFinder\CKFinder;

class AdminCKServiceProvider extends ServiceProvider
{

	public function register()
	{

		$this->app->bind('CKConnector', function () {

			$ckfinder = new CKFinder(config('ckfinder', []));

			if (Kernel::MAJOR_VERSION === 4) {
                $this->setupForV4Kernel($ckfinder);
            }

			return $ckfinder;
		});
	}

	public function boot()
	{
		if ($this->app->runningInConsole()) {
		    $this->publishes([
		        __DIR__.'/../resources/assets' => public_path('vendor/admin-ck'),
		        __DIR__ . '/config.php' => config_path('ckfinder.php')
		    ], 'admin-ck');
		}

		$this->loadViewsFrom(__DIR__.'/../resources/views', 'admin-ck');
		$this->loadRoutesFrom(__DIR__ . '/routes.php');

		Admin::booting(function () {
		    Form::extend('ckeditor', CKEditor::class);
		    Form::extend('ckuploader', CKUploader::class);
		});		
	}

	protected function setupForV4Kernel($ckfinder)
	{
	    $ckfinder['resolver'] = function () use ($ckfinder) {
	        $commandResolver = new \Xn\AdminCK\Polyfill\CommandResolver($ckfinder);
	        $commandResolver->setCommandsNamespace(\CKSource\CKFinder\CKFinder::COMMANDS_NAMESPACE);
	        $commandResolver->setPluginsNamespace(\CKSource\CKFinder\CKFinder::PLUGINS_NAMESPACE);

	        return $commandResolver;
	    };

	    $ckfinder['kernel'] = function () use ($ckfinder) {
	        return new HttpKernel(
	            $ckfinder['dispatcher'],
	            $ckfinder['resolver'],
	            $ckfinder['request_stack'],
	            $ckfinder['resolver']
	        );
	    };
	}
}