<?php

use App\Models\FeedType;
use Illuminate\Database\Seeder;

class FeedTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foodTypes = factory(FeedType::class, 3)->create();
    }
}
