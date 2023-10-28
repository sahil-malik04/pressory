<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleFallacie extends Model
{
    use HasFactory;
    protected $table="article_fallacies";
    protected $fillable= [
        "article_id",
        "user_id",
        "fallacy_id",
        "fallacy_statement",
        "confirmation",
        "voting",
    ];
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function articles()
    {
        return $this->belongsTo(Article::class,'article_id');
    }
    public function fallacies()
    {
        return $this->belongsTo(Fallacie::class,'fallacy_id');
    }
}
