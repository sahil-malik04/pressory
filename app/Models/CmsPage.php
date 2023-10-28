<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsPage extends Model
{
    use HasFactory;
    protected $table = "cms_pages";
    protected $fillable = [
               'title',
                'tags',
                'meta_content',
                'meta_description',
                'meta_keyword',
                'slug',
                'is_gallery',
                'is_testimonial',
                'is_faq',
                'page_body',
                'is_activated',
    ];
}
