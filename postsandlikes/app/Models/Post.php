<?php

namespace App\Models;

use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
use HasFactory;

    protected $fillable = [
        'body',
    ];

    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
        // return $this->likes->contains('user_id', Auth::user()->id);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
