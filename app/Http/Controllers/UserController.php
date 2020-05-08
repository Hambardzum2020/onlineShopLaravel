<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\UserModel;
use App\ProductModel;
use App\CartModel;
use App\WishlistModel;
use App\photo_model;
use Hash;
use Session;
use Mail;

class UserController extends Controller
{
    function signup(){
    	return view("signup");
    }
    function login(){
        return view("login");
    }
    function show_profile(){
        $data = UserModel::where('id', Session::get('id'))->first();
        return view('profile')->with('data',$data);
    }
    function show_UserProfile($id){
        $data = UserModel::where('id', Session::get('id'))->first();
        $userData = UserModel::where('id', $id)->first();
        return view('Userprofile')->with('data',$data)->with('userData', $userData);
    }
    function show_home(){
        $data = UserModel::where('id', Session::get('id'))->first();
        if(!empty($data)){
            return view('home')->with('data', $data);
        }
        else{
            return view('home');
        }
    }
    function logout(){
        session()->flush();
        return Redirect::to("/login");
    }
    function register(Request $r){
    	//print $r->surname;
    	//dd($r);
    	//dd($r->all());
    	$v = Validator::make($r->all(),
    	[
    		"name" => "required",
    		"surname" => "required",
    		"age" => "required|integer",
    		"email" => "required|email",
    		"password" => "required|min:6|max:18",
    		"comfirm_password" => "required|same:password"
    	]);
    	if($v->fails()){
    		return Redirect::to("/signup")->withErrors($v)->withInput();
    	}
    	else{
    		$user = new UserModel();
    		$user->name = $r->name;
    		$user->surname = $r->surname;
    		$user->age = $r->age;
    		$user->email = $r->email;
    		$user->password = Hash::make($r->password);
            $user->save();
            $info = [
                'name' => $user->name,
                'id' => $user->id,
                'hash' => md5($user->id.$user->email),
            ];
            Mail::send('mail', $info, function($m) use($user){
                $m->to($user->email, "$user->name $user->surname")->subject("Activate Your Account");
                $m->from('hampogh25@gmail.com', 'Shop Admin');
            });
            return Redirect::to("/login")->withErrors($v)->withInput();
    	}
    }
    function verify($hash, $id){
        $user = UserModel::where('id', $id)->first();
        if($user){
            if(md5($user->id.$user->email) == $hash){
                UserModel::where('id', $id)->update(['active' => 1]);
                return Redirect::to("/login");
            }
        }
    }
    function signin(Request $log){
        $validLogin = Validator::make($log->all(),
        [
            "emailLogin" => "required|email",
            "passwordLogin" => "required|min:6|max:18",
        ]);
        $data = UserModel::where('email', $log->emailLogin)->first();
        $validLogin->after(function($validLogin) use ($data, $log){
            if(!$data){
                $validLogin->errors()->add('emailLogin', 'chka tenc email');
            }
            else if(!Hash::check($log->passwordLogin, $data['password'])){
                $validLogin->errors()->add('passwordLogin', 'sxal parol');
            }
        });
        if($validLogin->fails()){
            return Redirect::to("/login")->withErrors($validLogin)->withInput();
        }
        else{
            if($data->active == 0){
                Session::put('id',$data['id']);
                return Redirect::to("/login");
            }
            if($data->type == 'admin'){
                Session::put('id',$data['id']);
                return Redirect::to("/admin");
            }
            if($data->block == 1){
                if(time()<$data->block_time){
                    return Redirect::to("/login");
                }
                else{
                    Session::put('id', $data['id']);
                    UserModel::where('id', $data['id'])->update(['block' => 0]);
                    return Redirect::to('/home');
                }
            }
            Session::put('id', $data['id']);
            return Redirect::to("/home");
        }
    }
    function show_edit(){
        $data = UserModel::where('id', Session::get('id'))->first();
        return view('/edit')->with('data', $data);
    }
    function edit_server(Request $r){
        $v = Validator::make($r->all(),
            [
                "name" => "required",
                "surname" => "required",
                "email" => "required|email",
                "age" => "required|integer",
            ],
        );
        $user = UserModel::where('id', Session::get('id'))->first();
        $email_valid = UserModel::where('email', $r->email)->where('email', '!=', $user->email)->first();
        $v->after(function($v) use ($r, $email_valid){
            if($email_valid){
                $v->errors()->add('email', 'nman mail arden ka');
            }
        });
        if($v->fails()){
            return Redirect::to('edit')->withErrors($v)->withInput();
        }
        else{
            $data = UserModel::where('id', Session::get('id'))->first();
            UserModel::where('id', Session::get('id'))->update(['name' => $r->name, 'surname' => $r->surname, 'age' => $r->age,
            'email' => $r->email]);
            return Redirect::to('edit')->withInput();
        }
    }
    function changePwd(){
        $data = UserModel::where('id', Session::get('id'))->first();
        $userData = UserModel::where('id', Session::get('id'))->first();
        return view('/changePwd')->with('userData', $userData)->with('data', $data);;
    }
    function check_current_pwd(Request $request){
        $data = $request->all();
        if(Hash::check($data['current_pwd'],UserModel::where('id', Session::get('id'))->first()->password)){
            echo 'true';
        }
        else{
            echo 'false';
        }
    }
    function updatePwd(Request $r){
        if($r -> isMethod('post')){
            $v = Validator::make($r->all(),
                [
                    "current_pwd" => "required",
                    "new_pwd" => "required|min: 6",
                    "comfirm_pwd" => "required|same:new_pwd",
                ],
                [
                    "current_pwd.required" => "The current password field is required.",
                    "new_pwd.required" => "The new password field is required.",
                    "new_pwd.min"=> "The new password must be at least 6 characters.",
                    "comfirm_pwd.required" => "The comfirm password field is required.",
                    "comfirm_pwd.same" => "The comfirm password and new password must match."
                ]
            );
            if($v->fails()){
                return Redirect::to('settings')->withErrors($v);
            }
            $dataPwd = $r->all();
            if(Hash::check($dataPwd['current_pwd'],UserModel::where('id', Session::get('id'))->first()->password)){
                UserModel::where('id',Session::get('id'))->update(["password" => bcrypt($dataPwd['new_pwd'])]);
                return Redirect::to('settings');
            }
            else{
                $crr = $r->current_pwd;
                $v->after(function($v) use ($r, $crr){
                    $v->errors()->add('current_pwd', 'Your correct password is incorrect');
                });
            }
            if($v->fails()){
                return Redirect::to('settings')->withErrors($v);
            }
        }
    }

