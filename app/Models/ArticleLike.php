<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleLike extends Model
{
    use HasFactory;
    protected $table="article_likes";
    protected $fillable = [
        'user_id',
        'article_id',
        'like_status',
        'created_at',
        'updated_at'
    ];

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function articles(){
        return $this->belongsTo(Article::class,'article_id');
    }
}
