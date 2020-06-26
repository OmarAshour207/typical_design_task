<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title',
        'parent'
    ];

    // relations
    // self join to make tree
    public function parents()
    {
        return $this->hasMany(Category::class,'id','parent');
    }
}
