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

class OrderController extends Controller
{
    public function show_orders(){
        $data = UserModel::where('id', Session::get('id'))->first();
        return view('orders')->with('data', $data);
    }

    public function getOrders(Request $r){
        $user_id = Session::get('id');
        $user_orders = OrderModel::where('user_id', $user_id)->get();
        return $user_orders;
    }

    public function ordersDetalis($id){
        $data = UserModel::where('id', Session::get('id'))->first();
        $order_id = OrderModel::where('id', $id)->first();
        return view('/OrderDetalis')->with('order_id', $order_id)->with('data', $data);
    }
}
