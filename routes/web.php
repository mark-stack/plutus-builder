<?php

Route::get('/', 'FrontendController@landing');

//Social Login
Route::get('/auth/redirect/{social}', 'SocialController@redirect');
Route::get('/callback/{social}', 'SocialController@callback');

//Auth
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

//Admin
Route::prefix('admin')->middleware(['auth','admincheck'])->group(function () { 

    //Codeblocks CRUD
    Route::get('/', function(){
        return redirect('/admin/codeblocks');
    });
    Route::resource('codeblocks', 'CodeblockController');
    Route::post('/assign-templates', 'AdminController@assignTemplates')->name('assign.templates');

    //Users
    Route::get('/users', 'UserController@index');
});

//User
Route::middleware(['auth', 'user'])->group(function () { 

    //Scripts CRUD
    Route::resource('scripts', 'ScriptController');

    //Script extra functions
    Route::post('/scripts/rename/{script}', 'ScriptController@scriptRename')->name('scripts.rename');
    Route::get('/scripts/copy/{script}','ScriptController@scriptCopy')->name('scripts.copy');
});



