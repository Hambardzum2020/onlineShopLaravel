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
use App\MessageModel;
use Hash;
use Session;

class CartController extends Controller
{
    public function show_product_cart(){
        $data = UserModel::where('id', Session::get('id'))->first();
        $total = 0;
        $ProductsCart1 = CartModel::where('my_id', Session::get('id'))->first();
        if($ProductsCart1 != null){
            $ProductsCart = CartModel::where('my_id', Session::get('id'))->first()->all();
            foreach($ProductsCart as $k){
                $total += $k->count * $k->Products->price;
            }
            return view('/cart')->with('ProductsCart', $ProductsCart)->with('data', $data)->with('total', $total);
        }
        else{
            return view('/cart')->with('data', $data)->with('total', $total);
        }
    }

    public function addToCart(Request $r){
        $prod_id = $r->prod_id;
        $cartProd = CartModel::where('product_id', $prod_id)->first();
        if($cartProd != null && $cartProd->my_id == Session::get('id')){
            return "1";
        }
        else{
            $user_id = ProductModel::where('id', $prod_id)->first()->user_id;
            $countDefault = 1;
            $ProductInCart = new CartModel();
            $ProductInCart->product_id = $prod_id;
            $ProductInCart->user_id = $user_id;
            $ProductInCart->count = $countDefault;
            $ProductInCart->my_id = Session::get('id');
            $ProductInCart->save();
            return Redirect::to("/home");
        }
    }

    public function getCountCartProduct(Request $r){
        $count = CartModel::where('my_id', Session::get('id'))->count();
        return $count;
    }

    public function getCountCartProductAll(Request $r){
        $count = CartModel::where('my_id', Session::get('id'))->count();
        return $count;
    }

    public function getNotification(Request $r){
        $count = MessageModel::where('stacox_id', Session::get('id'))->where('readed', 1)->count();
        return $count;
    }

    public function incrementProductInCart(Request $r){
        $prodCart_id = $r->prodCart_id;
        $subtotal = $r->subtotal;
        $count = CartModel::where('id', $prodCart_id)->first()->count;
        $product_id = CartModel::where('id', $prodCart_id)->first()->product_id;
        $newCount = $count + 1;
        $prodCount = ProductModel::where('id', $product_id)->first()->count;
        $subtotal = $subtotal + ProductModel::where('id', $product_id)->first()->price;
        if($newCount <= $prodCount){
            CartModel::where('id', $prodCart_id)->update(['count' => $newCount]);
            $prod_count = CartModel::where('id', $prodCart_id)->first()->count;
            $arr = [$subtotal, $prod_count];
            return $arr;
        }
        else{
            return '1';
        }

    }

    public function decrementProductInCart(Request $r){
        $prodCart_id = $r->prodCart_id;
        $subtotal = $r->subtotal;
        $count = CartModel::where('id', $prodCart_id)->first()->count;
        $product_id = CartModel::where('id', $prodCart_id)->first()->product_id;
        $newCount = $count - 1;
        $prodCount = ProductModel::where('id', $product_id)->first()->count;
        $subtotal = $subtotal - ProductModel::where('id', $product_id)->first()->price;
        if($newCount > 0){
            CartModel::where('id', $prodCart_id)->update(['count' => $newCount]);
            $prod_count = CartModel::where('id', $prodCart_id)->first()->count;
            $arr = [$subtotal, $prod_count];
            return $arr;
        }
        else{
            CartModel::where('id', $prodCart_id)->delete();
            return '0';
        }

    }
}
