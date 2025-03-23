<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// class DatabaseSeeder extends Seeder
// {
//     /**
//      * Seed the application's database.
//      */
//     public function run(): void
//     {
//         // User::factory(10)->create();

//         User::factory()->create([
//             'name' => 'Test User',
//             'email' => 'test@example.com',
//         ]);
//     }
// }


// namespace Database\Seeders;

// use Illuminate\Database\Seeder;
    

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Tambahkan data ke tabel komiks
        DB::table('tb_komik')->insert([
            ['nama_komik' => 'Tensura', 'genre' => 'Action','status' => '1','gambar_komik' => 'tensura.jpg', 'sinopsis' => 'bla bla bla' , 'created_at' => '2025-03-11 14:10:00', 'updated_at' => '2025-03-11 14:10:00'],
            ['nama_komik' => 'Naruto', 'genre' => 'Action','status' => '0','gambar_komik' => 'naruto.jpg', 'sinopsis' => 'bla bla bla'  , 'created_at' => '2025-03-11 14:10:00', 'updated_at' => '2025-03-11 14:10:00'],
        ]);

        // Tambahkan data ke tabel chapters
        DB::table('tb_chapter')->insert([
            ['nama_chapter' => 'Chapter 1', 'id_komik' => 1,'file_chapter' => 'chapter1.pdf', 'created_at' => '2025-03-11 14:10:00', 'updated_at' => '2025-03-11 14:10:00'],
            ['nama_chapter' => 'Chapter 2', 'id_komik' => 1,'file_chapter' => 'chapter2.pdf', 'created_at' => '2025-03-11 14:10:00', 'updated_at' => '2025-03-11 14:10:00'],
            ['nama_chapter' => 'Chapter 1', 'id_komik' => 2,'file_chapter' => 'chapter1.pdf', 'created_at' => '2025-03-11 14:10:00', 'updated_at' => '2025-03-11 14:10:00'],
            ['nama_chapter' => 'Chapter 2', 'id_komik' => 2,'file_chapter' => 'chapter2.pdf', 'created_at' => '2025-03-11 14:10:00', 'updated_at' => '2025-03-11 14:10:00'],
        ]);

        DB::table('tb_user')->insert([
            ['nama_user' => 'hutao', 'role' => 'admin', 'password' => '123', 'status' => '1', 'created_at' => '2025-03-11 14:10:00', 'updated_at' => '2025-03-11 14:10:00'],
            ['nama_user' => 'sakura', 'role' => 'user', 'password' => '123', 'status' => '0', 'created_at' => '2025-03-11 14:10:00', 'updated_at' => '2025-03-11 14:10:00'],
        ]);

        DB::table('tb_paket')->insert([
            ['nama_paket' => '1 Bulan', 'harga_paket' => '50000','created_at' => '2025-03-11 14:10:00', 'updated_at' => '2025-03-11 14:10:00'],
            ['nama_paket' => '1 Tahun', 'harga_paket' => '100000','created_at' => '2025-03-11 14:10:00', 'updated_at' => '2025-03-11 14:10:00'],
        ]);

        DB::table('tb_pembayaran')->insert([
            ['nama_pembayaran' => 'BCA', 'gambar_pembayaran' => 'bca.jpg','created_at' => '2025-03-11 14:10:00', 'updated_at' => '2025-03-11 14:10:00'],
            ['nama_pembayaran' => 'BNI', 'gambar_pembayaran' => 'bni.jpg','created_at' => '2025-03-11 14:10:00', 'updated_at' => '2025-03-11 14:10:00'],
            ['nama_pembayaran' => 'Gopay', 'gambar_pembayaran' => 'gopay.jpg','created_at' => '2025-03-11 14:10:00', 'updated_at' => '2025-03-11 14:10:00'],
            ['nama_pembayaran' => 'Dana', 'gambar_pembayaran' => 'Dana.jpg','created_at' => '2025-03-11 14:10:00', 'updated_at' => '2025-03-11 14:10:00'],
        ]);

        DB::table('tb_transaksi')->insert([
            ['id_user' => 1, 'id_paket' => 1, 'id_pembayaran' => 1, 'total_bayar' => 50000, 'created_at' => '2025-03-11 14:10:00', 'updated_at' => '2025-03-11 14:10:00'],
            ['id_user' => 2, 'id_paket' => 2, 'id_pembayaran' => 2, 'total_bayar' => 100000,'created_at' => '2025-03-11 14:10:00', 'updated_at' => '2025-03-11 14:10:00'],
        ]);


    }
}

