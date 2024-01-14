<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleM extends Model
{
    use HasFactory;
    protected $table = 'role';
    protected $fillable = 
    ['id', 'name', 'status','created_at','updated_at'];
}