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

    public function stockTotal() {
        return $this->hasOne(StockTotal::class, 'feed_id', 'feed_id');
    }

    /**
     * @return Feed[]
     */
    public function getAllFeeds() {
        $feeds = Feed::all();

        foreach ($feeds as $feed) {
            $feed_manufacturer = Feed::find($feed->feed_id)->manufacturer->name;
            $feed->manufacturer_name = $feed_manufacturer;

            $feed->stock_total = 0;
            $feed_stock_total = Feed::find($feed->feed_id)->stockTotal;
            if ($feed_stock_total) {
                $feed->stock_total = $feed_stock_total->quantity;
            }
        }

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

        $stock_total = Feed::find($feed->feed_id)->stockTotal->quantity;
        $feed->stock_total = $stock_total;

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

        // TotalStockEntrie anlegen

        $feed->save();

        return $feed;
    }
}
