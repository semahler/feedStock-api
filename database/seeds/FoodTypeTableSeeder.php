<?php

use Illuminate\Database\Seeder;

class FoodTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foodTypes = factory(\App\FoodType::class, 3)->create();
    }
}
