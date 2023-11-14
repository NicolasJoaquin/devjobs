<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        "title",
        "rate_id",
        "category_id",
        "company",
        "last_date",
        "description", 
        "image",
        "user_id",
    ];
}
