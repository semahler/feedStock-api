<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Http\Request;

class FeedController
{

    /**
     * Controller constructor.
     *
     * @param  \App\Models\Feed  $feed
     */
    public function __construct(Feed $feed)
    {
        $this->feed = $feed;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFeeds() {
        $feeds = $this->feed->getAllFeeds();

        return response()->json($feeds);
    }

    /**
     * @param int $feedId
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFeed($feedId) {
        $feed = $this->feed->getFeedByFeedId($feedId);

        return response()->json($feedId);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function createOrUpdateFeed(Request $request) {
        $feed = $this->feed->createOrUpdateFeed($request);

        return response($feed, 200);
    }

    /**
     * @param int $feedId
     *
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function deleteFeed($feedId) {
        $result = $this->feed->deleteFeed($feedId);

        return response($result, 200);
    }

}
