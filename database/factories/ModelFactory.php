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

//Users here
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'username' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'avatar' => $faker->imageUrl(300, 300, 'people')
    ];
});

//message here
$factory->define(App\Message::class, function (Faker\Generator $faker){
	return[
		'content'   =>  $faker->realText(random_int(20,160)),
		'image' =>  $faker->imageUrl(600, 338),
        'created_at' => $faker->dateTimeThisDecade(),
        'updated_at' => $faker->dateTimeThisDecade(),
	];
});

//Responses to messages posts
$factory->define(App\Response::class, function (Faker\Generator $faker){
	return [
		'message' => $faker->words('3',true),
		'created_at' => $faker->dateTimeThisYear,
		'updated_at' => $faker->dateTimeThisYear,
	];
});