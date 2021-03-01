<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicationController extends FrontendController
{

    public function index(){
        return view($this->pagePath.'home.home');
    }
    public function contact(){
        return view($this->pagePath.'contact.contact');
    }
}
