<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $table = 'tb_chapter';
    protected $fillable = ['nama_chapter', 'id_komik', 'file_chapter'];

    public function komik()
    {
        return $this->belongsTo(Komik::class, 'id_komik');
    }
}
