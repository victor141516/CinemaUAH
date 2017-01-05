<?php

use Illuminate\Database\Seeder;

class TheaterSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$theaters = [
			['name' => 'Sala 1',
			'n_rows' => 14,
			'n_columns' => 10,
			],
			['name' => 'Sala 2',
			'n_rows' => 14,
			'n_columns' => 10,
			],
			['name' => 'Sala 3',
			'n_rows' => 14,
			'n_columns' => 10,
			],
			['name' => 'Sala 4',
			'n_rows' => 14,
			'n_columns' => 10,
			],
			['name' => 'Sala 5',
			'n_rows' => 14,
			'n_columns' => 10,
			],
		];

		foreach ($theaters as $each) {
			DB::table('theaters')->insert($each);        	
		}
	}
}
