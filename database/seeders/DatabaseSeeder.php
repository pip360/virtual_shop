<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Product;

use Illuminate\Database\Seeder;

use Database\Seeders\UserSeed;
use Database\Seeders\CategorySeed;





class DatabaseSeeder extends Seeder
{
    public function run()
    {

		$this->call([
			UserSeed::class,
			CategorySeed::class
		]);

        User::factory(9)->create();
		Product::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
