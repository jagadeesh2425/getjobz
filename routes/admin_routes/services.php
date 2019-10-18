<?php

/* * ******  Package Start ********** */
Route::get('list-services', array_merge(['uses' => 'Admin\ServiceController@indexServices'], $all_users))->name('list.services');
Route::get('create-service', array_merge(['uses' => 'Admin\ServiceController@createServices'], $all_users))->name('create.service');
Route::get('fetch-services', array_merge(['uses' => 'Admin\ServiceController@fetchServicesData'], $all_users))->name('fetch.data.services');
Route::delete('delete-service', array_merge(['uses' => 'Admin\ServiceController@deleteService'], $all_users))->name('delete.service');
Route::get('edit-service/{id}', array_merge(['uses' => 'Admin\ServiceController@editService'], $all_users))->name('edit.service');
Route::put('update-service/{id}', array_merge(['uses' => 'Admin\ServiceController@updateService'], $all_users))->name('update.service');
Route::post('store-service', array_merge(['uses' => 'Admin\ServiceController@storeService'], $all_users))->name('store.service');
/* * ****** End Package ********** */