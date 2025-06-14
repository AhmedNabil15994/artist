<?php

/*----------------------------------------------------------
Home
----------------------------------------------------------*/
Route::group(['prefix' => '/'] , function () {
    Route::get('/', 'HomeControllers@index');
    Route::get('/aboutUs', 'HomeControllers@aboutUs');
    Route::get('/events', 'HomeControllers@events');
    
    Route::get('/founders', 'HomeControllers@founders');
    Route::get('/directors', 'HomeControllers@directors');

    Route::post('/contactUs', 'HomeControllers@postContactUs');

    Route::get('/regulations', 'HomeControllers@regulations');


    Route::get('/registeration', 'HomeControllers@registeration');
    Route::post('/registeration', 'HomeControllers@postOrder');
    Route::get('/done', 'HomeControllers@done');
    
    Route::get('/complete/{id}', 'HomeControllers@complete');
    Route::post('/complete/{id}', 'HomeControllers@postComplete');


    Route::get('/payment/{id}', 'HomeControllers@payment');
    Route::get('/paymentGateway/{type}','HomeControllers@paymentGateway');
    Route::get('/checkPayment', 'HomeControllers@checkPayment');
    Route::get('/paymentFailed', 'HomeControllers@paymentFailed');
    Route::get('/paymentSuccess', 'HomeControllers@paymentSuccess');

    Route::get('/printCard/{id}', 'HomeControllers@printCard');

    Route::get('/memberships', 'HomeControllers@memberships');

});
