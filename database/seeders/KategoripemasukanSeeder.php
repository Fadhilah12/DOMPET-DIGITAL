<?php

namespace Database\Seeders;

use App\Models\Kategorimasuk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoripemasukanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategorimasuks')->insert([
            [
                'nama_kategori' => 'Kas',
                'kode_kategori'=> 'KS',
                'deskripsi'=> 'penambahan kas',
            ],
            [
                'nama_kategori' => 'Modal',
                'kode_kategori'=> 'ML',
                'deskripsi'=> 'penambahan modal',
            ],
        ]);
        // Kategorimasuk::factory()->count(5)->create();
    }
}
