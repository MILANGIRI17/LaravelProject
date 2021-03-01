<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicationController extends FrontendController
{

    public function index(){
         $this->data('a',4);
        return view($this->pagePath.'home.home',$this->data);
    }
    public function contact(){
        return view($this->pagePath.'contact.contact');
    }
}
