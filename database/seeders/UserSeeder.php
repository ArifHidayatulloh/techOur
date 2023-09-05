<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'name' => 'Cibione',
            'email' => 'kamvak@gmail.com',
            'hp' => '0812212313',
            'password' => Hash::make('cibione'),
            'role' => 'sub admin',
            'limit' => 20
        ]);
    }
}
