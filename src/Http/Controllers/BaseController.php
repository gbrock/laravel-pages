<?php namespace Gbrock\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\URL;

abstract class BaseController extends Controller {
    public function __construct()
    {
        URL::setRootControllerNamespace('Gbrock\Http\Controllers');
    }
}
