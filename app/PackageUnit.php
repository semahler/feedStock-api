<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageUnit extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_package_unit';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'package_unit_id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

}
