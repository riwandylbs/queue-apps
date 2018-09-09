<?php

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QueueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $limit = 10;

        for ($i=0; $i < $limit ; $i++) { 
            DB::table('Queue')->insert([ //mengisi data di database
                'loading_dock' => $i,
                'expd_name' => $faker->name,
                'card_no' => $i,
                'check_in' => $faker->dateTime(),
                'check_out' => $faker->dateTime(),
                'date_in' => $faker->dateTime(),
                'date_in' => $faker->dateTime(),
                'time_start' => $faker->dateTime(),
                'time_finish' => $faker->dateTime(),
                'status' => 'ready',
                'locations' => 'gudang A'
            ]);
        }
    }
}
