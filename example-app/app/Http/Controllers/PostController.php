<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Jobs\ProcessPodcast;


class PostController extends Controller
{

    function __construct(){
        $this->middleware('auth')->only('store','update');
    }

    public function index():View
    {
        $posts = Post::all()->map(function ($post) {
        $post['created_at'] = Carbon::parse($post['created_at'])->format('d-m-y');
        return $post;
    });
    


    
        $posts = Post::paginate(20);
        return view('post.index', ["posts" => $posts]);
    }
    public function show(Post $post)
    {
        return view('post.show', ["post" => $post]);
    }
    public function create()
    {
        // $posts=Posts::where('user_id','=',$user->id);
        // if($posts==3)
        // {
        //     dd("error");
        // }
          

        $users = User::all();
//        dd($users);
        return view('post.create',['users' => $users]);
    }
    public function store(StorePostRequest $request)
    {

        $posts = User::find(auth()->id())->posts;

        if(count($posts) < 3 )
        {
            $post = new Post($request->except('slug'));
            $post->slug = Str::of($request['title'])->slug('-');
            $post->save();
            $this->save_image($request->image,$post);
            return redirect()->route('posts.index');
        }
        else
        {
            return redirect()->route('posts.create');
        }

        

    }
    public function edit(Post $post)
    {
        $users = User::all();
        return view('post.edit', ["post" => $post , "users" => $users]);
    }
    public function update(Post $post, UpdatePostRequest $request)
    {
        // $post->update($request->all());
        // return redirect()->route('posts.index');


         
        $old_image=  $post->image;
        
        $post->update($request->all());
        $this->save_image($request->image, $post);
        if($request->image){
            $this->delete_image($old_image);
        }
        
        return to_route('posts.index');




    }
    public function destroy(Post $post)
    {
        $this->delete_image($post->image);
        $post->delete();
        return redirect()->route('posts.index');
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

    private function save_image($image, $post){
        if ($image){
            if (in_array($image->extension(),['png']))
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

    public function deletetwoYearsAgo()
    {
        //
        ProcessPodcast::dispatch();
        return redirect()->route('posts.index');
    }
}
