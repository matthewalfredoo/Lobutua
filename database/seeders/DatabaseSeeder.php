<?php

namespace Database\Seeders;

use App\Models\KategoriPengumuman;
use App\Models\Laporan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionTableSeeder::class);
        $this->call(AddPermissionSeeder::class);
        $this->call(CreateAdminMasterSeeder::class);
        $this->call(LevelUserSeeder::class);
        $this->call(KategoriLaporanIndukSeeder::class);
        $this->call(KategoriLaporanAnakSeeder::class);
        $this->call(KategoriPengumumanTableSeeder::class);
        $this->call(KategoriAdministrasiSeeder::class);
        $this->call(MemberSeeder::class);
        $this->call(PengumumanSeeder::class);
        $this->call(LaporanSeeder::class);
    }
}
