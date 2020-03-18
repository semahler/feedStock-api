<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class StockHistory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_stock_history';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'stock_history_id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * @param int $feedId
     * @return StockHistory[]
     */
    public function getStockHistoryEntriesByFeedId($feedId) {
        $stockHistoryEntries = StockHistory::where('feed_id', '=', $feedId)->get();

        return $stockHistoryEntries;
    }

    /**
     * @param Request $request
     *
     * @return StockHistory
     */
    public function createStockHistoryEntry(Request $request){
        $stockHistoryEntry = new StockHistory();

        $stockHistoryEntry->feed_id = $request->feed_id;
        $stockHistoryEntry->quantity = $request->quantity;

        $stockHistoryEntry->save();

        return $stockHistoryEntry;
    }
}

