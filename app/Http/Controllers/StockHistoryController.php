<?php

namespace App\Http\Controllers;

use App\FoodType;
use App\StockHistory;
use Illuminate\Http\Request;

class StockHistoryController
{

    public function getStockHistoryEntriesByFoodId($id) {
        $stockHistoryEntries = StockHistory::where('food_id', '=', $id)->get();

        return response()->json($stockHistoryEntries);
    }

    public function createStockHistoryEntry(Request $request) {
        $stockHistoryEntry = new StockHistory();

        $stockHistoryEntry->food_id = $request->food_id;
        $stockHistoryEntry->quantity = $request->quantity;

        $stockHistoryEntry->save();

        return response()->json($stockHistoryEntry, 201);
    }
}
