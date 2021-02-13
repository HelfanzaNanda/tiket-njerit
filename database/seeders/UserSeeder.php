<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Dewi Sri',
            'email' => 'dewisri@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'name' => 'Sinar Jaya',
            'email' => 'sinarjaya@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
