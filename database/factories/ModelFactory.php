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

$factory->define(App\Client::class, function ($faker) {
    return [
        'first_name'    => $faker->firstName,
        'last_name'     => $faker->lastName,
        'email'         => $faker->email,
        'phone'         => $faker->phoneNumber,
    ];
});


$factory->define(App\Yacht::class, function ($faker) {

    $client =  factory(App\Client::class)->create();
    return [
        'client_id' =>  $client->id,
        'status'    => $faker->randomElement([
            App\Yacht::CHECKING,
            App\Yacht::SAILING,
            App\Yacht::UPGRADING,
            App\Yacht::UNDER_REPAIR
        ]),
        'name'     => $faker->numerify('Boat ####'),
        'registration_code'   => substr($faker->swiftBicNumber, 0, 10),
        'next_maintenance_date'         => $faker->dateTimeThisDecade(),
        'created_at' => $faker->dateTimeThisDecade(),
        'updated_at' => $faker->dateTimeThisDecade()
    ];
});


$factory->define(App\Task::class, function ($faker) {
    return [
        'code' => substr($faker->swiftBicNumber, 0, 5),
        'status'=> $faker->randomElement([
            App\Task::CHECKING,
            App\Task::UPGRADING,
            App\Task::UNDER_REPAIR
        ]),
        'name'     => $faker->bs,
        'description'         => $faker->catchPhrase,
        'average_duration'         => $faker->numberBetween(1, 100),
        'created_at' => $faker->dateTimeThisDecade(),
        'updated_at' => $faker->dateTimeThisDecade()
    ];
});

$factory->define(App\History::class, function ($faker) {


    $yacht =  factory(App\Yacht::class)->create();
    $task =  factory(App\Task::class)->create();

    return [
        'yacht_id'   => $yacht->id,
        'task_id'    => $task->id,
        'created_at' => $faker->dateTimeThisDecade()
    ];
});
