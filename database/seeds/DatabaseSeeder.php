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
        $this->call(FeedTypeTableSeeder::class);
        $this->call(FeedTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        $this->call(StockMovementTableSeeder::class);
        $this->call(StockTotalTableSeeder::class);
    }
}
