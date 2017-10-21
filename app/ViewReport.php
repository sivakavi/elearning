<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewReport extends Model
{
    //
    protected $fillable = ['user_id','sub_category_file_id', 'sub_category_id'];

    public function subCategoryFile()
    {
        return $this->belongsTo('App\SubCategoryFile');
    }

    public function subCategory()
    {
        return $this->belongsTo('App\SubCategory');
    }
}
