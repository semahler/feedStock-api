<?php

use App\Models\Manufacturer;
use Illuminate\Database\Seeder;

class ManufacturerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manufacturers = factory(Manufacturer::class, 10)->create();
    }
}
