<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function postss(){
        return $this->hasMany(Post::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function likers(){
        return $this->belongsToMany(Post::class,'post_like')->withTimestamps();
    }

    public function likes(Post $post){
        return $this->likeRS()->where('post_id', $post->id)->exists();
    }

    // get follow
    public function followings(){
        return $this->belongsToMany(User::class,'follower_followed','follower_id','followed_id')->withTimestamps();
    }

    public function follows(User $user){
        return $this->followings()->where('id',$user->id)->exists();
    }


    // to follow
    // public function followers(){
    //     return $this->belongsToMany(User::class,'follower_followed','followed_id','follower_id')->withTimestamps();;
    // }

}
