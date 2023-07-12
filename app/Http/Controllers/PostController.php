<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //method viewSinglePost
    public function viewSinglePost(Post $post){#typehinting->variable must match to routes variable and then magic happens(this will query data using model)
        $post['body'] = strip_tags(Str::markdown($post->body), '<p><ul><ol><li><strong><em><h3><br>');
        return view('single-post', ['post' => $post]);
    }
    //method storeNewPost
    public function storeNewPost(Request $request){
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();

        $newPost =  Post::create($incomingFields);
        return redirect("/post/{$newPost->id}")->with('success', 'New Post successfuly created');
    }
    // method showCreateForm
    public function showCreateForm(){

    // if(!auth()->check()){
    //     return redirect('/');
    // }     
    
    

        return view('create-post');
    }
}
