<?php
namespace Groid;

use Faker;
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

$factory->define(User::class, function (Faker\Generator $faker) {
    return [
        'name'              => $faker->name,
        'email'             => $faker->safeEmail,
        'password'          => bcrypt(str_random(10)),
        'remember_token'    => str_random(10),
    ];
});


$factory->define(Profile::class, function (Faker\Generator $faker) {
    return [
        'user_id'       => factory(User::class)->create()->id,
        'avatar'        => $faker->imageUrl(100, 100),
        'real_name'     => $faker->name,
        'screen_name'   => $faker->userName,
        'website'       => $faker->domainName,
        'twitter'       => $faker->userName,
        'facebook'      => $faker->name,
        'youtube'       => $faker->userName,
        'google'        => $faker->userName,
        'github'        => $faker->userName,
        'instagram'     => $faker->userName,
        'phone'         => $faker->phoneNumber,
        'address'       => $faker->buildingNumber . $faker->streetName,
        'apt_unit'      => $faker->streetSuffix,
        'city'          => $faker->city,
        'postal_code'   => $faker->postcode,
        'country_code'  => $faker->countryCode,
    ];
});

$factory->define(Journal::class, function (Faker\Generator $faker) {
    return [
        'user_id'   => factory(User::class)->create()->id,
        'title'     => $faker->sentence(),
        'body'      => $faker->paragraph(4, true)
    ];
});

$factory->define(Op::class, function (Faker\Generator $faker) {
    return [
        'user_id'   => factory(User::class)->create()->id,
        'unit_name' => $faker->firstName()
    ];
});

$factory->define(Cycle::class, function (Faker\Generator $faker) {
    return [
        'user_id'             => factory(User::class)->create()->id,
        'op_id'               => factory(Op::class)->create()->id,
        'name'                => $faker->firstNameFemale(),
        'description'         => $faker->paragraph(),
        'start_date'          => $faker->date('Y-m-d', 'now'),
        'end_date'            => $faker->date('Y-m-d'),
        'medium'              => $faker->sentence()
    ];
});

$factory->define(Stage::class, function (Faker\Generator $faker) {
    return [
        'user_id'       => factory(User::class)->create()->id,
        'name'          => $faker->firstNameFemale(),
        'description'   => $faker->sentence(),
        'cycle_id'      => factory(Cycle::class)->create()->id,
        'start_date'    => $faker->date('Y-m-d', 'now'),
        'end_date'      => $faker->date('Y-m-d'),
        'lighting'      => $faker->word
    ];
});

$factory->define(Photo::class, function (Faker\Generator $faker) {
    return [
        'user_id' => factory(User::class)->create()->id,
        'photo'   => $faker->imageUrl(),
    ];
});

$factory->define(Plant::class, function (Faker\Generator $faker) {
    return [
        'user_id'   => $faker->numberBetween(1,10),
        'cycle_id'  => $faker->numberBetween(1,10),
        'strain_id' => $faker->numberBetween(1,500),
        'source'    => $faker->company(),
        'from_seed' => $faker->boolean(),
    ];
});

$factory->define(Tag::class, function (Faker\Generator $faker) {
    return [
        'tag' => $faker->word()
    ];
});

$factory->define(Strain::class, function (Faker\Generator $faker) {
    return [
        'name'                  => $faker->firstNameFemale(),
        'lineage'               => $faker->company(),
        'cannabis_reports_link' => $faker->url(),
        'url'                   => $faker->url(),
        'description'           => $faker->paragraph(),
        'genetics'              => $faker->sentence(),
        'qr'                    => $faker->image('storage/qr', 640,480, 'abstract', true),
        'flowering_time_min'    => $faker->numberBetween(5,20),
        'flowering_time_max'    => $faker->numberBetween(6,50),
        'image'                 => $faker->imageUrl(),
        'ucpc'                  => $faker->unique()->bankAccountNumber()
    ];
});

$factory->define(SeedCompany::class, function (Faker\Generator $faker) {
    return [
        'name'                  => $faker->company() . ' Seed Co.',
        'cannabis_reports_link' => $faker->url(),
        'url'                   => $faker->url(),
        'description'           => $faker->paragraph(),
        'image'                 => $faker->imageUrl(1280,960,'business', true, 'tree', false),
        'ucpc'                  => $faker->unique()->bankAccountNumber()
    ];
});
$factory->define(Data::class, function (Faker\Generator $faker) {
    return [
        'user_id'           => factory(User::class)->create()->id,
        'cycle_id'          => factory(Cycle::class)->create()->id,
        'air_temp_c'        => $faker->numberBetween(0,100),
        'co2_ppm'           => $faker->numberBetween(1,100000),
        'relative_humidity' => $faker->numberBetween(5,20),
        'ph'                => $faker->numberBetween(1.0,14.0),
        'ec'                => $faker->numberBetween(0.10,3.60),
        'runoff_ph'         => $faker->numberBetween(1.0,14.0),
        'runoff_ec'         => $faker->numberBetween(0.10,3.60),
        'water_temp_c'      => $faker->numberBetween(0,100),
        'water_level'       => $faker->numberBetween(0,100),
        'notes'             => $faker->paragraph(),
        'time_of_record'    => $faker->date('Y-m-d H:i:s', 'now')
    ];
});
