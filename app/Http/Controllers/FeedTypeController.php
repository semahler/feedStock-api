<?php

namespace App\Http\Controllers;

use App\Models\FeedType;
use Illuminate\Http\Request;

class FeedTypeController
{

    /**
     * Controller constructor.
     *
     * @param  \App\Models\FeedType  $feedType
     */
    public function __construct(FeedType $feedType)
    {
        $this->feedType = $feedType;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFeedTypes() {
        $feedTypes = $this->feedType->getAllFeedTypes();

        return response()->json($feedTypes);
    }

    /**
     * @param int feedTypeId
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFeedType($feedTypeId) {
        $feedType = $this->feedType->getFeedTypeByFeedTypeId($feedTypeId);

        return response()->json($feedType);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function createOrUpdateFeedType(Request $request) {
        $feedType = $this->feedType->createOrUpdateFeedType($request);

        return response($feedType, 200);
    }

    /**
     * @param int $feedTypeId
     *
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function deleteFeedType($feedTypeId) {
        $result = $this->feedType->deleteFeedType($feedTypeId);

        return response($result, 200);
    }
}
