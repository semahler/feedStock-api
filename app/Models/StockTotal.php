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
     * Mapping StockTotal to the corresponding Feed-Model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function feed() {
        return $this->belongsTo(Feed::class, 'feed_id', 'feed_id');
    }

    /**
     * @param int $feedId
     *
     * @return StockTotal
     */
    public function getStockTotalByFeedId($feedId) {
        $stockTotalEntry = StockTotal::where('feed_id', '=', $feedId)->first();

        return $stockTotalEntry;
    }

    /**
     * @param int $feedId
     * @param int $quantity
     */
    public function createOrUpdateStockTotalEntry($feedId, $quantity) {
        $stockTotalEntry = $this->getStockTotalByFeedId($feedId);
        if (!$stockTotalEntry) {
            $stockTotalEntry = new StockTotal();
            $stockTotalEntry->feed_id = $feedId;
        }

        $stockTotalEntry->quantity = $quantity;

        $stockTotalEntry->save();
    }

    /**
     * @param int $feedId
     *
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function deleteStockTotalEntry($feedId) {
        $result = $this->getStockTotalByFeedId($feedId);

        return response($result, 200);
    }
}
