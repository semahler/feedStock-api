<?php

namespace App\Http\Controllers;

use App\Models\PackageUnit;
use Illuminate\Http\Request;

class PackageUnitController
{

    /**
     * Controller constructor.
     *
     * @param  \App\Models\PackageUnit  $packageUnit
     */
    public function __construct(PackageUnit $packageUnit)
    {
        $this->packageUnit = $packageUnit;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPackageUnits() {
        $packageUnits = $this->packageUnit->getAllPackageUnits();

        return response()->json($packageUnits);
    }

    /**
     * @param int $packageUnitId
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPackageUnit($packageUnitId) {
        $packageUnit = $this->packageUnit->getPackageUnitByPackageUnitId($packageUnitId);

        return response()->json($packageUnitId);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function createOrUpdatePackageUnit(Request $request) {
        $packageUnit = $this->packageUnit->createOrUpdatePackageUnit($request);

        return response($packageUnit, 200);
    }

    /**
     * @param int $packageUnitId
     *
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function deletePackageUnit($packageUnitId) {
        $result = $this->packageUnit->deletePackageUnit($packageUnitId);

        return response($result, 200);
    }
}
