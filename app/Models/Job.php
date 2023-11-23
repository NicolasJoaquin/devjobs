<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $casts = [ 'last_date' => 'date'];
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
    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function rate() {
        return $this->belongsTo(Rate::class);
    }
    public function applicants() {
        return $this->hasMany(Applicant::class);
    }
}
