<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    public function college()
    {
        return $this->belongsTo('App\College');
    }

    public function sub_categories()
    {
        return $this->belongsToMany('App\SubCategory');
    }
}
