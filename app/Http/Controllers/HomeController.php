<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Questions;
use Auth;

class HomeController extends Controller
{
	public function __construct(User $user){
		$this->middleware('auth');
		$this->user = $user;
	}
	
	public function index(){
		if (Auth::user()->role != 'admin') {
			$questions = Questions::all();
			return view('question',compact('questions'));
		}else{
			$users = User::where('role', 'user')->get();
			return view('welcome',compact('users'));
		}
	}

	public function adduser(Request $request){
		$this->validate($request,[
    		'file' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    		'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'gender' => 'required'
		]);
		// dd($request['gender']);

		// Upload Image
		$image = $request->file('file');
        $input['imagename'] = request('username').'_'.time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
		$image->move($destinationPath, $input['imagename']);
		
		$user = new User;

    	//Process the data
    	User::create([
    		'name' => request('name'),
    		'lastname' => request('lastname'),
    		'username' => request('username'),
    		'email' => request('email'),
    		'password' => bcrypt(request('password')),
    		'gender' => request('gender'),
    		'avatar' => $input['imagename'],
    		'role' => 'user'
		]);
		session()->flash('message','User Added');
        return back();
	}
}
