<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockTotal extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_stock_total';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'stock_total_id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * @param int $feedId
     *
     * @return StockTotal
     */
    public function getStockTotalByFeedId($feedId) {
        $stockTotal = StockTotal::where('feed_id', '=', $feedId)->get();

        return $stockTotal;
    }
}
