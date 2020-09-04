<?php

use App\doctor;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class doctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(doctor::class, 20)->create();
    }
}
