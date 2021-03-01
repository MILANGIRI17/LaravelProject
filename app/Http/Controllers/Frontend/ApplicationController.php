<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicationController extends FrontendController
{

    public function index(){
         $this->data('title','Home');
        return view($this->pagePath.'home.home',$this->data);
    }
    public function contact(){
        $this->data('title','Contact');
        return view($this->pagePath.'contact.contact',$this->data);
    }
}
