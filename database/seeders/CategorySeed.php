<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategorySeed extends Seeder
{
    public function run()
    {
        // 1
		DB::table('categories')->insert([
			'name' => 'Computador',
		]);

		// 2
		DB::table('categories')->insert([
			'name' => 'Consola',
		]);

		// 3
		DB::table('categories')->insert([
			'name' => 'Smartphone',
		]);

		// 4
		DB::table('categories')->insert([
			'name' => 'Accesorio',
		]);
    }
}
