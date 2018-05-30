<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class , function(Faker $faker) {
	static $password;
	
	return [
		'account' => "admin" ,
		'mobile' => "18678199939" ,
		'email' => $faker->unique()->safeEmail ,
		'password' => $password ? : $password = bcrypt('admin') ,
		'remember_token' => str_random(10) ,
	];
});


$factory->state(App\Models\User::class , 'admin' , function(Faker $faker) {
	return [
		'is_admin' => 1 ,
	];
});