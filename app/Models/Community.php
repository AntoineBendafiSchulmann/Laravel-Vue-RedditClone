<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Community extends Model
{
    use HasFactory;

    protected $fillable = ["user_id", "name", "description", "image", "slug", "status", "created_at", "updated_at"];
    public function post () {
        return $this->hasMany(Post::class);
    }
}
