<?php

namespace App\Http\Controllers;

use App\Models\StockHistory;
use Illuminate\Http\Request;

class StockHistoryController
{

    /**
     * Controller constructor.
     *
     * @param  \App\Models\StockHistory  $stockHistory
     */
    public function __construct(StockHistory  $stockHistory)
    {
        $this->stockHistory = $stockHistory;
    }

    /**
     * @param int $feedId
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStockHistoryEntriesByFeedId($feedId) {
        $stockHistoryEntries = $this->stockHistory->getStockHistoryEntriesByFeedId($feedId);

        return response()->json($stockHistoryEntries);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function createStockHistoryEntry(Request $request) {
        $stockHistoryEntry = $this->stockHistory->createStockHistoryEntry($request);

        return response($stockHistoryEntry, 200);
    }
}
