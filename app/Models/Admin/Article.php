<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table="articles";
    protected $fillable=[
        "user_id",
        "title",
        "url",
        "published",
        "publication_id",
        "status",
    ];

    public function articleFallacies()
    {
        return $this->hasMany(ArticleFallacie::class);
    }
    public function articlePublications(){
        return $this->belongsTo(Publication::class,"publication_id");
    }
}
