<?php

/*----------------------------------------------------------
Founders
----------------------------------------------------------*/
Route::group(['prefix' => '/founders'] , function () {
    Route::get('/', 'FounderControllers@index');
    Route::get('/add', 'FounderControllers@add');
    Route::get('/arrange', 'FounderControllers@arrange');
    Route::get('/charts', 'FounderControllers@charts');
    Route::get('/edit/{id}', 'FounderControllers@edit');
    Route::post('/update/{id}', 'FounderControllers@update');
    Route::post('/fastEdit', 'FounderControllers@fastEdit');
	Route::post('/create', 'FounderControllers@create');
    Route::get('/delete/{id}', 'FounderControllers@delete');
    Route::post('/arrange/sort', 'FounderControllers@sort');

    /*----------------------------------------------------------
    Images
    ----------------------------------------------------------*/

    Route::post('/add/uploadImage', 'FounderControllers@uploadImage');
    Route::post('/edit/{id}/editImage', 'FounderControllers@uploadImage');
    Route::post('/edit/{id}/deleteImage', 'FounderControllers@deleteImage');
});