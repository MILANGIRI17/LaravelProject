<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public $backendPath= 'backend.';
    public $pagePath=' ';
    public function __construct()
    {
        $this->data('title','Welcome');
        $this->pagePath =$this->backendPath.'pages.';
    }
}
