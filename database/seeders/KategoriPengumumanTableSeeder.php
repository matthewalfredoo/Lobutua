<?php

namespace Database\Seeders;

use App\Models\KategoriPengumuman;
use Illuminate\Database\Seeder;

class KategoriPengumumanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = [
        'Umum',
        'Penting',
        'Lowongan',
        ];
        
        foreach ($kategori as $kat) {
            KategoriPengumuman::create(['name' => $kat]);
        }
    }
}
