<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerFollowedController extends Controller
{

    public function follow(User $user){

        $follower = auth()->user();

                /** @var \App\Models\User $follower */
        $follower->followings()->attach($user);

        $count = $follower->followings()->count();

        $bol = $follower->follows($user);

        $user->is_followed = $bol;
        $user->followers = $count;
        $user->save();

        return $count;
    }

    public function unfollow(User $user){

        $follower = auth()->user();

            /** @var \App\Models\User $follower */
        $follower->followings()->detach($user);

        $count = $follower->followings()->count();


        $bol = $follower->follows($user);


        $user->is_followed = $bol;
        $user->followers = $count;
        $user->save();

        return $count;
    }
}
