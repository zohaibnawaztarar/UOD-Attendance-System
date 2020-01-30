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

    Route::post('/schoolAdmin/addModule', [
        'uses' => 'UserController@postModule',
        'as' => 'schoolAdmin.addModule'
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
        'roles' => ['Lecturer']
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

    Route::get('qr-code-g', function () {
        \QrCode::size(500)
            ->format('png')
            ->generate('ItSolutionStuff.com', public_path('images/qrcode.png'));

        return view('qrCode');

    });

    // Route for Add School Staff page
    Route::get('/addSchoolStaff', [
        'uses' => 'AppController@getAddSchoolStaff',
        'as' => 'addSchoolStaff',
        'middleware' => 'roles',
        'roles' => ['System Admin']
    ]);
    // Route for Add School Staff page
    Route::post('/addSchoolStaff', [
        'uses' => 'UserController@postSchoolStaff',
        'as' => 'addSchoolStaff'
    ]);

    // Route for Add Lecturer page
    Route::get('/addLecturer', [
        'uses' => 'AppController@getaddLecturer',
        'as' => 'addLecturer',
        'middleware' => 'roles',
        'roles' => ['School Admin']
    ]);
    // Route for Add Lecturer page
    Route::post('/addLecturer', [
        'uses' => 'UserController@postLecturer',
        'as' => 'addLecturer'
    ]);
});
