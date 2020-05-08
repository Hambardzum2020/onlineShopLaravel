<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    public $table="products";
    public $timestamps=false;
    public function Photos(){
        return $this->hasMany('App\photo_model','product_id', 'id');
    }
    public function Seller(){
        return $this->belongsTo('App\UserModel', 'user_id', 'id');
    }
}
