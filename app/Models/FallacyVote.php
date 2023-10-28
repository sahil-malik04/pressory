<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FallacyVote extends Model
{
    use HasFactory;
    protected $table="fallacy_votes";
    protected $fillable= [
        'article_fallacy_id',
        'user_id',
        'vote'
    ];
}
