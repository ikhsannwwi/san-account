<?php

namespace Database\Seeders;

use App\Models\role_user;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();
        role_user::create([
            'role' => 'Moderator',
            ]);
        role_user::create([
            'role' => 'Pengguna',
        ]);
        User::create([
            'name' => 'Ikhsan',
            'email' => 'moderator@ikhsannawawi.id',
            'password' => bcrypt('sanbray'),
            'foto' => 'LagkZ.jpg',
            'role_id' => 1,
        ]);
        User::create([
            'name' => 'Sans',
            'email' => 'ikhsannawawi99@gmail.com',
            'password' => bcrypt('sanbray'),
            'foto' => 'Jj2W7.jpg',
            'role_id' => 2,
        ]);
    }
}
