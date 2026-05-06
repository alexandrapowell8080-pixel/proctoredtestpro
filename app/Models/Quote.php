<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'service_type',
        'service_label',
        'email',
        'country_code',
        'phone',
        'subject',
        'platform',
        'exam_date',
        'exam_time',
        'description',
        'pages',
        'terms',
        'attachment_path',
        'attachment_original_name',
    ];

    protected $casts = [
        'terms' => 'boolean',
        'exam_date' => 'date',
    ];
}
