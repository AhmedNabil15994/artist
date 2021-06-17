<?php

/*----------------------------------------------------------
Directors
----------------------------------------------------------*/
Route::group(['prefix' => '/directors'] , function () {
    Route::get('/', 'DirectorControllers@index');
    Route::get('/add', 'DirectorControllers@add');
    Route::get('/arrange', 'DirectorControllers@arrange');
    Route::get('/charts', 'DirectorControllers@charts');
    Route::get('/edit/{id}', 'DirectorControllers@edit');
    Route::post('/update/{id}', 'DirectorControllers@update');
    Route::post('/fastEdit', 'DirectorControllers@fastEdit');
	Route::post('/create', 'DirectorControllers@create');
    Route::get('/delete/{id}', 'DirectorControllers@delete');
    Route::post('/arrange/sort', 'DirectorControllers@sort');

    /*----------------------------------------------------------
    Images
    ----------------------------------------------------------*/

    Route::post('/add/uploadImage', 'DirectorControllers@uploadImage');
    Route::post('/edit/{id}/editImage', 'DirectorControllers@uploadImage');
    Route::post('/edit/{id}/deleteImage', 'DirectorControllers@deleteImage');
});