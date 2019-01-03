<?php

Route::group(['prefix' => '/', 'namespace' => 'Ajax', 'as' => 'ajax.'], function () {
    Route::get('/shops', 'ShopAJaxController@index')->name('shop');
    Route::get('/product', 'ShopAJaxController@addToCart')->name('product');
});