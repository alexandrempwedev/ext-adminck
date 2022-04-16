<?php

namespace Xn\AdminCK\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Xn\AdminCK\CKFinderMiddleware;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class CKFinderController extends Controller
{

    public function __construct()
    {
        $authenticationMiddleware = config('ckfinder.authentication');
        
        if ($authenticationMiddleware) {
            $this->middleware($authenticationMiddleware);
        } else {
            $this->middleware(CKFinderMiddleware::class);
        }
    }

    public function requestAction(Request $request)
    {
        return app('CKConnector')->handle($request);
    }

    public function browserAction(Request $request)
    {
        return view('admin-ck::browser');
    }

}