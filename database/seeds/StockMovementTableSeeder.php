<?php

use App\Models\StockMovement;
use Illuminate\Database\Seeder;

class StockMovementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stockMovementEntries = factory(StockMovement::class, 20)->create();
    }
}
