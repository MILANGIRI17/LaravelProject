<?php

namespace App\Models\Product;

use App\Models\AdminUser\AdminUser;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        'title',
        'slug',
        'image',
        'price',
        'description',
        'status'
    ];

    public function postedBy(){
        return $this->belongsTo(AdminUser::class,'posted_by','id');
    }
}
