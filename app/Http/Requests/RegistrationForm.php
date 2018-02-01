<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;

class RegistrationForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'gender' => 'required'
        ];
    }

    public function persist(){
        // create user
        $user = User::create(array(
            'name' => request('name'),
            'username' => ucfirst(request('username')),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'avatar' => 'default.png',
            'gender' => request('gender')
        ));

        // Sign in
        auth()->login($user);

        // Mail::to($user)->send(new WelcomeAgain($user));
    }
}
