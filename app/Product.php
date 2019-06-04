<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    // một sản phẩm có nhiều size
    function pro_attr()
    {
        return $this->hasMany('App\Pro_Attr','id_pro','id');
    }
}
