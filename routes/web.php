<?php

Route::group(['middleware' => ['auth.shopify']], function () {
    Route::get('/dashboard', 'LenseCoatingController@index')->name('home');

    Route::post('/lens/create', 'LenseCoatingController@lens_save')->name('lens.save');
    Route::post('/lens/{id}/update', 'LenseCoatingController@lens_update')->name('lens.update');
    Route::get('/lens/{id}/delete', 'LenseCoatingController@lens_delete')->name('lens.delete');

    Route::post('/coating/create', 'LenseCoatingController@coating_save')->name('coating.save');
    Route::post('/coating/{id}/update', 'LenseCoatingController@coating_update')->name('coating.update');
    Route::get('/coating/{id}/delete', 'LenseCoatingController@coating_delete')->name('coating.delete');


    Route::get('/getLenses', 'LenseCoatingController@getLenses')->name('lenses.all');
    Route::get('/getCoatings', 'LenseCoatingController@getCoatings')->name('coatings.all');
});

Route::post('/place/order', 'HelperController@place_order')->name('place.order');


