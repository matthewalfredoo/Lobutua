<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Kelompok 4', 
            'email' => 'kelompok4@gmail.com',
            'phone' => '081234567890',
            'password' => bcrypt('123456789'),
        ]);

        $user->assignRole('Member');
    }
}
