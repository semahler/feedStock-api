<?php

namespace App\Http\Controllers;

use App\Models\StockMovement;
use App\Models\StockTotal;
use Illuminate\Http\Request;

class StockMovementController
{

    /**
     * Controller constructor.
     *
     * @param  \App\Models\StockMovement  $stockMovement
     * @param \App\Models\StockTotal $stockTotal
     */
    public function __construct(StockMovement  $stockMovement, StockTotal $stockTotal)
    {
        $this->stockMovement = $stockMovement;
        $this->stockTotal = $stockTotal;
    }

    /**
     * @param int $feedId
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStockMovementEntriesByFeedId($feedId) {
        $stockMovementEntries = $this->stockMovement->getStockMovementEntriesByFeedId($feedId);

        return response()->json($stockMovementEntries);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function createStockMovementEntry(Request $request) {
        $stockMovementEntry = $this->stockMovement->createStockMovementEntry($request);

        $feedId = $stockMovementEntry->feed_id;

        $stockTotalQuantity = $this->stockMovement->calculcateStockTotalQuantityByFeedId($feedId);
        $this->stockTotal->createOrUpdateStockTotalEntry($feedId, $stockTotalQuantity);

        return response($stockMovementEntry, 200);
    }
}
