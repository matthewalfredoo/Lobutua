<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriAdministrasi;

class KategoriAdministrasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = [
            'Akta Lahir',
            'Akta Mati',
            'Surat Pengantar Pindah',
            'Surat Pengantar KTP',
            'Surat Keterangan Kematian',
            'Surat Keterangan Domisili',
            'Surat Keterangan Kurang Mampu',
        ];

        foreach ($kategori as $kat) {
            KategoriAdministrasi::create(['nama_kategori' => $kat]);
        }
    }
}
