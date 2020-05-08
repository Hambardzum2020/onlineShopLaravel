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

class ProductControllel extends Controller
{
    function addProduct(){
        $data = UserModel::where('id', Session::get('id'))->first();
        return view('addProduct')->with('data',$data);
    }

    function delete_prod(Request $r){
        //return $r->all();
        ProductModel::where('id', $r->prod_id)->delete();
    }
    function delete_photo(Request $r){
        //return $r->all();
        photo_model::where('id', $r->photo_id)->delete();
        $photoId = photo_model::where('id', $r->photo_id)->first();
        return $photoId;
    }
    function MyProduct(){
       $data = UserModel::where('id', Session::get('id'))->first();
       $myproduct1 = ProductModel::where('user_id', Session::get('id'))->where('status', 1)->first();
       if($myproduct1 != null){
           $myproduct = ProductModel::where('user_id', Session::get('id'))->first()->all();

           return view('/MyProduct')->with('myproduct', $myproduct)->with('data', $data);
       }
       else{
        return view('/MyProduct')->with('data', $data);
       }
    }

    function addProduct_server(Request $r){
        $v = Validator::make($r->all(),
            [
                "name" => "required",
                "count" => "required|integer",
                "price" => "required|integer",
                "description" => "required",
            ],
        );
    	if($v->fails()){
    		return Redirect::to("/addProduct")->withErrors($v)->withInput();
        }
    	else{
            $id = Session::get('id');
    		$addProduct = new ProductModel();
    		$addProduct->name = $r->name;
    		$addProduct->count = $r->count;
    		$addProduct->price = $r->price;
            $addProduct->description = $r->description;
            $addProduct->user_id = $id;
            $addProduct->save();
            if($r->hasFile('photo')){
                //dd($r->file('photo'));
                foreach($r->file('photo') as $image){
                    $name = time().$image->getClientOriginalName();
                    $image->move(public_path()."/img", $name);
                    $img = new photo_model();
                    $img->url = $name;
                    $img->product_id = $addProduct->id;
                    $img->save();
                }
            }
            return Redirect::to("/home");
    	}
    }

    function item($id){
        $data = UserModel::where('id', Session::get('id'))->first();
        $prod = ProductModel::where('id', $id)->first();
        $feedbacks = OrderDetalisModel::where('product_id', $prod->id)->get();
        if($feedbacks == null){
            return view('/product_item')->with('prod', $prod)->with('data', $data);
        }
        else{
            return view('/product_item')->with('prod', $prod)->with('data', $data)->with('feedbacks', $feedbacks);
        }
        // if($prod1 != null){
        //     $prod = ProductModel::where('id', $id)->first()->all();
        //     return view('/product_item')->with('prod', $prod)->with('data', $data);
        // }
        // else{
        //     return view('/product_item')->with('data', $data);
        // }
    }

    function show_editProd($id){
        $data = UserModel::where('id', Session::get('id'))->first();
        $prod = ProductModel::where('id', $id)->first();
        return view('/edit_product')->with('prod', $prod)->with('data', $data);
    }
    function edit_prod(Request $r){
        $prod_id = ProductModel::where('user_id', Session::get('id'))->first();
        $v = Validator::make($r->all(),
            [
                "name" => "required",
                "count" => "required|integer",
                "price" => "required|integer",
                "description" => "required",
            ],
        );
        // $user = UserModel::where('id', Session::get('id'))->first();
        // $email_valid = UserModel::where('email', $r->email)->where('email', '!=', $user->email)->first();
        // $v->after(function($v) use ($r, $email_valid){
        //     if($email_valid){
        //         $v->errors()->add('email', 'nman mail arden ka');
        //     }
        // });
        if($v->fails()){
            return Redirect::to('/product/edit/'.$prod_id->id)->withErrors($v)->withInput();
        }
        else{
            ProductModel::where('id', $prod_id->id)->update(['name' => $r->name, 'count' => $r->count, 'price' => $r->price,
            'description' => $r->description]);
            return Redirect::to('/product/edit/'.$prod_id->id)->withInput();
        }
    }
    function search_product(Request $r){
        $result = ProductModel::where('name', 'LIKE', '%' . $r->search . '%')->get();
        foreach ($result as $k){
            $photo = photo_model::where('product_id', $k->id)->first();
            $k->photo = $photo->url;

            $user = UserModel::where('id', $k->user_id)->first();
            $k->user_name = $user->name;
            $k->user_surname = $user->surname;

            $data = UserModel::where('id', Session::get('id'))->first();
            if($data != null){
                if($data->id == $k->user_id){
                    $k->data = "your";
                }
                else{
                    $k->data = true;
                }
            }
            else{
                $k->data = false;
            }
        }
        return $result;
    }
    function show_all_products_in_home(){
        $data = UserModel::where('id', Session::get('id'))->first();
        $myproduct = ProductModel::where('status', 1)->where('count', '>', 0)->get();
        ProductModel::where('count', 0)->delete();
        if($myproduct != null){
            return view('/home')->with('myproduct', $myproduct)->with('data', $data);
        }
        else{
            return view('/home')->with('data', $data);
        }
    }

    function show_edit_products_photos($id){
        $data = UserModel::where('id', Session::get('id'))->first();
        $prod = ProductModel::where('id', $id)->first();
        return view('/edit_products_photos')->with('data',$data)->with('prod', $prod);
    }

    public function range(Request $r){
        $minPrice = $r->minPriceRange;
        $maxPrice = $r->maxPriceRange;
        $nameProd = $r->prodNameRange;
        if($minPrice != '' && $maxPrice != '' && $nameProd != ''){
            $product = ProductModel::where('price', '<', $maxPrice)->where('price', '>', $minPrice)
            ->where('name', 'LIKE', '%' . $nameProd . '%')->get();
            foreach ($product as $k){
                $photo = photo_model::where('product_id', $k->id)->first();
                $k->photo = $photo->url;

                $user = UserModel::where('id', $k->user_id)->first();
                $k->user_name = $user->name;
                $k->user_surname = $user->surname;

                $data = UserModel::where('id', Session::get('id'))->first();
                if($data != null){
                    if($data->id == $k->user_id){
                        $k->data = "your";
                    }
                    else{
                        $k->data = true;
                    }
                }
                else{
                    $k->data = false;
                }
            }
            return $product;
        }
        else{
            return 'datark';
        }
    }
}
