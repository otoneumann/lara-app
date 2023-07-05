<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    //
    public function homepage(){
        return '<h1>Homepage!!</h1><a href="/about">view the about page</a>';        
    }
    public function about(){
        return '<h1>About Page!!</h1><a href="/">Back to home</a>';        
    }
    public function aboutyou(){
        return '<h1>Testing</h1><a href="/">Back to home</a><br><a href="/about">view the about page</a>';       
    }
}
