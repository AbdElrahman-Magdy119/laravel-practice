<?php

namespace App\Http\Controllers;

use App\Models\NewPost;
use App\Http\Requests\StoreNewPostRequest;
use App\Http\Requests\UpdateNewPostRequest;

class NewPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = NewPost::all();
        return view("newpost.allposts",["posts"=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("newpost.addpost");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNewPostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewPostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewPost  $newPost
     * @return \Illuminate\Http\Response
     */
    public function show(NewPost $newPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewPost  $newPost
     * @return \Illuminate\Http\Response
     */
    public function edit(NewPost $newPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNewPostRequest  $request
     * @param  \App\Models\NewPost  $newPost
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewPostRequest $request, NewPost $newPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewPost  $newPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewPost $newPost)
    {
        //
    }
}
