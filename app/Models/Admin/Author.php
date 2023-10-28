<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $table="authors";
    protected $fillable=[
        "author_name",
        "nationality",
        "image",
        "website",
        "twitter",
        "wiki_pedia",
    ];
}
