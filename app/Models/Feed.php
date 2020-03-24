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

    protected $guarded = ['manufacturer_name'];

    /**
     * Mapping the Manufacturer to the corresponding Feed-Model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function manufacturer() {
        return $this->belongsTo(Manufacturer::class, 'manufacturer_id', 'manufacturer_id');
    }

    /**
     * Mapping the total-stock-entry to the corresponding Feed-Model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function stockTotal() {
        return $this->hasOne(StockTotal::class, 'feed_id', 'feed_id');
    }

    /**
     * Mapping the feed-type-entry to the corresponding Feed-Model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function feedType() {
        return $this->belongsTo(FeedType::class, 'feed_type_id', 'feed_type_id');
    }

    /**
     * Mapping the package-unit-entry to the corresponding Feed-Model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function packageUnit() {
        return $this->belongsTo(PackageUnit::class, 'package_unit_id', 'package_unit_id');
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

        $feed_type_title = Feed::find($feed->feed_id)->feedType->title;
        $feed->feed_type_title = $feed_type_title;

        $package_unit_title = Feed::find($feed->feed_id)->packageUnit->title;
        $feed->package_unit_title = $package_unit_title;

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
            $feed = Feed::find($request->id);
        } else {
            $feed = new Feed();

        }

        $feed->manufacturer_id = $request->manufacturer_id;
        $feed->feed_type_id = $request->feed_type_id;
        $feed->package_unit_id = $request->package_unit_id;
        $feed->name = $request->name;
        $feed->url = $request->url;

        // ToDo: Implementing frontend logic
        $feed->status = 1;
        $feed->rating = 0;

        $feed->save();

        return $feed;
    }
}
