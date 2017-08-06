<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    //    menage admins
    Route::get('/manage', ['middleware' => ['permission:edit-user'], 'as' => 'manage.admins', 'uses' => 'AdminController@manageAdmins']);
    Route::get('/createview/{type}', ['as' => 'admin.create', 'uses' => 'AdminController@createUserType']);
    Route::put('/createuser/{type}', ['as' => 'admin.createUser', 'uses' => 'AdminController@createUser']);
    Route::get('/updateuser/{id}', ['as' => 'admin.updateUser', 'uses' => 'AdminController@updateUserView']);
    Route::put('/updateuserdb/{id}', ['as' => 'admin.updateUserDb', 'uses' => 'AdminController@updateUserDB']);
    Route::get('/deleteuser/{id}', ['as' => 'admin.deleteUser', 'uses' => 'AdminController@deleteUser']);

    //menage groups
    Route::get('/manageGroups', ['middleware' => ['permission:edit-user'], 'as' => 'manage.groups', 'uses' => 'GroupsController@index']);
    Route::get('/createGroup', ['middleware' => ['permission:edit-user'], 'as' => 'manage.groupsCreateView', 'uses' => 'GroupsController@groupsCreateView']);
    Route::put('/createGroup/', ['as' => 'admin.createGroup', 'uses' => 'GroupsController@groupsCreate']);
    Route::get('/deleteGroup/{id}', ['as' => 'admin.deleteGroup', 'uses' => 'GroupsController@deleteGroup']);
    Route::get('/addUserGroup/{id}', ['as' => 'admin.addUsersGroup', 'uses' => 'GroupsController@addUsersGroup']);
    Route::get('/insertUserToGroup/{userId}/{groupId}', ['as' => 'admin.insertUserToGroup', 'uses' => 'GroupsController@insertUserToGroup']);
    Route::get('/deleteUserToGroup/{userId}/{groupId}', ['as' => 'admin.deleteUserToGroup', 'uses' => 'GroupsController@deleteUserToGroup']);

});
