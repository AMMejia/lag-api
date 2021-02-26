<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'email' => 'admin@lag.com',
            'password' => Hash::make('adminadmin'),
            'name' => 'Super Usuario Lag',
            'role' => 'owner',
            'due' => 0,
        ]);
    }
}
