<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'activities_id',
        'first_review_id',
        'second_review_id',
        'first_review_value',
        'second_review_value',
    ];
}
