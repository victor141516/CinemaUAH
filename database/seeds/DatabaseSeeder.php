<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call(FilmSeeder::class);
		$this->call(ActorSeeder::class);
		$this->call(TheaterSeeder::class);
		$this->call(ProjectionSeeder::class);
		$this->call(UserSeeder::class);
		$this->call(TicketSeeder::class);
	}
}
