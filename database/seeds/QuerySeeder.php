<?php

use App\Query;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class QuerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(query::class, 10)->create();
    }
}
