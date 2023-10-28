<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RssFeed extends Model
{
    use HasFactory;
    protected $table="rss_feeds";
    protected $fillable =[
        "feed_address",
        "publication_id",
        "description",
        "status",
    ];

    public function publications(){
        return $this->belongsTo(Publication::class,'publication_id');
    }
}
