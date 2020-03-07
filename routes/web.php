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

    // route to add new sessions
    Route::post('/addSession/addSession', [
        'uses' => 'UserController@postSession',
        'as' => 'addSession.addSession'
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

    // testing library for QR code taken from ItSolutionStuff.com
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

    // route to pull modules and locations for add session page
    Route::get('/addSession', [
        'uses' => 'AppController@getModuleLocation',
        'as' => 'addSession',
        'middleware' => 'roles',
        'roles' => ['Lecturer', 'School Admin']
    ]);



    // Route for enrol students to module page

    Route::post('/moduleEnrolment/moduleEnrolment', [
        'uses' => 'UserController@postModuleEnrolment',
        'as' => 'moduleEnrolment.moduleEnrolment'
    ]);

    // route to pull modules and students for module enrolment page
    Route::get('/moduleEnrolment', [
        'uses' => 'AppController@getmoduleStudents',
        'as' => 'moduleEnrolment',
        'middleware' => 'roles',
        'roles' => ['Lecturer', 'School Admin']
    ]);


    // Route for change password
    Route::post('/changePassword','UserController@changePassword')->name('changePassword');

    // Route to view / delete Session
    Route::get('/deleteSession', [
        'uses' => 'SessionController@getViewSession',
        'as' => 'deleteSession',
        'middleware' => 'roles',
        'roles' => ['Lecturer', 'School Admin']
    ]);


    // Route to delete Session
    Route::get('/deleteSession/{lec_id}', [
        'uses' => 'SessionController@getDeleteSession',
        'as' => 'deleteSession.delete',
        'middleware' => 'roles',
        'roles' => ['Lecturer', 'School Admin']
    ]);

    // view for start session page
    Route::get('/lecturers/{teach_id}', [
        'uses' => 'SessionController@getViewLec',
        'as' => 'lecturers',
        'middleware' => 'roles',
        'roles' => ['Lecturer']
    ]);

    // Route to start session
    Route::get('/lecturers/QR/{lec_id}', [
        'uses' => 'SessionController@getStartSession',
        'as' => 'lecturers.start',
        'middleware' => 'roles',
        'roles' => ['Lecturer']
    ]);

    // view for start page
    Route::get('/QRlecturers', [
        'uses' => 'SessionController@getViewQR',
        'as' => 'QRlecturers',
        'middleware' => 'roles',
        'roles' => ['Lecturer']
    ]);


    // Route to view / Disenrol students
    Route::get('/disenrollStudents', [
        'uses' => 'EnrolmentController@getViewEnroll',
        'as' => 'disenrollStudents',
        'middleware' => 'roles',
        'roles' => ['Lecturer', 'School Admin']
    ]);

    // Route to delete Students
    Route::get('/disenrollStudents/{enrolled_id}', [
        'uses' => 'EnrolmentController@getDeleteEnrolled',
        'as' => 'disenrollStudents.delete',
        'middleware' => 'roles',
        'roles' => ['Lecturer', 'School Admin']
    ]);

    // route for attendance signin
    Route::get('/students/attendanceSignIn', [
        'uses' => 'AttendanceController@postAttendance',
        'as' => 'students.attendanceSignIn'
    ]);

    // Route to view student Attendance Reports
    Route::get('/attendanceReports', [
        'uses' => 'AttendanceController@getViewReports',
        'as' => 'attendanceReports',
        'middleware' => 'roles',
        'roles' => ['Lecturer', 'School Admin']
    ]);

    // Route to get settings/ip restrictions page
    Route::get('/settings', [
        'uses' => 'SettingsController@getViewSettings',
        'as' => 'settings',
        'middleware' => 'roles',
        'roles' => ['System Admin', 'Lecturer', 'School Admin']
    ]);

    // route to post IP
    Route::post('/settings/addIP', [
        'uses' => 'SettingsController@postIp',
        'as' => 'settings.addIP'
    ]);

    // view single student report
    Route::get('/myReports/{stu_id}', [
        'uses' => 'AttendanceController@getViewStuReport',
        'as' => 'myReports',
        'middleware' => 'roles',
        'roles' => ['Student']
    ]);

});

/*Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');*/
