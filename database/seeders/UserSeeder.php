<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // For Admin Accounts
        User::create([
            'name' => "Admin",
            'email' => "admin@mswdosogod.com",
            'role' => "admin",
            'password' => bcrypt('password'),
        ]);
        User::create([
            'name' => "Derek Joshua Catigan",
            'email' => "joshua@mswdosogod.com",
            'role' => "admin",
            'password' => bcrypt('password'),
        ]);
        User::create([
            'name' => "Angelica Nerves",
            'email' => "angelica@mswdosogod.com",
            'role' => "admin",
            'password' => bcrypt('password'),
        ]);

        // For Employee Accounts
        User::create([
            'name' => "Employee",
            'email' => "employee@mswdosogod.com",
            'role' => "employee",
            'password' => bcrypt('password'),
        ]);
        User::create([
            'name' => "Jhoedhen Salera",
            'email' => "jhoedhen@mswdosogod.com",
            'role' => "employee",
            'password' => bcrypt('password'),
        ]);
        User::create([
            'name' => "Rhey Franklin Tigtig",
            'email' => "rhey@mswdosogod.com",
            'role' => "employee",
            'password' => bcrypt('password'),
        ]);
    }
}
