<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecommendTag extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "recommend_id",
        "tag_id",
    ];
}
