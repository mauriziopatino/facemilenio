<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'user2_id', 'status', 'is_active'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function user2()
    {
        return $this->belongsTo(User::class, 'user2_id');
    }


}
