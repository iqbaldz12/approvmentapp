<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'fullname' => 'admin',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'role'     => 'admin',
        ]);

        User::create([
            'fullname' => 'employee',
            'username' => 'employee',
            'password' => Hash::make('employee123'),
            'role'     => 'employee',
        ]);

        User::create([
            'fullname' => 'manager',
            'username' => 'manager',
            'password' => Hash::make('manager123'),
            'role'     => 'manager',
        ]);

        User::create([
            'fullname' => 'Director',
            'username' => 'director',
            'password' => Hash::make('director123'),
            'role'     => 'director',
        ]);
    }
}
