<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateMenu extends Model
{
    use HasFactory;
    protected $table = "create_menus";
    protected $fillable =
    [
        'menu_json',
     
    ]; 
}
