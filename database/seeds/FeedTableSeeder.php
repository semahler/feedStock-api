<?php

use App\Models\Feed;
use Illuminate\Database\Seeder;

class FeedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $feeds = factory(Feed::class, 30)->create();
    }
}
