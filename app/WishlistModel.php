<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishlistModel extends Model
{
    public $table="wishlist";
    public $timestamps=false;
    public function Products(){
        return $this->belongsTo('App\ProductModel','product_id', 'id');    
    }
}
