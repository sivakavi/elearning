<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategoryFile extends Model
{

    protected $appends = array('parent_name');

    public function subCategory()
    {
        return $this->belongsTo('App\SubCategory');
    }

    public function getParentNameAttribute()
    {
        $parent = $this->subCategory()->first();
        return $parent->name;
    }

}
