<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([

            'role_id' => 1,

            'name' => 'Shreya Chavan',

            'email' => 'admin@crm.com',

            'phone' => '9876543210',

            'password' => Hash::make('admin123'),

            'status' => true,

        ]);
    }
}

