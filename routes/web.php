<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AcceuilController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[AcceuilController::class, 'index'])->name('welcome');

Route::get('/awards',[AcceuilController::class, 'awards'])->name('awards');

// Authentification
Route::get('/authenticate', [UserController::class, 'authenticate'])->name('authenticate')->middleware('guest');

Route::post('/authenticateSave', [UserController::class, 'authenticateSave'])->name('authenticateSave')->middleware('guest');

// Déconnexion
Route::delete('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/apropos', function () {
    return view('apropos');
})->name('apropos');

//Route::get('/Nominer',[UserController::class, 'nominer'] )->name('nomine');

Route::get('/nomines', [AcceuilController::class, 'nomines'])->name('nomines');

Route::get('/voter/{id}', [AcceuilController::class, 'voter'])->name('voter');

Route::get('/chatBox', [AcceuilController::class, 'chatBox'])->name('chatbox');

Route::post('/chatBox', [AcceuilController::class, 'storeChat'])->name('chatbox.store');





Route::prefix('admin')->middleware('admin')->name('admin.')->group(function(){

    //Get Awards datas
    Route::get('/awards', 'App\Http\Controllers\AwardController@index')->name('award.index');

    //Show Award by Id
    Route::get('/awards/show/{id}', 'App\Http\Controllers\AwardController@show')->name('award.show');

    //Get Awards by Id
    Route::get('/awards/create', 'App\Http\Controllers\AwardController@create')->name('award.create');

    //Edit Award by Id
    Route::get('/awards/edit/{id}', 'App\Http\Controllers\AwardController@edit')->name('award.edit');

    //Save new Award
    Route::post('/awards/store', 'App\Http\Controllers\AwardController@store')->name('award.store');

    //Update One Award
    Route::put('/awards/update/{award}', 'App\Http\Controllers\AwardController@update')->name('award.update');

    //Update One Award Speedly
    Route::put('/awards/speed/{award}', 'App\Http\Controllers\AwardController@updateSpeed')->name('award.update.speed');

    //Delete Award
    Route::delete('/awards/delete/{award}', 'App\Http\Controllers\AwardController@delete')->name('award.delete');

});
Route::prefix('admin')->middleware('admin')->name('admin.')->group(function(){

    //Get Roles datas
    Route::get('/roles', 'App\Http\Controllers\RoleController@index')->name('role.index');

    //Show Role by Id
    Route::get('/roles/show/{id}', 'App\Http\Controllers\RoleController@show')->name('role.show');

    //Get Roles by Id
    Route::get('/roles/create', 'App\Http\Controllers\RoleController@create')->name('role.create');

    //Edit Role by Id
    Route::get('/roles/edit/{id}', 'App\Http\Controllers\RoleController@edit')->name('role.edit');

    //Save new Role
    Route::post('/roles/store', 'App\Http\Controllers\RoleController@store')->name('role.store');

    //Update One Role
    Route::put('/roles/update/{role}', 'App\Http\Controllers\RoleController@update')->name('role.update');

    //Update One Role Speedly
    Route::put('/roles/speed/{role}', 'App\Http\Controllers\RoleController@updateSpeed')->name('role.update.speed');

    //Delete Role
    Route::delete('/roles/delete/{role}', 'App\Http\Controllers\RoleController@delete')->name('role.delete');

});
Route::prefix('admin')->middleware('admin')->name('admin.')->group(function(){

    //Get Users datas
    Route::get('/users', 'App\Http\Controllers\UserController@index')->name('user.index');

    //Show User by Id
    Route::get('/users/show/{id}', 'App\Http\Controllers\UserController@show')->name('user.show');

    //Get Users by Id
    Route::get('/users/create', 'App\Http\Controllers\UserController@create')->name('user.create');

    //Edit User by Id
    Route::get('/users/edit/{id}', 'App\Http\Controllers\UserController@edit')->name('user.edit');

    //Save new User
    Route::post('/users/store', 'App\Http\Controllers\UserController@store')->name('user.store');

    //Update One User
    Route::put('/users/update/{user}', 'App\Http\Controllers\UserController@update')->name('user.update');

    //Update One User Speedly
    Route::put('/users/speed/{user}', 'App\Http\Controllers\UserController@updateSpeed')->name('user.update.speed');

    //Delete User
    Route::delete('/users/delete/{user}', 'App\Http\Controllers\UserController@delete')->name('user.delete');

});
Route::prefix('admin')->middleware('admin')->name('admin.')->group(function(){

    //Get Roles datas
    Route::get('/nomines', 'App\Http\Controllers\NomineController@index')->name('nomine.index');

    //Show Role by Id
    Route::get('/nomines/show/{id}', 'App\Http\Controllers\NomineController@show')->name('nomine.show');

    //Get Roles by Id
    Route::get('/nomines/create', 'App\Http\Controllers\NomineController@create')->name('nomine.create');

    //Edit Role by Id
    Route::get('/nomines/edit/{id}', 'App\Http\Controllers\NomineController@edit')->name('nomine.edit');

    //Save new Role
    Route::post('/nomines/store', 'App\Http\Controllers\NomineController@store')->name('nomine.store');

    //Update One Role
    Route::put('/nomines/update/{id}', 'App\Http\Controllers\NomineController@update')->name('nomine.update');

    //Update One Role Speedly
    Route::put('/nomines/speed/{id}', 'App\Http\Controllers\NomineController@updateSpeed')->name('nomine.speed');

    //Delete Role
    Route::delete('/nomines/delete/{id}', 'App\Http\Controllers\NomineController@delete')->name('nomine.delete');

});

Route::prefix('admin')->middleware('admin')->name('admin.')->group(function(){

    //Get Roles datas
    Route::get('/votes', 'App\Http\Controllers\VoteController@index')->name('vote.index');

});

Route::prefix('admin')->middleware('admin')->name('admin.')->group(function(){

    //Get Roles datas
    Route::get('/chats', 'App\Http\Controllers\ChatController@index')->name('chat.index');

    //Show Role by Id
    Route::get('/chats/show/{id}', [ChatController::class, 'show'])->name('chat.show');

    //Edit Role by Id
    Route::get('/chats/edit/{id}', 'App\Http\Controllers\ChatController@edit')->name('chat.edit');

    //Update One Role
    Route::put('/chats/update/{id}', 'App\Http\Controllers\ChatController@update')->name('chat.update');

    //Update One Role Speedly
    Route::put('/chats/speed/{id}', 'App\Http\Controllers\ChatController@updateSpeed')->name('chat.speed');


});
