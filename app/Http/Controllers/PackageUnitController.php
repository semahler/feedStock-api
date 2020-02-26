<?php

namespace App\Http\Controllers;

use App\PackageUnit;
use Illuminate\Http\Request;

class PackageUnitController
{

    public function getPackageUnits() {
        $packageUnits = PackageUnit::all();

        return response()->json($packageUnits);
    }

    public function getPackageUnit($id) {
        $packageUnit = PackageUnit::find($id);

        return response()->json($packageUnit);
    }

    public function createPackageUnit(Request $request) {
        $packageUnit = new PackageUnit();

        $packageUnit->title = $request->title;
        $packageUnit->save();

        return response()->json($packageUnit, 201);
    }

    public function deletePackageUnit($id) {
        $packageUnit = PackageUnit::find($id);
        $packageUnit->delete();

        return response('Deleted Successfully', 200);
    }
}
