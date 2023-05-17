<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function store(Request $request)
    {
        $post=Post::find($request->post_id);
        $post->comments()->create(['comment' =>$request->comment, 'user_id' => Auth::id()]);
        return redirect()->route('posts.show',$post);
    }


}
