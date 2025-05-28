<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    /** @use HasFactory<\Database\Factories\ResumeFactory> */
    use HasFactory;

    protected $guarded = [];


    protected $casts = [
        'personal_info' => 'array',
        'experiences' => 'array',
        'educations' => 'array',
        'skills' => 'array',
        'projects' => 'array',
        'languages' => 'array',
        'certifications' => 'array',
        'is_public' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}
