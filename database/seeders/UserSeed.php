<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeed extends Seeder
{

    public function run()
    {
        DB::table('users')->insert([
			'number_id' => '1000862550',
			'name' => 'Felipe',
			'last_name' => 'Diaz',
			'email' => 'andres@email.com',
			'password' => bcrypt(123456),
		]);
    }
}
