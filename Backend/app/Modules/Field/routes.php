<?php

/*----------------------------------------------------------
Field
----------------------------------------------------------*/
Route::group(['prefix' => '/fields'] , function () {
    Route::get('/', 'FieldControllers@index');
    Route::get('/add', 'FieldControllers@add');
    Route::get('/arrange', 'FieldControllers@arrange');
    Route::get('/charts', 'FieldControllers@charts');
    Route::get('/edit/{id}', 'FieldControllers@edit');
    Route::post('/update/{id}', 'FieldControllers@update');
    Route::post('/fastEdit', 'FieldControllers@fastEdit');
	Route::post('/create', 'FieldControllers@create');
    Route::get('/delete/{id}', 'FieldControllers@delete');
    Route::post('/arrange/sort', 'FieldControllers@sort');
});