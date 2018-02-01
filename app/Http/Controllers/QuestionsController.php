<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Questions;
use Auth;

class QuestionsController extends Controller
{
    public function __construct(User $user){
		$this->middleware('auth');
		$this->user = $user;
	}
	
	public function index(){
        $questions = Questions::all();
		return view('questions',compact('questions'));
    }
    
    public function create(){
        $questions = new Questions;

        Questions::create([
    		'questions' => request('questions'),
    		'a' => request('a'),
    		'b' => request('b'),
    		'c' => request('c'),
    		'answer' => request('answer')
		]);
		session()->flash('message','Question Added');
        return back();
    }

    public function delete($id){
    	$qst = Questions::where('id', $id)->delete();
    	if($qst){
    		session()->flash('message','Question Deleted');
            return back();
    	}
    	return false;
    }

    public function answer(){
        // dd(request('answer'));
        $overall = count(request('answer'));
        $score = 0;
        foreach(request('answer') as $ans){
            $questions = Questions::all();
            foreach ($questions as $key1 => $value) {
                if($ans == $value['answer']){
                    $score++;
                }else{
                    $score;
                }
            }
        }
        session()->flash('score',$score);
        return back();
    }
}
