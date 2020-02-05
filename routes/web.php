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
    // route for add Location
    Route::post('/schoolAdmin/addLocation', [
        'uses' => 'UserController@postlocation',
        'as' => 'schoolAdmin.addLocation'
    ]);

    Route::get('/addLocation', [
        'uses' => 'AppController@getAddLocationPage',
        'as' => 'addLocation',
        'middleware' => 'roles',
        'roles' => ['School Admin']
    ]);

    // Route to delete locations
    Route::get('/deleteLocation', [
        'uses' => 'AppController@getDeleteLocation',
        'as' => 'deleteLocation',
        'middleware' => 'roles',
        'roles' => ['School Admin']
    ]);

    // Route to delete locations
    Route::get('/deleteLocation/{location_id}', [
        'uses' => 'AppController@getDeleteLocationdb',
        'as' => 'deleteLocation.delete',
        'middleware' => 'roles',
        'roles' => ['School Admin']
    ]);

    Route::get('/dashboard', [
        'uses' => 'UserController@getDashboard',
        'as' => 'dashboard',
        'middleware' => 'auth'
    ]);

    Route::get('/changePassword', [
        'uses' => 'UserController@getChangePassword',
        'as' => 'changePassword',
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

    Route::get('/addModule', [
        'uses' => 'AppController@getAddModulePage',
        'as' => 'addModule',
        'middleware' => 'roles',
        'roles' => ['School Admin', 'Lecturer']
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


    // Route to delete school Staff accounts
    Route::get('/systemAdmin/deleteStaff/{user_id}', [
        'uses' => 'AppController@getDeleteStaff',
        'as' => 'systemAdmin.delete',
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

    // Route for delete Lecturers
    Route::get('/deleteLecturers', [
        'uses' => 'AppController@getDeleteLecturersPage',
        'as' => 'deleteLecturers',
        'middleware' => 'roles',
        'roles' => ['School Admin']
    ]);

    // Route to delete lecturers accounts
    Route::get('/schoolAdmin/deleteStaff/{user_id}', [
        'uses' => 'AppController@getDeleteStaff',
        'as' => 'schoolAdmin.delete',
        'middleware' => 'roles',
        'roles' => ['School Admin']
    ]);

    // Route for delete Module page
    Route::get('/deleteModule', [
        'uses' => 'AppController@getDeleteModule',
        'as' => 'deleteModule',
        'middleware' => 'roles',
        'roles' => ['School Admin']
    ]);

    // Route to delete Module
    Route::get('/deleteModule/{module_id}', [
        'uses' => 'AppController@getDeleteModuledb',
        'as' => 'deleteModule.delete',
        'middleware' => 'roles',
        'roles' => ['School Admin']
    ]);

    // Route for change password
    Route::post('/changePassword','UserController@changePassword')->name('changePassword');

});
