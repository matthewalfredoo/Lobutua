<?php

namespace Database\Seeders;

use App\Models\KategoriLaporanAnak;
use Illuminate\Database\Seeder;

class KategoriLaporanAnakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KategoriLaporanAnak::create([
            'nama_kategori' => 'Jalan', 
            'id_induk' => '1',
        ]);

        KategoriLaporanAnak::create([
            'nama_kategori' => 'Layanan Transportasi',
            'id_induk' => '1',
        ]);

        KategoriLaporanAnak::create([
            'nama_kategori' => 'Air',
            'id_induk' => '1',
        ]);

        KategoriLaporanAnak::create([
            'nama_kategori' => 'Bangunan',
            'id_induk' => '1',
        ]);

        KategoriLaporanAnak::create([
            'nama_kategori' => 'Lainnya',
            'id_induk' => '1',
        ]);

        KategoriLaporanAnak::create([
            'nama_kategori' => 'Alam',
            'id_induk' => '2',
        ]);

        KategoriLaporanAnak::create([
            'nama_kategori' => 'Non-Alam',
            'id_induk' => '2',
        ]);

        KategoriLaporanAnak::create([
            'nama_kategori' => 'Lainnya',
            'id_induk' => '2',
        ]);

        KategoriLaporanAnak::create([
            'nama_kategori' => 'Kehilangan',
            'id_induk' => '3',
        ]);

        KategoriLaporanAnak::create([
            'nama_kategori' => 'Perampokan',
            'id_induk' => '3',
        ]);

        KategoriLaporanAnak::create([
            'nama_kategori' => 'Penganiayaan',
            'id_induk' => '3',
        ]);

        KategoriLaporanAnak::create([
            'nama_kategori' => 'Pelecehan',
            'id_induk' => '3',
        ]);

        KategoriLaporanAnak::create([
            'nama_kategori' => 'Lainnya',
            'id_induk' => '3',
        ]);
    }
}
