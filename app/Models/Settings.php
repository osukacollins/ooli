<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'see_me',
        'see_post',
        'list_post',
        'sound-on',
        'upvote-on',
        'downvote-on',
        'comments-on',
        'posts-on'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
