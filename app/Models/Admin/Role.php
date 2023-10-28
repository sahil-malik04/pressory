<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table= "roles";

   
    public function permissionRole()
    {
        return $this->belongsTOMany(Permission::class,'role_permissions');
    }
}
