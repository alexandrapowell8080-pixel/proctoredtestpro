<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    //
    protected $fillable = [
        'course_id', 'keyword', 'title', 'slug', 'description', 'content', 'meta_keywords'
    ];

    protected $casts = ['meta_keywords' => 'array'];

    public function getRouteKeyName(): string { 
        return 'slug'; 
        
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Scopes for clean querying
    public function scopePending($query) { 
        return $query->whereNull('content'); 
        
    }
    public function scopePublished($query) { 
        return $query->whereNotNull('content'); 
        
    }
}