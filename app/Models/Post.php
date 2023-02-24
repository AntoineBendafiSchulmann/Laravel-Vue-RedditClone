<?php

namespace App\Models;

use App\Models\User;
use App\Models\Community;
use App\Models\Commentary;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    //post like reddit 
    protected $fillable = ["user_id","community_id", "title", "body", "image", "slug", "status", "created_at", "updated_at"];
    public function community () {
        return $this->belongsTo(Community::class);
    }

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function comments () {
        return $this->hasMany(Commentary::class);
    }




    
}
