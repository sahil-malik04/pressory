<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Kyslik\ColumnSortable\Sortable;
 
class Fallacie extends Model
{
    use HasFactory;
    use Sortable;


    // protected $table="fallacies";
    public $sortable = ['id', 'fallacy','code','description', 'status, created_at', 'updated_at'];


    public function fallacyArticle()
    {
        return $this->hasMany(ArticleFallacie::class);
    }
}
