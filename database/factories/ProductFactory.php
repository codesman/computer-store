<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define( App\Product::class, function ( Faker\Generator $faker ) {
	static $password;

	return [
		'name' => ucwords( $faker->words( $nb = 2, $asText = true )),
		'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 999),
		'manufacturer_id' => $faker->numberBetween($min = 1, $max = 10)
	];
} );
