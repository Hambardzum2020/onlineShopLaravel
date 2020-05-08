<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    public $table="cart";
    public $timestamps=false;
    public function Products(){
        return $this->belongsTo('App\ProductModel','product_id', 'id');    
    }
    //public function Photos
}
