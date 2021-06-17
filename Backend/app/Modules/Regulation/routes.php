<?php

/*----------------------------------------------------------
Regulations
----------------------------------------------------------*/
Route::group(['prefix' => '/regulations'] , function () {
    Route::get('/', 'RegulationControllers@index');
    Route::get('/add', 'RegulationControllers@add');
    Route::get('/arrange', 'RegulationControllers@arrange');
    Route::get('/charts', 'RegulationControllers@charts');
    Route::get('/edit/{id}', 'RegulationControllers@edit');
    Route::post('/update/{id}', 'RegulationControllers@update');
    Route::post('/fastEdit', 'RegulationControllers@fastEdit');
	Route::post('/create', 'RegulationControllers@create');
    Route::get('/delete/{id}', 'RegulationControllers@delete');
    Route::post('/arrange/sort', 'RegulationControllers@sort');

    /*----------------------------------------------------------
    Images
    ----------------------------------------------------------*/

    Route::post('/add/uploadImage', 'RegulationControllers@uploadImage');
    Route::post('/edit/{id}/editImage', 'RegulationControllers@uploadImage');
    Route::post('/edit/{id}/deleteImage', 'RegulationControllers@deleteImage');
});