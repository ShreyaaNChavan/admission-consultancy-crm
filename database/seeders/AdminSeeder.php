<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([

            [
                'role_id' => 1,
                'name' => 'Shreya Chavan',
                'email' => 'admin@crm.com',
                'phone' => '9876543210',
                'password' => Hash::make('admin123'),
                'status' => 1,
            ],

            [
                'role_id' => 2,
                'name' => 'Amit Deshmukh',
                'email' => 'sales@crm.com',
                'phone' => '9000000001',
                'password' => Hash::make('123456'),
                'status' => 1,
            ],

            [
                'role_id' => 3,
                'name' => 'Rahul Sharma',
                'email' => 'rahul@crm.com',
                'phone' => '9000000002',
                'password' => Hash::make('123456'),
                'status' => 1,
            ],

            [
                'role_id' => 3,
                'name' => 'Priya Patil',
                'email' => 'priya@crm.com',
                'phone' => '9000000003',
                'password' => Hash::make('123456'),
                'status' => 1,
            ],

            [
                'role_id' => 5,
                'name' => 'Neha Joshi',
                'email' => 'hr@crm.com',
                'phone' => '9000000004',
                'password' => Hash::make('123456'),
                'status' => 1,
            ],

        ]);
    }
}