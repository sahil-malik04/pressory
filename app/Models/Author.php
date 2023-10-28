<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Author extends Model
{
    use HasFactory;
    use Sortable;
    protected $table="authors";
    public $sortable = ['id', 'author_name','nationality'];
    public function articles()
    {
        return $this->belongsToMany(Article::class, 'authors_articles');
    }

    public function fallaciesAuthor(){
        return $this->hasManyThrough(ArticleFallacie::class,AuthorArcticles::class,'author_id','article_id','id','article_id');
    }

}
