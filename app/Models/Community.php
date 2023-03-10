<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Community extends Model
{
    use HasFactory;

    protected $fillable = ["user_id", "name", "description", "image", "slug", "status", "created_at", "updated_at"];
    public function posts () {
        return $this->hasMany(Post::class);
    }

    public function user () {
        return $this->belongsTo(User::class);
    }
}
