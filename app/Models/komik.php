<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komik extends Model
{
    use HasFactory;

    protected $table = 'tb_komik'; // Sesuaikan dengan nama tabel di database
    protected $fillable = ['nama_komik', 'genre', 'status', 'gambar_komik', 'sinopsis'];
}

