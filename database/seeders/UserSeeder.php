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
        User::create([
            'name' => 'akshay',
            'email'=> 'aksahy@gmail.com',
            'mobile_no'=> "+916261225536",
            'password' => bcrypt('password')
        ]);
    }
}
