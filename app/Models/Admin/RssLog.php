<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RssLog extends Model
{
    use HasFactory;
    protected $table="rss_logs";
    protected $fillable = [
        "title",
        "url",
        "feed_address",
        "comment"
    ];
}
