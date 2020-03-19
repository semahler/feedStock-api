<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_feed';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'feed_id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Mapping the Manufacturer to the corresponding Feed-Model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function manufacturer() {
        return $this->belongsTo(Manufacturer::class, 'manufacturer_id', 'manufacturer_id');
    }

    /**
     * @return Feed[]
     */
    public function getAllFeeds() {
        $feeds = Feed::all();

        return $feeds;
    }

    /**
     * @param int $manufacturerId
     *
     * @return Feed[]
     */
    public function getFeedsByManufacturerId($manufacturerId) {
        $feeds = Feed::where('manufacturer_id', '=', $manufacturerId)->get();

        return $feeds;
    }

    /**
     * @param int $feedId
     *
     * @return Feed[]
     */
    public function getFeedByFeedId($feedId) {
        $feed = Feed::find($feedId);
        $feed_manufacturer = Feed::find($feedId)->manufacturer->name;

        $feed->manufacturer_name = $feed_manufacturer;

        return $feed;
    }

    /**
     * @param int $feedId
     *
     * @return bool
     */
    public function deleteFeed($feedId) {
        $feed = $this->getFeedByFeedId($feedId);

        return $feed->delete();
    }

    /**
     * @param Request $request
     *
     * @return Feed
     */
    public function createOrUpdateFeed(Request $request){
        if (!is_null($request->id)) {
            $feed = $this->getFeedByFeedId($request->id);
        } else {
            $feed = new Feed();
        }

        // Todo: Implement details

        $feed->save();

        return $feed;
    }
}
