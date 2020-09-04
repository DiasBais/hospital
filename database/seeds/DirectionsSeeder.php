<?php

use App\Directions;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DirectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Directions::class, 20)->create();
    }
}
