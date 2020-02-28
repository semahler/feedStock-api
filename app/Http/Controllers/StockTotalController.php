<?php

namespace App\Http\Controllers;

use App\StockTotal;
use App\StockHistory;
use Illuminate\Http\Request;

class StockTotalController
{

    public function getStockTotalByFoodId($id) {
        $stockTotal = StockTotal::where('food_id', '=', $id)->get();

        return response()->json($stockTotal);
    }

    public function createStockTotalEntry(Request $request) {
        $stockTotalEntry = new StockTotal();

        $stockTotalEntry->food_id = $request->food_id;
        $stockTotalEntry->total_stock = $request->total_stock;

        $stockTotalEntry->save();
    }
}
