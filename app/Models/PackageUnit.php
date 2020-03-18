<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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

    /**
     * @return PackageUnit[]
     */
    public function getAllPackageUnits() {
        $packageUnits = PackageUnit::all();

        return $packageUnits;
    }

    /**
     * @param int $packageUnitId
     *
     * @return PackageUnit
     */
    public function getPackageUnitByPackageUnitId($packageUnitId) {
        $packageUnit = PackageUnit::find($packageUnitId);

        return $packageUnit;
    }

    /**
     * @param Request $request
     *
     * @return PackageUnit
     */
    public function createOrUpdatePackageUnit(Request $request){
        if (!is_null($request->id)) {
            $packageUnit = $this->getPackageUnitByPackageUnitId($request->id);
        } else {
            $packageUnit = new PackageUnit();
        }

        $packageUnit->title = $request->title;
        $packageUnit->save();

        return $packageUnit;
    }

    /**
     * @param $packageUnitId
     *
     * @return bool
     */
    public function deletePackageUnit($packageUnitId) {
        $packageUnit = $this->getPackageUnitByPackageUnitId($packageUnitId);

        return $packageUnitId->delete();
    }
}
