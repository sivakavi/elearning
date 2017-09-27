<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    //
    protected $appends = array('parent_name');

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function groups()
    {
        return $this->belongsToMany('App\Group');
    }

    public function getParentNameAttribute()
    {
        $parent = $this->category()->first();
        return $parent->name;
    }

    public function questions()
    {
        return $this->hasMany('App\Question');
    }
}
