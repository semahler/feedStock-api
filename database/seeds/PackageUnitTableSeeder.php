<?php

use Illuminate\Database\Seeder;

class PackageUnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packageUnits = factory(\App\PackageUnit::class, 3)->create();
    }
}
