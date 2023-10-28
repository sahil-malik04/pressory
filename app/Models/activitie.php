<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class activitie extends Model
{
    use HasFactory;
    protected $table="activities";

    public function getarticlesbyactivite()
    {
        return $this->belongsTo(Article::class);
    }
}
