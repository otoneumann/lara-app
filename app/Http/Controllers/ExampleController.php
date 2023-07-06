<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    //
    public function homepage(){
        $ourName = 'oto';
        $animals = ['AAA','BBB','CCC','DDD'];

        return view('homepage', ['surname'=> 'Tester', 'name' => $ourName, 'catname' => 'Mewsalot', 'animals' => $animals]);
               
    }
    public function about(){
        return view('single-post');        
    }
    public function aboutyou(){
        return view('aboutyou',['test'=>'<h1>Testing</h1><a href="/">Back to home</a><br><a href="/about">view the about page</a>']);       
    }
}
