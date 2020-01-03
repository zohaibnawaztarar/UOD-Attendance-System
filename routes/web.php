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



Route::group(['middleware'=> ['web']], function (){
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::post('/signup', [
        'uses' => 'UserController@postSignUp',
        'as' => 'signup'
    ]);

    Route::post('/signin', [
        'uses' => 'UserController@postSignIn',
        'as' => 'signin'
    ]);

    Route::get('/dashboard', [
        'uses' => 'UserController@getDashboard',
        'as' => 'dashboard',
        'middleware' => 'auth'
    ]);

    Route::get('/register', [
        'uses' => 'UserController@getRegister',
        'as' => 'register',
    ]);

     Route::get('/lecturers', [
        'uses' => 'AppController@getLecturerPage',
        'as' => 'lecturers',
        'middleware' => 'roles',
        'roles' => ['Lecturer', 'School Admin']
    ]);

    Route::get('/schoolAdmin', [
        'uses' => 'AppController@getSchoolAdminPage',
        'as' => 'schoolAdmin',
        'middleware' => 'roles',
        'roles' => ['School Admin']
    ]);

    Route::get('/systemAdmin', [
        'uses' => 'AppController@getSystemAdminPage',
        'as' => 'systemAdmin',
        'middleware' => 'roles',
        'roles' => ['System Admin']
    ]);

    Route::get('/students', [
        'uses' => 'AppController@getStudentPage',
        'as' => 'students',
        'middleware' => 'roles',
        'roles' => ['Student']
    ]);

    Route::post('/systemAdmin/assign-roles', [
        'uses' => 'AppController@postAdminAssignRoles',
        'as' => 'systemAdmin.assign',
        'middleware' => 'roles',
        'roles' => ['System Admin']
    ]);

    Route::get('/logout', [
        'uses' => 'UserController@getLogout',
        'as' => 'logout'
    ]);
});
