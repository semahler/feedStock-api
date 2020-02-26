<?php

namespace App\Http\Controllers;

use App\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController
{

    public function getManufacturers() {
        $manufacturers = Manufacturer::all();

        return response()->json($manufacturers);
    }

    public function getManufacturer($id) {
        $manufacturer = Manufacturer::find($id);

        return response()->json($manufacturer);
    }

    public function createManufacturer(Request $request) {
        $manufacturer = new Manufacturer();

        $manufacturer->name = $request->name;
        $manufacturer->url = $request->url;
        $manufacturer->image = $request->image;

        $manufacturer->save();

        return response()->json($manufacturer, 201);
    }

    public function updateManufacturer($id, Request $request){
        $manufacturer = Manufacturer::find($id);

        $manufacturer->name = $request->name;
        $manufacturer->url = $request->url;
        $manufacturer->image = $request->image;

        $manufacturer->update();

        return response()->json($manufacturer, 200);
    }

    public function deleteManufacturer($id) {
        $manufacturer = Manufacturer::find($id);
        $manufacturer->delete();

        return response('Deleted Successfully', 200);
    }
}
