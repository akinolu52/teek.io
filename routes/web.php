<?php

Route::get('/', [
    'uses' => 'PublicController@index',
    'as' => 'welcome'
]);

Route::get('/policy', function (){
    return view('policy');
});

Route::get('/terms', function (){
    return view('terms');
});

Route::get('/support', function (){
    return view('support');
});

Route::get('/clear', function (){
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    echo 'clear';
});

Route::get('register', [
    'uses' => 'UserController@getRegister',
]);

Route::post('register', [
    'uses' => 'UserController@postRegister',
    'as' => 'register'
]);

Route::get('login', [
    'uses' => 'UserController@getLogin',
    'as' => 'get.login'
]);

Route::post('login', [
    'uses' => 'UserController@postLogin',
    'as' => 'login'
]);

Route::get('login/{provider}', [
    'uses' => 'UserController@redirectToProvider',
    'as' => 'social.login'
]);

Route::get('login/{provider}/callback', 'UserController@handleProviderCallback');

Route::post('logout', [
    'as' => 'logout',
    'uses' => 'UserController@logout'
]);

Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'assistant'], function () {

        Route::get('/', [
            'as' => 'assistant.dashboard',
            'uses' => 'AssistantController@index'
        ]);

        Route::get('task', [
            'as' => 'assistant.task',
            'uses' => 'TaskController@index'
        ]);

        Route::get('/{name?}', [
            'as' => 'assistant.profile',
            'uses' => 'UserController@profile'
        ]);
    });

    Route::group(['prefix' => 'user'], function () {

        Route::get('/', [
            'as' => 'user.dashboard',
            'uses' => 'UserController@index'
        ]);

        Route::post('notifyUpdate', [
            'as' => 'notify.update',
            'uses' => 'NotifyController@update'
        ]);

        Route::get('weeklyChart', [
            'as' => 'task.weeklyChart',
            'uses' => 'TaskController@weeklyChart'
        ]);

        Route::get('yearlyChart', [
            'as' => 'task.yearlyChart',
            'uses' => 'TaskController@yearlyChart'
        ]);

        Route::get('calendarChart', [
            'as' => 'task.calendar',
            'uses' => 'TaskController@calendarChart'
        ]);

        Route::post('assign', [
            'as' => 'task.assign',
            'uses' => 'TaskController@assign'
        ]);

        Route::post('undone/{task}', [
            'as' => 'task.undone',
            'uses' => 'TaskController@undone'
        ]);

        Route::post('complete', [
            'as' => 'task.complete',
            'uses' => 'TaskController@complete'
        ]);

        Route::post('updateAvatar', [
            'as' => 'user.avatar',
            'uses' => 'UserController@updateAvatar'
        ]);

        Route::post('/update', [
            'as' => 'user.update',
            'uses' => 'UserController@update'
        ]);

        Route::get('/calendar', [
            'as' => 'user.calendar',
            'uses' => 'UserController@calendar'
        ]);

        Route::get('/user', [
            'as' => 'task.user',
            'uses' => 'TaskController@userTask'
        ]);

        Route::resources([
            'task' => 'TaskController',
        ]);

        Route::get('/{id}', [
            'as' => 'user.profile',
            'uses' => 'UserController@profile'
        ]);
    });

});
