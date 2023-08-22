<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function category()
    {
    	return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function comments()
    {
    	return $this->hasMany('App\Models\Blog', 'blog_id');
    }
}
