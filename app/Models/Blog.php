<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'image_url',
        'description',
        'content',
        'slug',
        'keywords',
        'meta_keywords',
        'status',
    ];

    const DRAFT = 'draft';
    const PUBLISH = 'published';
}
