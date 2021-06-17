<?php

/*----------------------------------------------------------
Orders
----------------------------------------------------------*/
Route::group(['prefix' => '/orders'] , function () {
    Route::get('/', 'OrderControllers@index');
    Route::get('/{id}/status/{status}', 'OrderControllers@status');
    Route::post('/fastEdit', 'OrderControllers@fastEdit');
    Route::post('/delete', 'OrderControllers@softDelete');
    Route::get('/delete/{id}', 'OrderControllers@delete');
    Route::get('/charts', 'OrderControllers@charts');
    Route::post('/changeStatus/{status}', 'OrderControllers@changeStatus');
    Route::get('/edit/{id}', 'OrderControllers@edit');
    Route::post('/update/{id}', 'OrderControllers@update');
});
