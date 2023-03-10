<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\PemasokSeeder;
use Illuminate\Foundation\Auth\User;

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

        DB::table('users')->insert([
            'name' => 'user',
            'username' => 'user',
            'email' => 'test@example.com',
            'alamat' => 'test@example.com',
            'no_telp' => 1123,
            'jenis_kelamin' => 'Pria',
            'password' => bcrypt('123'),
        ]);

        // $this->call(PemasokSeeder::class);
    }
}
