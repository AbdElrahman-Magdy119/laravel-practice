<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Requests\API\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class PostController extends Controller
{


     function __construct()
     {
        $this->middleware('auth:sanctum')->only('store','update');
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return Post::all();

        return PostResource::collection(Post::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        //
        
        $post = Post::create($request->all());
        $this->save_image($request->image,$post);
        // return new Response($post,201);

        return new  PostResource($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        // return  $post;

        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $old_image=  $post->image;
        $post->update($request->all());
        $this->save_image($request->image, $post);
        if($request->image){
            $this->delete_image($old_image);
        }

        // return new Response($post,201);

        return new  PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return new Response('deleted post Successfully',204);
    }

    private function save_image($image, $post){
        if ($image){
            if (in_array($image->extension(),['png','jpg']))
            {
               
                $image_name = time().'.'.$image->extension();
                $image->move(public_path('images/posts'),$image_name);
                $post->image = $image_name;
                $post->save();
            }
            else
            {
                $post->image = 'post.png';
                $post->save();
            }
           
        }
    }

    private function delete_image($image_name){
        //        dd($image_name !='article.png' and ! str_contains($image_name, '/tmp/'));
                if($image_name !='post.png' and ! str_contains($image_name, '/tmp/')){
                    try{
                        unlink(public_path('images/posts/'.$image_name));
        
                    }catch (\Exception $e){
                        echo $e;
                    }
                }
            }
}
