<?php

use Illuminate\Database\Seeder;

class FilmSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$films = [
			[
				'name' => 'Rogue One: Una historia de Star Wars',
				'synopsis' => 'El Imperio Galáctico ha terminado de construir el arma más poderosa de todas, la Estrella de la muerte, pero un grupo de rebeldes decide realizar una misión de muy alto riesgo: robar los planos de dicha estación antes de que entre en operaciones, mientras se enfrentan también al poderoso Lord Sith conocido como Darth Vader, discípulo del despiadado Emperador Palpatine. Film ambientado entre los episodios III y IV de Star Wars.',
				'website' => 'http://www.imdb.com/title/tt3748528/',
				'original_title' => 'Rogue One: A Star Wars Story',
				'genre' => 'Acción',
				'country' => 'USA',
				'minutes_duration' => 133,
				'year' => 2016,
				'producer' => 'Disney',
				'director' => 'Gareth Edwards',
				'age_rating' => '8',
				'others' => '',
				'has_image' => true,
			],

			[
				'name' => 'Passengers',
				'synopsis' => 'Una nave espacial, que viaja a un planeta lejano transportando miles de personas, tiene una avería en una de las cápsulas de hibernación tras el impacto con un gran meteorito. Como resultado, un pasajero se despierta 90 años antes del final del viaje.',
				'website' => 'http://www.filmaffinity.com/es/film478232.html',
				'original_title' => 'Passengers',
				'genre' => 'Ciencia ficción',
				'country' => 'USA',
				'minutes_duration' => 116,
				'year' => 2016,
				'producer' => 'Columbia Pictures',
				'director' => 'Morten Tyldum',
				'age_rating' => '16',
				'others' => '',
				'has_image' => true,
			],

			[
				'name' => 'Mine',
				'synopsis' => 'Un soldado se queda de repente solo y perdido en medio del desierto tras una misión que sale mal.',
				'website' => 'http://www.filmaffinity.com/es/film515887.html',
				'original_title' => 'Mine',
				'genre' => 'Bélico',
				'country' => 'USA',
				'minutes_duration' => 111,
				'year' => 2016,
				'producer' => 'Coproducción USA-Italia-España',
				'director' => 'Fabio Guaglione, Fabio Resinaro',
				'age_rating' => '18',
				'others' => '',
				'has_image' => true,
			],

			[
				'name' => 'Frantz',
				'synopsis' => 'Una pequeña ciudad alemana, poco tiempo después de la I Guerra Mundial. Anna va todos los días a visitar la tumba de su prometido Frantz, asesinado en Francia. Un día, Adrien, un misterioso joven francés, también deja flores en la tumba. Su presencia suscitará reacciones imprevisibles en un entorno marcado por la derrota de Alemania…',
				'website' => 'http://www.filmaffinity.com/es/film791041.html',
				'original_title' => 'Frantz',
				'genre' => 'Drama',
				'country' => 'Francia',
				'minutes_duration' => 113,
				'year' => 2016,
				'producer' => 'Mandarin Films',
				'director' => 'François Ozon',
				'age_rating' => '13',
				'others' => '',
				'has_image' => true,
			],

			[
				'name' => 'Vuelta a casa de mi madre',
				'synopsis' => 'A sus 40 años, Stéphanie (Alexandra Lamy) se ve obligada a regresar a casa de su madre (Josiane Balasko) tras perder su trabajo y todo su dinero, y ser abandonada por su marido. Stéphanie es recibida con los brazos abiertos, pero ambas, acostumbradas a sus rutinas y que no convivían desde hacía mucho tiempo bajo el mismo techo, tendrán que tener una gran paciencia para enfrentarse a la nueva situación y llevar a buen puerto esta nueva vida juntas.',
				'website' => 'http://www.filmaffinity.com/es/film694943.html',
				'original_title' => 'Retour chez ma mère',
				'genre' => 'Comedia',
				'country' => 'Francia',
				'minutes_duration' => 97,
				'year' => 2016,
				'producer' => 'Pathé',
				'director' => 'Eric Lavaine',
				'age_rating' => '4',
				'others' => '',
				'has_image' => true,
			],

		];

		foreach ($films as $each) {
			DB::table('films')->insert($each);        	
		}
	}
}
