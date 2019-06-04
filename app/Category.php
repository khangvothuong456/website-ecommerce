<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    // 1 danh mục cha có nhiều danh mục con
    public function child()
    {
        return $this->hasMany('App\Category','id_parent');
    }

    // 1 danh mục con chỉ thuộc 1 danh mục cha
    public function parent()
    {
        return $this->belongsTo('App\Category', 'id_parent');
    }
}
