<?php

Route::get('/', 'CategoryController@index')->name('category.index');

Route::post('categories', 'CategoryController@getSubcategories')->name('subcategories');
