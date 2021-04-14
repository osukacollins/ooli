<?php

namespace App\Models;

use App\Models\User;
use App\Models\Upvote;
use App\Models\Comment;
use App\Models\Downvote;
use App\Models\Community;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'body',
        'user_id',
        'community_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function community()
    {
        return $this->belongsTo(Community::class);
    }
    public function upvotes()
    {
        return $this->hasMany(Upvote::class);
    }
    public function upvotedBy(User $user)
    {
        return $this->upvotes->contains('user_id', $user->id);
    }
    public function downvotes()
    {
        return $this->hasMany(Downvote::class);
    }
    public function downvotedBy(User $user)
    {
        return $this->downvotes->contains('user_id', $user->id);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
