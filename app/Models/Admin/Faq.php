<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $table = "faqs";
    protected $fillable = [
        'faq_question',
        'faq_answer'
    ];
}
