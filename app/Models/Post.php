<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Community;

class Post extends Model
{
    use HasFactory;

    //post like reddit 
    protected $fillable = ["community_id", "user_id", "title", "body", "image", "slug", "status", "created_at", "updated_at"];
    public function community () {
        return $this->belongsTo(Community::class);
    }
}
