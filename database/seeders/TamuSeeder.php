<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class TamuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create('id_ID');

        for($i = 1; $i<=20; $i++){
            DB::table('tamus')->insert([
                'nama' => $faker->name,
                'hadir' => 0,
            ]);
        }
    }
}
