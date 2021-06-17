<?php

/*----------------------------------------------------------
User Card
----------------------------------------------------------*/
Route::group(['prefix' => '/userCards'] , function () {
    Route::get('/', 'UserCardControllers@index');
    Route::get('/edit/{id}', 'UserCardControllers@edit');
    Route::post('/update/{id}', 'UserCardControllers@update');
    Route::get('/charts', 'UserCardControllers@charts');
    Route::post('/fastEdit', 'UserCardControllers@fastEdit');
    Route::get('/delete/{id}', 'UserCardControllers@delete');
    Route::get('/{id}/printCard', 'UserCardControllers@printCard');
    Route::get('/{id}/viewCard', 'UserCardControllers@viewCard');
    Route::post('/newMember', 'UserCardControllers@newMember');

     /*----------------------------------------------------------
    Images
    ----------------------------------------------------------*/
    Route::post('/edit/{id}/editImage', 'UserCardControllers@uploadImage');
    Route::post('/edit/{id}/deleteImage', 'UserCardControllers@deleteImage');
});