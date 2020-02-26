<?php

namespace App\Http\Controllers;

use App\Food;
use Illuminate\Http\Request;

class FoodController
{

    public function getFoods() {
        $foods = Food::all();

        return response()->json($foods);
    }

    public function getFood($id) {
        $food = Food::find($id);

        return response()->json($food);
    }

    public function createFood(Request $request) {
        $food = new Food();

        $food->manufacturer_id = $request->manufacturer_id;
        $food->food_type_id = $request->food_type_id;
        $food->package_unit_id = $request->package_unit_id;
        $food->name = $request->name;
        $food->status = $request->status;
        $food->rating = $request->rating;
        $food->url = $request->url;

        $food->save();

        return response()->json(food, 201);
    }

    public function updateFood($id, Request $request){
        $food = Food::find($id);

        $food->manufacturer_id = $request->manufacturer_id;
        $food->food_type_id = $request->food_type_id;
        $food->package_unit_id = $request->package_unit_id;
        $food->name = $request->name;
        $food->status = $request->status;
        $food->rating = $request->rating;
        $food->url = $request->url;

        $food->update();

        return response()->json($food, 200);
    }

    public function deleteFood($id) {
        $food = Food::find($id);
        $food->delete();

        return response('Deleted Successfully', 200);
    }
}
