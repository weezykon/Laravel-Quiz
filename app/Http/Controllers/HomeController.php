<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class HomeController extends Controller
{
    public function __construct(User $user){
		$this->middleware('auth');
		$this->user = $user;
    }
    
    public function index(){
			if (Auth::user()->role != 'admin') {
        return redirect('/questions');
      }else{
				return view('welcome');
			}
	}
}
