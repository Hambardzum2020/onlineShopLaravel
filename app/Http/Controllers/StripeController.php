<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use App\ProductModel;
use App\CartModel;
use App\WishlistModel;
use App\photo_model;
use App\OrderModel;
use App\OrderDetalisModel;
use App\UserModel;
use Hash;
use Session;

class StripeController extends Controller
{
    public function stripe_show(){
        $data = UserModel::where('id', Session::get('id'))->first();
        $data1 = CartModel::where('my_id', Session::get('id'))->get();
        $sum = 0;
        foreach ($data1 as $key){
            $sum += $key->Products->price*$key->count;
        }
        Session::put('sum', $sum);
        return view('stripe')->with('sum',$sum)->with('data', $data);
    }
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $charge = Stripe\Charge::create ([
                "amount" => 100 * Session::get('sum'),
                "currency" => "amd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com."
        ]);
        if($charge['status'] == 'succeeded'){
            $order = new OrderModel();
            $order->user_id = Session::get('id');
            $order->sum = Session::get('sum');
            $order->save();
            $data = CartModel::where('my_id', Session::get('id'))->get();
            foreach($data as $key){
                $order_id = $order->id;
                $product_id = $key->product_id;
                $price = $key->Products->price;
                $count = $key->count;
                $od = new OrderDetalisModel();
                $od->order_id = $order_id;
                $od->product_id = $product_id;
                $od->count = $count;
                $od->price = $price;
                $od->save();
                CartModel::where('my_id', Session::get('id'))->delete();
                ProductModel::where('id', $product_id)->update(['count'=>$key->Products->count-$count]);
            }
            Session::flash('success', 'Payment successful!');
            return back();
        }

    }
}
