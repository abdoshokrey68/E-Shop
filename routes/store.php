<?php

use App\Http\Controllers\store\careerController;
use App\Http\Controllers\store\storeController;
use App\Http\Controllers\store\itemControiller;
use App\Http\Controllers\store\categoryController;
use App\Http\Controllers\store\orderController;
use App\Http\Controllers\store\messageController;


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function () {

    Route::group(['prefix' => 'store', 'middleware' => 'checkstore'], function () {
    // Route::group(['prefix' => 'store', 'middleware' => 'checkstore'], function () {
            Route::get('/{store_id}',                   [storeController::class, 'index'])->name('store.index');
            Route::get('add-to-cart/{item_id}',         [storeController::class, 'addToCart'])->name('store.addtocart')->middleware('auth');
            Route::get('remove-from-cart/{item_id}',    [storeController::class, 'removeFromCart'])->name('store.removefromcart')->middleware('auth');
            Route::get('category/{category_id}',        [storeController::class, 'category'])->name('store.category');
            Route::get('item/{item_id}',                [storeController::class, 'item'])->name('store.item');
            Route::post('message/{store_id}',           [storeController::class, 'message'])->name('store.message')->middleware('auth');
            Route::get('orders/{store_id}',             [storeController::class, 'orders'])->name('store.orders')->middleware('auth');
            Route::get('order/delete/{order_id}',       [storeController::class, 'order_delete'])->name('store.order.delete')->middleware('auth');
            Route::get('order/edit',                    [storeController::class, 'order_edit'])->name('store.order.edit')->middleware('auth');
            Route::get('pay_now/{store_id}',            [storeController::class, 'pay_now'])->name('store.pay_now')->middleware('auth');
            Route::get('search/{store_id}',             [storeController::class, 'search'])->name('search');
    }); // End of The Store

    // The  Dashbord Control
    Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function () {
        Route::get('/{store_id}',                   [storeController::class, 'dashboard'])->name('dashboard');
        Route::get('pay_coins/{store_id}',          [storeController::class, 'pay_coins'])->name('pay_coins');
        Route::post('renew_sub/{store_id}',         [storeController::class, 'renew_sub'])->name('renew_sub');
        // The Store Control On Dashbord
        Route::group(['prefix' => 'myinfo'], function () {
            Route::get('edit/{store_id}',           [storeController::class, 'editinfo'])   ->name('dashboard.info.edit');
            Route::post('update/{store_id}',        [storeController::class, 'updateinfo']) ->name('dashboard.info.update');
        }); // end store control

        // The Items Control On Dashbord
        Route::group(['prefix' => 'item'], function () {
            Route::get('/{store_id}',               [itemControiller::class, 'items'])      ->name('dashboard.items');
            Route::get('add/{store_id}',            [itemControiller::class, 'additem'])    ->name('dashboard.items.add');
            Route::post('create/{store_id}',        [itemControiller::class, 'createitem']) ->name('dashboard.items.create');
            Route::get('edit/{item_id}',            [itemControiller::class, 'edititem'])   ->name('dashboard.items.edit');
            Route::post('update/{item_id}',         [itemControiller::class, 'updateitem']) ->name('dashboard.items.update');
            Route::get('delete/{item_id}',          [itemControiller::class, 'deleteitem']) ->name('dashboard.items.delete');
        }); // end items control

        // The Category Control On Dashbord
        Route::group(['prefix' => 'category'], function () {
            Route::get('add/{store_id}',            [categoryController::class, 'add'])     ->name('dashboard.categorys.add');
            Route::post('create/{store_id}',        [categoryController::class, 'create'])  ->name('dashboard.categorys.create');
            Route::get('edit/{category_id}',        [categoryController::class, 'edit'])    ->name('dashboard.categorys.edit');
            Route::post('update/{category_id}',     [categoryController::class, 'update'])  ->name('dashboard.categorys.update');
            Route::get('delete/{category_id}',      [categoryController::class, 'delete'])  ->name('dashboard.categorys.delete');
        }); // end category control

            // The Orders Control On Dashbord
            Route::group(['prefix' => 'order'], function () {
                Route::get('/{store_id}',           [orderController::class, 'index'])      ->name('dashboard.order');
                Route::get('done/{store_id}',       [orderController::class, 'done'])       ->name('dashboard.order.done');
                Route::get('pending/{store_id}',    [orderController::class, 'pending'])    ->name('dashboard.order.pending');
                Route::get('delete/{order_id}',     [orderController::class, 'delete'])     ->name('dashboard.order.delete');
                // Route::get('add/{id}', [orderController::class, 'add'])->name('dashboard.order.add');
                // Route::post('create/{id}', [orderController::class, 'create'])->name('dashboard.order.create');
                // Route::get('edit/{orderid}', [orderController::class, 'edit'])->name('dashboard.order.edit');
            }); // end category control

            Route::group(['prefix' => 'message'], function () {
                Route::get('/{store_id}',           [messageController::class, 'index'])    ->name('dashboard.message');
                Route::get('delete/{message_id}',   [messageController::class, 'delete'])   ->name('dashboard.message.delete');
            }); // end category control

            Route::group(['prefix' => 'career'], function () {
                Route::get('/{store_id}',               [careerController::class, 'index'])    ->name('dashboard.career');
                Route::get('new/{store_id}',            [careerController::class, 'new'])   ->name('dashboard.career.new');
                Route::post('create/{store_id}',        [careerController::class, 'create'])   ->name('dashboard.career.create');
                Route::get('edit/{career_id}',          [careerController::class, 'edit'])   ->name('dashboard.career.edit');
                Route::post('update/{career_id}',       [careerController::class, 'update'])   ->name('dashboard.career.update');
                Route::get('delete/{career_id}',        [careerController::class, 'delete'])   ->name('dashboard.career.delete');
                // Route::get('CS_AV/{career_id}',         [careerController::class, 'status_av'])   ->name('dashboard.career.status_av');
                // Route::get('CS_N_AV/{career_id}',       [careerController::class, 'status_n_av'])   ->name('dashboard.career.status_n_av');
            }); // end category control
    }); // End of Dashboard Store
});
