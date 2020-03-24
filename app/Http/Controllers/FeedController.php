<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use App\Models\StockTotal;
use Illuminate\Http\Request;

class FeedController
{

    /**
     * Controller constructor.
     *
     * @param  \App\Models\Feed  $feed
     * @param \App\Models\StockTotal $stockTotal
     */
    public function __construct(Feed $feed, StockTotal $stockTotal)
    {
        $this->feed = $feed;
        $this->stockTotal = $stockTotal;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFeeds() {
        $feeds = $this->feed->getAllFeeds();

        return response()->json($feeds);
    }

    /**
     * @param int $manufacturerId
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFeedsByManufacturer($manufacturerId) {
        $feeds = $this->feed->getFeedsByManufacturerId($manufacturerId);

        return response()->json($feeds);
    }

    /**
     * @param int $feedId
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFeed($feedId) {
        $feed = $this->feed->getFeedByFeedId($feedId);

        return response()->json($feed);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function createOrUpdateFeed(Request $request) {
        $feed = $this->feed->createOrUpdateFeed($request);

        $this->stockTotal->createOrUpdateStockTotalEntry($feed->feed_id, 0);

        return response($feed, 200);
    }

    /**
     * @param int $feedId
     *
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function deleteFeed($feedId) {
        $this->stockTotal->deleteStockTotalEntry($feedId);
        $result = $this->feed->deleteFeed($feedId);

        return response($result, 200);
    }

}
