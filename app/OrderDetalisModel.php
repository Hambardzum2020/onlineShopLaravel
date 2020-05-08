<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetalisModel extends Model
{
    public $table="order_detalis";
    public $timestamps=false;
    public function product(){
        return $this->belongsTo('App\ProductModel', 'product_id', 'id');
    }
}
