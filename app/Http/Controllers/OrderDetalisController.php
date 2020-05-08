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
use Hash;
use Session;

class OrderDetalisController extends Controller
{
    public function show_order_detalis(Request $r){
        $order_id = $r->order_id;
        $result = OrderDetalisModel::where('order_id', $order_id)->get();
        foreach($result as $k){
            $product = ProductModel::where('id', $k->product_id)->first();
            $productPhoto = photo_model::where('product_id', $product->id)->first();
            $seler = UserModel::where('id', $product->user_id)->first();
            $k->prod_name = $product->name;
            $k->prod_des = $product->description;
            $k->prod_photo = $productPhoto->url;
            $k->seler_name = $seler->name;
            $k->seler_surname = $seler->surname;
        }
        return $result;
    }

    public function show_feedback($id){
        $order_detalis = OrderDetalisModel::where('id', $id)->first();
        $order_id = OrderModel::where('id', $order_detalis->order_id)->first();
        $data = UserModel::where('id', $order_id->user_id)->first();
        return view('/feedback')->with('order_detalis_id', $id)->with('product_id', $order_detalis->product_id)->with('data', $data);
    }

    public function getProductsDataForFeedback(Request $r){
        $order_detalis_id = $r->order_detalis_id;
        $product_id = $r->product_id;
        $productData = ProductModel::where('id', $product_id)->first();
        if($productData != null){
            $productPhoto = photo_model::where('product_id', $product_id)->first();
            $productData->photo = $productPhoto->url;
            $feedback = OrderDetalisModel::where('id', $order_detalis_id)->first();
            $productData->feedback = $feedback->feedback;
            $productData->order_detalis_id = $order_detalis_id;
            return $productData;
        }
        else{
            return "ays apranq@ chka bazayum";
        }
    }

    public function showFeedBackAll(Request $r){
        $order_detalis_id = $r->order_detalis_id;
        $product_id = $r->product_id;
        $allFeedbacks = OrderDetalisModel::where('product_id', $product_id)->where();
        foreach($allFeedbacks as $k){
            $order_id = OrderModel::where('id', $k->order_id)->first();
            $user_id = UserModel::where('id', $order_id->user_id)->first();
            $k->user_name = $user_id->name;
            $k->user_surname = $user_id->surname;
        }
        return $allFeedbacks;
    }

    public function save_feedback(Request $r){
        $order_detalis_id = $r->order_detalis_id;
        $_textarea = $r->_textarea;
        OrderDetalisModel::where('id', $order_detalis_id)->update(['feedback' => $_textarea,]);
        return $_textarea;
    }
}
