<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {

    $router->get('manufacturers', [
        'uses' => 'ManufacturerController@getManufacturers'
    ]);
    $router->get('manufacturers/{id}', [
        'uses' => 'ManufacturerController@getManufacturer'
    ]);
    $router->post('manufacturers', [
        'uses' => 'ManufacturerController@createManufacturer'
    ]);
    $router->delete('manufacturers/{id}', [
        'uses' => 'ManufacturerController@deleteManufacturer'
    ]);
    $router->put('manufacturers/{id}', [
        'uses' => 'ManufacturerController@updateManufacturer'
    ]);

    $router->get('package_units', [
        'uses' => 'PackageUnitController@getPackageUnits'
    ]);
    $router->get('package_units/{id}', [
        'uses' => 'PackageUnitController@getPackageUnit'
    ]);
    $router->post('package_units', [
        'uses' => 'PackageUnitController@createPackageUnit'
    ]);
    $router->delete('package_units/{id}', [
        'uses' => 'PackageUnitController@deletePackageUnit'
    ]);

    $router->get('food_types', [
        'uses' => 'FoodTypeController@getFoodTypes'
    ]);
    $router->get('food_types/{id}', [
        'uses' => 'FoodTypeController@getFoodType'
    ]);
    $router->post('food_types', [
        'uses' => 'FoodTypeController@createFoodType'
    ]);
    $router->delete('food_types/{id}', [
        'uses' => 'FoodTypeController@deleteFoodType'
    ]);

    $router->get('foods', [
        'uses' => 'FoodController@getFoods'
    ]);
    $router->get('foods/{id}', [
        'uses' => 'FoodController@getFood'
    ]);
    $router->post('foods', [
        'uses' => 'FoodController@createFood'
    ]);
    $router->put('foods/{id}', [
        'uses' => 'FoodController@updateFood'
    ]);
    $router->delete('foods/{id}', [
        'uses' => 'FoodController@deleteFood'
    ]);

    $router->get('comments/{id}', [
        'uses' => 'CommentsController@getCommentsByFoodId'
    ]);
    $router->post('comments', [
        'uses' => 'CommentsController@createComment'
    ]);

    $router->get('stock_history/{id}', [
        'uses' => 'StockHistoryController@getStockHistoryEntriesByFoodId'
    ]);
    $router->post('stock_history/', [
        'uses' => 'StockHistoryController@createStockHistoryEntry'
    ]);

});
