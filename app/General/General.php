<?php


namespace App\General;


use Illuminate\Support\Facades\Config;

trait General
{
    public $data= [];
    public function data($key,$value){
        return $this->data[$key]=$value;
    }

    public function makeTitle($backpart,$seperator=" : ",$frontpart=null){
        if(!isset($frontpart)){
            $frontpart=ucfirst(Config::get('title.company_name'));
        }
        return $frontpart.$seperator.$backpart;
    }
}
