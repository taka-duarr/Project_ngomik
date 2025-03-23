<?php
// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Users extends Model
// {
//     use HasFactory;
    
    
//     protected $table = 'tb_user'; // Sesuaikan dengan nama tabel di database
//     protected $fillable = ['nama_user', 'role', 'password', 'status'];


// }
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Users extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'tb_user'; // Paksa Laravel agar menggunakan tabel 'tb_user'

    protected $fillable = ['nama_user', 'role', 'password', 'status'];

    protected $hidden = ['password'];
}


