<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Stub\ReturnStub;

class Post_LikeController extends Controller
{

    public function like(Post $post){
        $user = auth()->user();

        /** @var \App\Models\User $user */
        $user->likers()->attach($post);

        $post->they_liked =  $user->likes($post);

            $post->save();

        return $post->likers()->count() ;
    }
    public function unlike(Post $post) {
        $user = auth()->user();

        /** @var \App\Models\User $user */
        $user->likers()->detach($post);

        $post->they_liked =  $user->likes($post);

            $post->save();


        return $post->likers()->count() ;
    }

}
