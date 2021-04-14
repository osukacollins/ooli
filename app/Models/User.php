<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Upvote;
use App\Models\Downvote;
use App\Models\Settings;
use App\Models\Community;
use App\Models\Notification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'second_name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function community()
    {
        return $this->belongsTo(Community::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function upvotes()
    {
        return $this->hasMany(Upvote::class);
    }
    public function downvotes()
    {
        return $this->hasMany(Downvote::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function settings()
    {
        return $this->hasOne(Settings::class);
    }
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
