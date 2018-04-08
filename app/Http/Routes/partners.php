<?php
Route::group(['namespace' => 'Partner', 'middleware' => ['web']], function ($router) {

    Route::get('/{'.$this->prefix.'}', 'PartnerController@index');

    Route::group(['prefix' => $this->prefix], function ($router) {

        Route::get('/bills', 'PartnerController@bills');

    });
});
