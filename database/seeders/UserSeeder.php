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
        User::factory(10)->create();

        User::factory()->create([
            'customerId' => 'Admin',
            'email' => 'admin@gmail.com',
            'password'  => 'password',
            'phone' => '07' . rand(1000000000, 9999999999),
            'user_type' => 'guest',
        ]);
    }
}
