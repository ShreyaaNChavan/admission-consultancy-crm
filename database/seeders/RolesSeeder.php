<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'role_name' => 'Super Admin',
                'description' => 'Has complete access to the CRM',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'role_name' => 'Sales Manager',
                'description' => 'Manages sales team',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'role_name' => 'Counselor',
                'description' => 'Handles student enquiries',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'role_name' => 'Accountant',
                'description' => 'Manages finance and payments',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'role_name' => 'HR',
                'description' => 'Manages employees',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'role_name' => 'Faculty',
                'description' => 'Handles academic batches',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'role_name' => 'Receptionist',
                'description' => 'Handles walk-in enquiries',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
    
}
