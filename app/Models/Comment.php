<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id', 'message', 'status', 'is_active'
    ];

    protected $appends = ['time_elapsed'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function getTimeElapsedAttribute()
    {
        switch ($this->created_at) {
            case $this->created_at->diffInSeconds(Carbon::now()) < 60:
                return $this->created_at->diffInSeconds(Carbon::now()) . ' seconds ago.';
                break;
            case $this->created_at->diffInMinutes(Carbon::now()) < 60:
                return $this->created_at->diffInMinutes(Carbon::now()) . ' minutes ago.';
                break;
            case $this->created_at->diffInHours(Carbon::now()) < 24:
                return $this->created_at->diffInHours(Carbon::now()) . ' hours ago.';
                break;
            case $this->created_at->diffInDays(Carbon::now()) < 7:
                return $this->created_at->diffInDays(Carbon::now()) . ' days ago.';
                break;
            case $this->created_at->diffInWeeks(Carbon::now()) < 4:
                return $this->created_at->diffInWeeks(Carbon::now()) . ' weeks ago.';
            break;
            case $this->created_at->diffInMonths(Carbon::now()) < 12:
                return $this->created_at->diffInMonths(Carbon::now()) . ' months ago.';
            break;
            case $this->created_at->diffInYears(Carbon::now()) > 1:
                return $this->created_at->diffInYears(Carbon::now()) . ' years ago.';
            break;
            default:
                return 'long time ago.';
                break;
        }
    }
}
