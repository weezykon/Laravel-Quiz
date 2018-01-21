<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrationForm;

class SignupController extends Controller
{
    public function index(){
    	return view('auth.register');
    }

    public function create(RegistrationForm $form){
    	// dd(bcrypt(request('password')));
        $form->persist();
    	return redirect('/');
    }

    public function checkusername(){
        $isExists = \App\User::where('username', request('username'))->exists();
        if($isExists){
            return response()->json(array("exists" => true));
        }else{
            return response()->json(array("exists" => false));
        }
    }

    public function checkemail(){
        $isExists = \App\User::where('email', request('email'))->exists();
        if($isExists){
            return response()->json(array("exists" => true));
        }else{
            return response()->json(array("exists" => false));
        }
    }
}
