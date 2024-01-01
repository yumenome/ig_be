<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostContorller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = PostResource::collection(Post::latest()->get());

        return $posts;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $post = new Post();
        if($request->hasFile('image')){
            $img_name = time(). '_'. $request->image->getClientOriginalName();
          $request->image->move(public_path('storage/images'), $img_name);
          $post->image = $img_name;
        }

        $post->user_id = auth()->user()->id;
        $post->caption = $request->caption;
        $post->save();

        return $post;
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        $post->delete();

        return $post;
    }
}
