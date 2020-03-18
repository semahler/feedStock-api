<?php

use App\Models\StockTotal;
use Illuminate\Database\Seeder;

class StockTotalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stockTotalEntries = factory(StockTotal::class, 20)->create();
    }
}
