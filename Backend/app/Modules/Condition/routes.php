<?php

/*----------------------------------------------------------
Membership Conditions
----------------------------------------------------------*/
Route::group(['prefix' => '/conditions'] , function () {
    Route::get('/', 'ConditionControllers@index');
    Route::get('/add', 'ConditionControllers@add');
    Route::get('/arrange', 'ConditionControllers@arrange');
    Route::get('/charts', 'ConditionControllers@charts');
    Route::get('/edit/{id}', 'ConditionControllers@edit');
    Route::post('/update/{id}', 'ConditionControllers@update');
    Route::post('/fastEdit', 'ConditionControllers@fastEdit');
	Route::post('/create', 'ConditionControllers@create');
    Route::get('/delete/{id}', 'ConditionControllers@delete');
    Route::post('/arrange/sort', 'ConditionControllers@sort');
});