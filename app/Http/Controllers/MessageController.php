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

class MessageController extends Controller
{
    public function show_notification(){
        $data = UserModel::where('id', Session::get('id'))->first();
        return view('/notification')->with('data', $data);
    }

    public function getNotification(Request $r){
        $stacox_id = $r->stacox_id;
        $mess = MessageModel::where('stacox_id', $stacox_id)->get();
        MessageModel::where('stacox_id', $stacox_id)->update(['readed' => 0]);
        return $mess;
    }
}
