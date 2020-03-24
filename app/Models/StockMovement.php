<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class StockMovement extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_stock_movement';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'stock_movement_id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * @param int $feedId
     * @return StockMovement[]
     */
    public function getStockMovementEntriesByFeedId($feedId) {
        $stockMovementEntries = StockMovement::where('feed_id', '=', $feedId)
            ->orderBy('created_at', 'asc')
            ->get();

        return $stockMovementEntries;
    }

    /**
     * @param Request $request
     *
     * @return StockMovement
     */
    public function createStockMovementEntry(Request $request){
        $stockMovementEntry = new StockMovement();

        $stockMovementEntry->feed_id = $request->feed_id;
        $stockMovementEntry->quantity = $request->quantity;

        $stockMovementEntry->save();

        return $stockMovementEntry;
    }

    /**
     * @param int $feedId
     *
     * @return int
     */
    public function calculcateStockTotalQuantityByFeedId($feedId) {
        $stockTotal = 0;

        $stockMovementEntries = $this->getStockMovementEntriesByFeedId($feedId);
        foreach ($stockMovementEntries as $stockMovementEntry) {
            $stockTotal += $stockMovementEntry->quantity;
        }

        return $stockTotal;
    }
}

