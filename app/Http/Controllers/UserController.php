<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //logout method
    public function logout(){
        auth()->logout();
        return redirect('/')->with('success', 'You are now logged out');
    }

    //showCorrectHomepage
    public function showCorrectHomepage(){
        if(auth()->check()){
            return view('homepage-feed');
        }else{
            return view('homepage');
        }
    
    }

    //login method
    public function login(Request $request) {
        $incomingFields = $request->validate([
            'loginusername' => 'required',
            'loginpassword' => 'required'
        ]);

        if (auth()->attempt(['username' => $incomingFields['loginusername'], 'password' => $incomingFields['loginpassword']])) {#attempt method compares username and password in DB
            $request->session()->regenerate(); #session->regenerate = tells a browser to store cookie 
            return redirect('/')->with('success','You have succesfully logged in.');
        } else {
            return redirect('/')->with('failure', 'Invalid login.');
        }
    }
    
    //register method
    public function register(Request $request){
        $incomingFields = $request->validate([
            'username' => ['required', 'min:2', 'max:20', Rule::unique('users', 'username') ],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:2', 'confirmed']

        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);

        $user = User::create($incomingFields); #create() creates new data in DB
        auth()->login($user);

        return redirect('/')->with('success','Thank you for creating account');
    }

}
