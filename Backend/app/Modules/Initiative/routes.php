<?php

/*----------------------------------------------------------
Initiatives
----------------------------------------------------------*/
Route::group(['prefix' => '/initiatives'] , function () {
    Route::get('/', 'InitiativeControllers@index');
    Route::get('/add', 'InitiativeControllers@add');
    Route::get('/arrange', 'InitiativeControllers@arrange');
    Route::get('/charts', 'InitiativeControllers@charts');
    Route::get('/edit/{id}', 'InitiativeControllers@edit');
    Route::post('/update/{id}', 'InitiativeControllers@update');
    Route::post('/fastEdit', 'InitiativeControllers@fastEdit');
	Route::post('/create', 'InitiativeControllers@create');
    Route::get('/delete/{id}', 'InitiativeControllers@delete');
    Route::post('/arrange/sort', 'InitiativeControllers@sort');

    /*----------------------------------------------------------
    Images
    ----------------------------------------------------------*/

    Route::post('/add/uploadImage', 'InitiativeControllers@uploadImage');
    Route::post('/edit/{id}/editImage', 'InitiativeControllers@uploadImage');
    Route::post('/edit/{id}/deleteImage', 'InitiativeControllers@deleteImage');
});