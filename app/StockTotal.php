<?php

namespace App;

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

}
