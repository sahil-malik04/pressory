<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;
    protected $table="publications";
    protected $fillable = [
        "publication",
        "domain",
        "country",
        "user_id",
        "image",
    ];
    public function publicationArticles(){
        return $this->hasMany(Article::class);
    }
    public function country(){
        return $this->belongsTo(Country::class,'country');
    }
}
