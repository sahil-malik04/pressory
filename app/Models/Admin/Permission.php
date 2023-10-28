<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $table="permissions";
    protected $fillable=[
        'name',
    ];

    public function rolePermission(){
        return $this->belongsToMany(UserType::class,'role_permissions');
    }
}
