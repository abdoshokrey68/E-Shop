<?php

use App\Http\Controllers\apiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getstores',                     [apiController::class, 'getstores']);
Route::get('searchstores',                  [apiController::class, 'searchstores']);
Route::get('getcareers',                    [apiController::class, 'getcareers']);
Route::get('searchcareer',                  [apiController::class, 'searchcareer']);


Route::get('storeinfo/{store_id}',          [apiController::class, 'storeinfo']);
Route::get('category_items/{category_id}',  [apiController::class, 'category_items']);
Route::get('iteminfo/{item_id}',            [apiController::class, 'iteminfo']);
Route::get('getorder/{item_id}/{user_id}',  [apiController::class, 'getorder']);
Route::get('orderscount/{store_id}/{user_id}',  [apiController::class, 'orderscount']);
Route::get('getotheritems/{store_id}',      [apiController::class, 'getotheritems']);
Route::get('searchitems/{store_id}',        [apiController::class, 'searchitems']);

Route::get('getorders/{store_id}/{user_id}',           [apiController::class, 'getorders']);
