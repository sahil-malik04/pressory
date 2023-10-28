<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsPage extends Model
{
    use HasFactory;
    protected $table = "cms_pages";
    protected $fillable = [
        'title',
        'meta_content',
        'meta_description',
        'meta_keyword',
        'tags',
'slug',
'is_gallery',
'is_testimonial',
'is_faq',
'page_body',
'is_activated',
    ]; 
}
