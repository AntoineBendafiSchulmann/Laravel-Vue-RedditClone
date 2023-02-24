<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commentary extends Model
{
    use HasFactory;

    protected $fillable = ["user_id","post_id", "body", "created_at", "updated_at"];
    public function post () {
        return $this->belongsTo(Post::class);
    }

    public function user () {
        return $this->belongsTo(User::class);
    }
}
