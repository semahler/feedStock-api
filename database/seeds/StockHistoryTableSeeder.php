<?php

use App\Models\StockHistory;
use Illuminate\Database\Seeder;

class StockHistoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stockHistoryEntries = factory(StockHistory::class, 20)->create();
    }
}
