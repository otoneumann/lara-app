<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //
    public function register(Request $request){
        $incomingFields = $request->validate([
            'username' => ['required', 'min:2', 'max:20', Rule::unique('users', 'username') ],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:2', 'confirmed']

        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);

        User::create($incomingFields); #create() creates new data in DB
        return 'hi from register function';
    }

}
