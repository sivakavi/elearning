<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    //
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function groups()
    {
        return $this->belongsToMany('App\Group');
    }
}
