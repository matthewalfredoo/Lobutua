<?php

namespace Database\Seeders;

use App\Models\KategoriLaporanInduk;
use Illuminate\Database\Seeder;

class KategoriLaporanIndukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = [
        'Infrastruktur',
        'Bencana',
        'Kriminal',
        ];
        
        foreach ($kategori as $kat) {
            KategoriLaporanInduk::create(['nama' => $kat]);
        }
    }
}
