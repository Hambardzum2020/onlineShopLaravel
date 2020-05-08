<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Redirect;
use App\UserModel;
use App\ProductModel;
use App\CartModel;
use App\WishlistModel;
use App\photo_model;
use Hash;
use Session;

class WishlistController extends Controller
{
    public function show_product_wishlist(){
        $data = UserModel::where('id', Session::get('id'))->first();
        $ProductsWishlist1 = WishlistModel::where('my_id', Session::get('id'))->first();
        if($ProductsWishlist1 != null){
            $ProductsWishlist = WishlistModel::where('my_id', Session::get('id'))->first()->all();
            // $product = ProductModel::where();
            return view('/wishlist')->with('ProductsWishlist', $ProductsWishlist)->with('data', $data);
        }
        else{
            return view('/wishlist')->with('data', $data);
        }
    }
    public function addToWishlist(Request $r){
        $prod_id = $r->prod_id;
        $wishProd = WishlistModel::where('product_id', $prod_id)->first();
        if($wishProd != null && $wishProd->my_id == Session::get('id')){
            return "1";
        }
        else{
            $user_id = ProductModel::where('id', $prod_id)->first()->user_id;
            $ProductInWishlist = new WishlistModel();
            $ProductInWishlist->product_id = $prod_id;
            $ProductInWishlist->user_id = $user_id;
            $ProductInWishlist->my_id = Session::get('id');
            $ProductInWishlist->save();
            return Redirect::to("/home");
        }
    }

    public function getCountWishProduct(Request $r){
        $count = WishlistModel::where('my_id', Session::get('id'))->count();
        return $count;
    }

    public function getCountWishProductAll(Request $r){
        $count = WishlistModel::where('my_id', Session::get('id'))->count();
        return $count;
    }
}
