<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
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
            'email' => 'test@test.ru',
            'password' => 'testtest',
            'bonuses' => '1000',
        ]);

        User::factory()->create([
            'email' => 'test2@test2.com',
            'password' => 'test2test2',
            'bonuses' => '542',
        ]);
    }
}
