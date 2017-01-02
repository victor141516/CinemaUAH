<?php

use Illuminate\Database\Seeder;

class ActorSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$actors = [
		['name' => "Felicity Jones"],
		['name' => "Diego Luna"],
		['name' => "Ben Mendelsohn"],
		['name' => "Donnie Yen"],
		['name' => "Jiang Wen"],
		['name' => "Mads Mikkelsen"],
		['name' => "Forest Whitaker"],
		['name' => "Alan Tudyk"],
		['name' => "Riz Ahmed"],
		['name' => "Jonathan Aris"],
		['name' => "Jimmy Smits"],
		['name' => "Alistair Petrie"],
		['name' => "Genevieve O'Reilly"],
		['name' => "Valene Kane"],
		['name' => "Warwick Davis"],

		['name' => "Chris Pratt"],
		['name' => "Jennifer Lawrence"],
		['name' => "Michael Sheen"],
		['name' => "Laurence Fishburne"],
		['name' => "Andy García"],
		['name' => "Julee Cerda"],

		['name' => "Armie Hammer"],
		['name' => "Annabelle Wallis"],
		['name' => "Tom Cullen"],
		['name' => "Juliet Aubrey"],
		['name' => "Geoff Bell"],
		['name' => "Clint Dyer"],

		['name' => "Pierre Niney"],
		['name' => "Paula Beer"],
		['name' => "Cyrielle Clair"],
		['name' => "Johann von Bülow"],
		['name' => "Marie Gruber"],
		['name' => "Ernst Stötzner"],
		['name' => "Anton von Lucke"],

		['name' => "Josiane Balasko"],
		['name' => "Alexandra Lamy"],
		['name' => "Mathilde Seigner"],
		['name' => "Alexandra Campanacci"],
		['name' => "Jérôme Commandeur"],
		['name' => "Nathan Dellemme"],
		['name' => "Pascal Demolon"],
		['name' => "Philippe Lefebvre"],
		['name' => "Cécile Rebboah"],
		];

		$relations = [
			['film_id' => 1,
			'actor_id' => 1,],

			['film_id' => 1,
			'actor_id' => 2,],

			['film_id' => 1,
			'actor_id' => 3,],

			['film_id' => 1,
			'actor_id' => 4,],

			['film_id' => 1,
			'actor_id' => 5,],

			['film_id' => 1,
			'actor_id' => 6,],

			['film_id' => 1,
			'actor_id' => 7,],

			['film_id' => 1,
			'actor_id' => 8,],

			['film_id' => 1,
			'actor_id' => 9,],

			['film_id' => 1,
			'actor_id' => 10,],

			['film_id' => 1,
			'actor_id' => 11,],

			['film_id' => 1,
			'actor_id' => 12,],

			['film_id' => 1,
			'actor_id' => 13,],

			['film_id' => 1,
			'actor_id' => 14,],

			['film_id' => 1,
			'actor_id' => 15,],

			['film_id' => 2,
			'actor_id' => 16,],

			['film_id' => 2,
			'actor_id' => 17,],

			['film_id' => 2,
			'actor_id' => 18,],

			['film_id' => 2,
			'actor_id' => 19,],

			['film_id' => 2,
			'actor_id' => 20,],

			['film_id' => 2,
			'actor_id' => 21,],

			['film_id' => 3,
			'actor_id' => 22,],

			['film_id' => 3,
			'actor_id' => 23,],

			['film_id' => 3,
			'actor_id' => 24,],

			['film_id' => 3,
			'actor_id' => 25,],

			['film_id' => 3,
			'actor_id' => 26,],

			['film_id' => 3,
			'actor_id' => 27,],

			['film_id' => 4,
			'actor_id' => 28,],

			['film_id' => 4,
			'actor_id' => 29,],

			['film_id' => 4,
			'actor_id' => 30,],

			['film_id' => 4,
			'actor_id' => 31,],

			['film_id' => 4,
			'actor_id' => 32,],

			['film_id' => 4,
			'actor_id' => 33,],

			['film_id' => 4,
			'actor_id' => 34,],

			['film_id' => 5,
			'actor_id' => 35,],

			['film_id' => 5,
			'actor_id' => 36,],

			['film_id' => 5,
			'actor_id' => 37,],

			['film_id' => 5,
			'actor_id' => 38,],

			['film_id' => 5,
			'actor_id' => 39,],

			['film_id' => 5,
			'actor_id' => 40,],

			['film_id' => 5,
			'actor_id' => 41,],

			['film_id' => 5,
			'actor_id' => 42,],

			['film_id' => 5,
			'actor_id' => 43,],

		];

		foreach ($actors as $each) {
			DB::table('actors')->insert($each);        	
		}
		foreach ($relations as $each) {
			DB::table('films_actors')->insert($each);        	
		}
	}
}
