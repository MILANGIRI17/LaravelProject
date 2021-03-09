<?php

namespace App\Models\Category;

use App\Models\SubCategory\SubCategory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=[
        'cat_name',
        'slug',
        'description',
        'meta_description',
        'meta_keywords',
        'status',
        'posted_by'
    ];

    public function subCategoryData(){
        return $this->hasMany( SubCategory::class,'cat_id');
    }
}
