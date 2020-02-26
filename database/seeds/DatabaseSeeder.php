<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ManufacturerTableSeeder::class);
        $this->call(PackageUnitTableSeeder::class);
        $this->call(FoodTypeTableSeeder::class);
        $this->call(FoodTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        $this->call(StockHistoryTableSeeder::class);
    }
}
