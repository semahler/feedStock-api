<?php

namespace App\Http\Controllers;

use App\Models\StockTotal;

class StockTotalController
{

    /**
     * Controller constructor.
     *
     * @param  \App\Models\StockTotal  $stockTotal
     */
    public function __construct(StockTotal  $stockTotal)
    {
        $this->stockTotal = $stockTotal;
    }

    public function getStockTotalByFeedId($feedId) {
        $stockTotal = $this->stockTotal->getStockTotalByFeedId($feedId);

        return response()->json($stockTotal);
    }
}
