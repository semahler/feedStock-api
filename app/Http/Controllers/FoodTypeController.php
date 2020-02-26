<?php

namespace App\Http\Controllers;

use App\FoodType;
use Illuminate\Http\Request;

class FoodTypeController
{

    public function getFoodTypes() {
        $foodTypes = FoodType::all();

        return response()->json($foodTypes);
    }

    public function getFoodType($id) {
        $foodType = FoodType::find($id);

        return response()->json($foodType);
    }

    public function createFoodType(Request $request) {
        $foodType = new FoodType();

        $foodType->title = $request->title;
        $foodType->save();

        return response()->json($foodType, 201);
    }

    public function deleteFoodType($id) {
        $foodType = FoodType::find($id);
        $foodType->delete();

        return response('Deleted Successfully', 200);
    }
}
