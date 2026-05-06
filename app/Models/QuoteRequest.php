<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'phone',
        'country_code',
        'subject',
        'description',
        'service_type',
        'platform',
        'exam_date',
        'exam_time',
        'pages',
        'terms_accepted',
    ];

    protected $casts = [
        'terms_accepted' => 'boolean',
        'exam_date' => 'date',
    ];
}
