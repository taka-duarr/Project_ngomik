<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    
    
    protected $table = 'tb_user'; // Sesuaikan dengan nama tabel di database
    protected $fillable = ['nama_user', 'role', 'password', 'status'];
}

