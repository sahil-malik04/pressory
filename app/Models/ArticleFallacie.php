<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleFallacie extends Model
{
    use HasFactory;
    protected $table="article_fallacies";

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function fallacy(){
        return $this->belongsTo(Fallacie::class);
    }

}
