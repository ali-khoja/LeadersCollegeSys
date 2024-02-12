<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        //
        'first_name' => $this->faker->word(),
        'father_name' => $this->faker->word(),
        'grandfather_name' => $this->faker->word(),
        'mother' => $this->faker->word(),
        'mother' => $this->faker->word(),
        'phone1' => $this->faker->randomDigit(),
        'phone2' => $this->faker->randomDigit(),
        'gender'           => $this->faker->randomElement(['male', 'female']),
'dateofbirth' => $this->faker->date(),
'placeofbirth' => $this->faker->sentence(),
'current_address' => $this->faker->sentence(),
'current_address' => $this->faker->sentence(),
'course_id'           => $this->faker->randomElement(['2', '5']),
'branch' => 'brayati'  ,
'statue' => 'active' ,
'fees' => '750'

    ];
});
