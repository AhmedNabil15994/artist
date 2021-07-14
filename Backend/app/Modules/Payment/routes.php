<?php

/*----------------------------------------------------------
Payments
----------------------------------------------------------*/
Route::group(['prefix' => '/payments'] , function () {
    
    Route::get('/pay','PaymentControllers@index');
});
