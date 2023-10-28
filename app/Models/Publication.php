<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Publication extends Model
{
    use Sortable;
    use HasFactory;
    protected $table ="publications";
    public $sortable = ['id', 'publication','domain','country'];

    public function publicationArticle()
    {
        return $this->hasMany(Article::class);
    }
    
    public function fallaciesPublication(){
        return $this->hasManyThrough(ArticleFallacie::class,Article::class);
    }

    public function countryPublication(){
        return $this->belongsTO(Country::class,'country');
    }

   
}
