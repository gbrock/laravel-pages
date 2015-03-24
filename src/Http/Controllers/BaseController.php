<?php namespace Gbrock\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;

abstract class BaseController extends Controller {
    public function __construct()
    {
        URL::setRootControllerNamespace('Gbrock\Http\Controllers');
        View::share('currentController', class_basename(get_class($this)));
    }
}
