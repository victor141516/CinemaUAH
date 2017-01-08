<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$date = Carbon::now();
		$password = bcrypt("password");

		$users = [
			['name' => "admin",
			'email' => "admin@admin.com",
			'password' => $password,
			'created_at' => $date,
			'updated_at' => $date,
			'role' => 'admin',
			],

			['name' => "user1",
			'email' => "user1@user1.com",
			'password' => $password,
			'created_at' => $date,
			'updated_at' => $date,
			],

			['name' => "user2",
			'email' => "user2@user2.com",
			'password' => $password,
			'created_at' => $date,
			'updated_at' => $date,
			],

			['name' => "user3",
			'email' => "user3@user3.com",
			'password' => $password,
			'created_at' => $date,
			'updated_at' => $date,
			],

		];

		foreach ($users as $each) {
			DB::table('users')->insert($each);        	
		}
	}
}
