<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Product::factory(80)->create();

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
