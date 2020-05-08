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
use App\OrderModel;
use App\OrderDetalisModel;
use App\MessageModel;
use Hash;
use Session;
class AdminController extends Controller
{
    function show_admin(){
        $k = Session::get('id');
        return view('admin')->with('k', $k);
    }
    function getUsers(){
        return UserModel::where('type', 'user')->get();
    }
    function send(Request $r){
        $stacox_id = $r->user_id;
        $uxarkox_id = $r->id;
        $message = $r->namak;
        $mess = new MessageModel();
        $mess->uxarkox_id = $uxarkox_id;
        $mess->stacox_id = $stacox_id;
        $mess->message = $message;
        $mess->save();
    }
    function getProducts(){
        $product = ProductModel::where('status', 0)->get();
        foreach ($product as $k){
            $url = photo_model::where('product_id', $k->id)->first();
            $k->url = $url->url;
        }
        return $product;
    }
    function updateProd($x){
        ProductModel::where('id', $x)->update(['status'=>1]);
    }

    function DeleteProd($y){
        ProductModel::where('id', $y)->delete();
    }
    function block(Request $r){
        $time = time() + ($r->time*60);
        UserModel::where('id', $r->user_id)->update(['block'=>1, 'block_time'=>$time]);
    }
}
