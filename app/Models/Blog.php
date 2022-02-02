<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = []; 

    public function scopeLatest(Builder $query)
    {
        return $query->orderBy(static::CREATED_AT, 'desc');
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function comment() 
    {
        return $this->hasMany(Comment::class);
    }

    public function catogry() 
    {
        return $this->belongsTo(Catogry::class);
    }
}
