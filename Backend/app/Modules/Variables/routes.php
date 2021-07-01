<?php

/*----------------------------------------------------------
Variables
----------------------------------------------------------*/
Route::group(['prefix' => '/generalSettings'] , function () {
    Route::get('/', 'VariablesControllers@index');
    Route::post('/{id}/editImage', 'VariablesControllers@uploadImage');
    Route::post('/update/{type}', 'VariablesControllers@update');
    Route::post('/{id}/deleteImage', 'VariablesControllers@deleteImage');
});

Route::group(['prefix' => '/panelSettings'] , function () {
    Route::get('/', 'VariablesControllers@panel');
    Route::post('/editImage/{id}', 'VariablesControllers@uploadImage');
    Route::post('/{id}/deleteImage', 'VariablesControllers@deleteImage');
    Route::post('/update/{type}', 'VariablesControllers@update');
});
