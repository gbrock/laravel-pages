<?php namespace Gbrock\Pages\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;

abstract class BaseController extends Controller {
    public function __construct()
    {
        URL::setRootControllerNamespace('Gbrock\Pages\Http\Controllers');
        View::share('currentController', class_basename(get_class($this)));
    }
}