    public function forgot_password(){
        return view('/forgot_password');
    }
    public function forgotPassword(Request $r){
        $email = $r->userEmail;
        if($email == ''){
            return 'required';
        }
    	$v = Validator::make($r->all(),
    	[
    		"userEmail" => "email",
        ]);
        if($v->fails()){
    		return "error_email";
        }
        else{
            $userEmail = UserModel::where('email', $email)->first();
            if($userEmail == null){
                return 'exists';
            }
            else{
                $code = Str::random(6);
                UserModel::where('email', $email)->update(['updatepassword' => $code]);
                $info = [
                    'code' => $code,
                    'hash' => md5($code.$userEmail->email),
                ];
                Mail::send('forgot_password_mail', $info, function($m) use($userEmail){
                    $m->to($userEmail->email, "$userEmail->email")->subject("Reset Password");
                    $m->from('hampogh25@gmail.com', 'Shop Admin');
                });
            }
        }
    }

    public function upNewPwd(Request $r){
        $code_forgot = $r->code_forgot;
        $nPwd_forgot = $r->nPwd_forgot;
        $cPwd_forgot = $r->cPwd_forgot;
        $userEmail = $r->userEmail;
        $oldCode = UserModel::where('email', $userEmail)->first()->updatepassword;
        if($code_forgot == '' || $nPwd_forgot == '' || $cPwd_forgot == ''){
            return 'error_empty';
        }
        if(strlen($nPwd_forgot) < 6){
    		return "error_min_6";
        }
        if($nPwd_forgot != $cPwd_forgot){
            return "error_same_comf";
        }
        if($code_forgot != $oldCode){
            return "error_same_code";
        }
        else{
            UserModel::where('email', $userEmail)->update(["password" => bcrypt($nPwd_forgot)]);
            return 'ok';
        }
    }
}
