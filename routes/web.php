<?php

use Illuminate\Support\Facades\Route;


Route::group([
    'as' => 'admin.',
    'prefix' => 'admin',
], function () {
    Route::group([
        'namespace' => 'Admin',
    ], function () {
        Route::apiResource('tasks', 'TasksController')->except('show', 'create', 'edit', 'update', 'store');
        Route::get('tasks/edit/{id}','TasksController@edit')->name('tasks.edit');
        Route::put('tasks/update/{id}','TasksController@update')->name('tasks.update');
    });

    Route::group([
        'namespace' => 'Auth',
    ], function () {
        Route::get('/login', 'LoginController@showLoginForm');
        Route::post('/login', 'LoginController@login')->name('login');
        Route::post('/logout', 'LoginController@logout')->name('logout');
    });
});

Route::group([
    'namespace' => 'Client',
], function () {
    Route::get('/', 'TasksController@index')->name('main_page');
    Route::get('/add', 'TasksController@create')->name('add_task');
    Route::post('/add', 'TasksController@store')->name('save_task');
    Route::get('sort/table', 'TasksController@sortTable');
});
