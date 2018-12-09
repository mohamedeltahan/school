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
   // return redirect()->route('login');
   return view("excel");
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

/*Route::get('admin', 'Admin\AdminController@index');
Route::resource('admin/roles', 'Admin\RolesController');
Route::resource('admin/permissions', 'Admin\PermissionsController');
Route::resource('admin/users', 'Admin\UsersController');
Route::resource('admin/pages', 'Admin\PagesController');
Route::resource('admin/activitylogs', 'Admin\ActivityLogsController')->only([
    'index', 'show', 'destroy'
]);
Route::resource('admin/settings', 'Admin\SettingsController');
Route::get('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
Route::post('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);
*/

// Route::resource('technical_users', 'technical_users\\technical_usersController')->middleware("check_permission");
Route::resource('technical_users', 'technical_users\\technical_usersController');//->middleware("check_permission");
// Route::resource('schools', 'schools\\schoolsController')->middleware("check_permission");
Route::resource('schools', 'schools\\schoolsController');//->middleware("check_permission");
Route::resource('assets', 'assets\\assetsController')->middleware("check_permission");
Route::resource('books', 'books\\booksController')->middleware('auth');
Route::resource('supported_schools', 'supported_schools\\supported_schoolsController')->middleware('auth');
//Route::resource('teachers', 'teachers\\teachersController');
// Route::resource('students', 'students\\studentsController')->middleware("check_permission");
Route::resource('students', 'students\\studentsController')->middleware("check_permission");
// Route::resource('teachers', 'teachers\\teachersController')->middleware("check_permission");
Route::resource('teachers', 'teachers\\teachersController')->middleware("check_permission");
Route::resource('supported_teachers', 'supported_teachers\\supported_teachersController')->middleware('auth');
Route::resource('supported_students', 'supported_students\\supported_studentsController')->middleware('auth');
Route::resource('teachers_materials', 'teachers_materials\\teachers_materialsController')->middleware('auth');
Route::resource('teachers_attendance', 'teachers_attendance\\teachers_attendanceController')->middleware('auth');
Route::resource('students_attendance', 'students_attendance\\students_attendanceController')->middleware('auth');
Route::resource('teachers_files', 'teachers_files\\teachers_filesController')->middleware('auth');
Route::resource('students_files', 'students_files\\students_filesController')->middleware('auth');
Route::post("/delete_support","supported_schools\supported_schoolsController@delete")->name("delete_support")->middleware('auth');;
Route::get("/add_student_for_school/{id}","students\\studentsController@addstudentforschool")->name("addstudentforschool")->middleware('auth');;
Route::get('change_state/{id}', 'assets\\assetsController@change_state')->name("changestate")->middleware('auth');
Route::resource('help', 'help\\helpController');
Route::get("getmyschools","technical_users\\technical_usersController@get_my_schools")->name("getmyschools")->middleware('auth');
Route::get("getgovenschools",'schools\\schoolsController@get_govern_schools')->name("getgovernschools")->middleware('auth');
Route::resource('reports', 'reports\\ReportsController')->middleware('auth');
Route::post('import', 'HomeController@import')->name('import');