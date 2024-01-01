<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{


    public function store(Post $post,Request $request){


        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->user_id = auth()->id();
        $comment->post_id = $post->id;
        $comment->save();

        return $comment;
    }

    public function destory($id){
        $comment = Comment::find($id);

        $comment->delete();

        return $comment;
    }
}
