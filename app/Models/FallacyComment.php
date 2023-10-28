<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FallacyComment extends Model
{
    use HasFactory;
    protected $table = 'fallacy_comments';

    protected $fillable= [
        'article_fallacy_id',
        'user_id',
        'comment'
    ];
}
