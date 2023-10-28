<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
    protected $table = "testimonials";
    protected $fillable =[
        'image',
        'name',
        'Destination',
        'year',
        'review',
    ];
}
