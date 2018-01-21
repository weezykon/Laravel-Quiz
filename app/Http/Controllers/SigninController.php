<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class SigninController extends Controller
{
   public function __construct(){
		$this->middleware('guest')->except(['destroy']);
	}

    public function index(){
    	return view('auth.login');
    }

    public function create(){
       // Authenticate user
        if(!User::where('username', request('username'))->exists()){
            session()->flash('message','User Does not exist');
            return back();
        }
        // Check Password
   		if (! auth()->attempt(request(['username','password']))){
            session()->flash('message','Wrong Password. Try Again');
            return back();
   		}
   		// Checks if user is an admin
        if (Auth::user()->role == 'admin') {
          return redirect('/');
        }else{
          return redirect('/questions');
        }
   	}
    
    public function destroy(){
    	auth()->logout();
    	return redirect('/');
    }
}
