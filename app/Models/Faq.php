<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'category_id', 'keyword', 'title', 'slug', 'description', 'content', 'meta_keywords'
    ];

    protected $casts = [
        'meta_keywords' => 'array'
    ];

    public function getRouteKeyName(): string 
    { 
        return 'slug'; 
    }

    /**
     * Standard BelongsTo relationship
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Scopes
    public function scopePending($query) 
    { 
        return $query->whereNull('content'); 
    }
    
    public function scopePublished($query) 
    { 
        return $query->whereNotNull('content')->where('title', '!=', ''); 
    }
}