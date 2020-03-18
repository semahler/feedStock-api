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
        'uses' => 'ManufacturerController@createOrUpdateManufacturer'
    ]);
    $router->delete('manufacturers/{id}', [
        'uses' => 'ManufacturerController@deleteManufacturer'
    ]);

    $router->get('package_units', [
        'uses' => 'PackageUnitController@getPackageUnits'
    ]);
    $router->get('package_units/{id}', [
        'uses' => 'PackageUnitController@getPackageUnit'
    ]);
    $router->post('package_units', [
        'uses' => 'PackageUnitController@createOrUpdatePackageUnit'
    ]);
    $router->delete('package_units/{id}', [
        'uses' => 'PackageUnitController@deletePackageUnit'
    ]);

    $router->get('feed_types', [
        'uses' => 'FeedTypeController@getFeedTypes'
    ]);
    $router->get('feed_types/{id}', [
        'uses' => 'FeedTypeController@getFeedType'
    ]);
    $router->post('feed_types', [
        'uses' => 'FeedTypeController@createOrUpdateFeedType'
    ]);
    $router->delete('feed_types/{id}', [
        'uses' => 'FeedTypeController@deleteFeedType'
    ]);

    $router->get('feeds', [
        'uses' => 'FeedController@getFeeds'
    ]);
    $router->get('feeds/{id}', [
        'uses' => 'FeedController@getFeed'
    ]);
    $router->post('feeds', [
        'uses' => 'FeedController@createOrUpdateFeed'
    ]);
    $router->delete('feeds/{id}', [
        'uses' => 'FeedController@deleteFeed'
    ]);

    $router->get('comments/{id}', [
        'uses' => 'CommentsController@getCommentsByFeedId'
    ]);
    $router->post('comments', [
        'uses' => 'CommentsController@createComment'
    ]);

    $router->get('stock_history/{id}', [
        'uses' => 'StockHistoryController@getStockHistoryEntriesByFeedId'
    ]);
    $router->post('stock_history/', [
        'uses' => 'StockHistoryController@createStockHistoryEntry'
    ]);

    $router->get('stock_total/{id}', [
       'uses' => 'StockTotalController@getStockTotalByFeedId'
    ]);

});
