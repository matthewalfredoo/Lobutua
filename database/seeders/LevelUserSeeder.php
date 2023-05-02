<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class LevelUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'Admin']);
        $admin->givePermissionTo(['user-list', 'pengumuman-list', 'pengumuman-create', 'pengumuman-edit', 'pengumuman-delete', 'laporan-list', 'laporan-create', 'laporan-edit', 'laporan-delete', 'administrasi-list', 'administrasi-create', 'administrasi-delete']);

        $member = Role::create(['name' => 'Member']);
        $member->givePermissionTo(['pengumuman-list', 'laporan-list', 'laporan-create', 'laporan-edit', 'laporan-delete', 'administrasi-list', 'administrasi-create']);
    }
}
