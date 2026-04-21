<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'image',
        'location',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function claims()
    {
        return $this->hasMany(Claim::class);
    }

    public function pendingClaim()
    {
        return $this->hasOne(Claim::class)->where('status', 'pending');
    }

    public function getIsOwnerAttribute()
    {
        return auth()->check() && auth()->id() === $this->user_id;
    }
}
