<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Kyslik\ColumnSortable\Sortable;
class Article extends Model
{
    use HasFactory;
    protected $table="articles";
    use Sortable;

    public $sortable = ['id', 'title','url','published'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function author(){
        return $this->belongsTo(Author::class);
    }
    public function publication(){
        return $this->belongsTo(Publication::class,'publication_id');
    }

    public function activity()
    {
        return $this->hasMany(activitie::class,'article_id');
    }
    public function articlesAuthors()
    {
        return $this->belongsToMany(Author::class, 'authors_articles');
    }
    public function articleFallacieData()
    {
        return $this->hasMany(ArticleFallacie::class,'article_id');
    }
    public function articleFallacyVote()
    {
        return $this->hasManyThrough(FallacyVote::class,ArticleFallacie::class,'article_id','article_fallacy_id','id','id');
    }

    public function likes(){
        return $this->hasMany(ArticleLike::class);
     }
   
}
