<?php

Route::any('/ckfinder/connector', 'Xn\AdminCK\Controllers\CKFinderController@requestAction')
    ->name('ckfinder-connector');

Route::any('/ckfinder/browser', 'Xn\AdminCK\Controllers\CKFinderController@browserAction')
    ->name('ckfinder-browser');