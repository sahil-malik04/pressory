<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fallacie extends Model
{
    use HasFactory;
    protected $table="fallacies";
    protected $fillable = [ 
        "fallacy",
        "code",
        "description",
        "status"
    ];

    public function fallacieArticles()
    {
        return $this->hasMany(ArticleFallacie::class);
    }
}
