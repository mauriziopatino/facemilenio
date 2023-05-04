<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id', 'reaction_type_id', 'is_active'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
