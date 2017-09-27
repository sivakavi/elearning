<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $appends = array('parent_name');

    public function test()
    {
        return $this->belongsTo('App\Test');
    }

    public function getParentNameAttribute()
    {
        $parent = $this->test()->first();
        return $parent->name;
    }
}
