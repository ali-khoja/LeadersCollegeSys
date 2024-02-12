<?php

use App\Student;
use Symfony\Component\Console\Input\Input;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\PaymentPaysController;
use App\Http\Controllers\PaymentDetailsController;

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
Route::get('/cleareverything', function () {
    
    $clearcache = Artisan::call('cache:clear');
    echo "Cache cleared<br>";

    $clearview = Artisan::call('view:clear');
    echo "View cleared<br>";

    $clearconfig = Artisan::call('config:cache');
    echo "Config cleared<br>";

});
Route::get('/', function () {
    return redirect('/login');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::get('/profile/edit', 'HomeController@profileEdit')->name('profile.edit');
Route::put('/profile/update', 'HomeController@profileUpdate')->name('profile.update');
Route::get('/profile/changepassword', 'HomeController@changePasswordForm')->name('profile.change.password');
Route::post('/profile/changepassword', 'HomeController@changePassword')->name('profile.changepassword');
Route::group(['middleware' => ['auth','role:LawanAdmin']], function ()
{
    Route::get('/paymentpays/report/{id}', 'PaymentPaysController@createreport')->name('paymentpays.createreport');
Route::post('/paymentpays/report', 'PaymentPaysController@returnreport')->name('paymentpays.returnreport');
Route::post('/paymentpays/sectionreport', 'PaymentPaysController@report2')->name('paymentpays.sectionreport');
Route::post('/paymentpays/coursereport', 'PaymentPaysController@report3')->name('paymentpays.coursereport');
    Route::get('/course/index/lawandiploma', 'CourseController@indexld')->name('course.ld');
    Route::resource('paymentdetails', 'PaymentDetailsController');
    Route::get('/paymentdetails/create/{id}', 'PaymentDetailsController@create')->name('paymentdetails.create1');
    Route::post('/paymentdetails/store/{id}', 'PaymentDetailsController@store')->name('paymentdetails.store1');
    Route::resource('paymentpays', 'PaymentPaysController');
    Route::get('/paymentpays/create/{id}', 'PaymentPaysController@create')->name('paymentpays.create1');
    Route::post('/paymentpays/store/{id}', 'PaymentPaysController@store')->name('paymentpays.store1');
    Route::get('/student/index/lawandiploma', 'StudentController@indexld')->name('student.ld');
    Route::Post( '/search', 'StudentController@search')->name('search');
    
});
Route::group(['middleware' => ['auth','role:BrayatiAdmin']], function ()
{
    Route::get('/paymentpays/report/{id}', 'PaymentPaysController@createreport')->name('paymentpays.createreport');
Route::post('/paymentpays/report', 'PaymentPaysController@returnreport')->name('paymentpays.returnreport');
Route::post('/paymentpays/sectionreport', 'PaymentPaysController@report2')->name('paymentpays.sectionreport');
Route::post('/paymentpays/coursereport', 'PaymentPaysController@report3')->name('paymentpays.coursereport');
    Route::get('/course/index/brayati', 'CourseController@indexb')->name('course.b');
    Route::resource('paymentdetails', 'PaymentDetailsController');
    Route::get('/paymentdetails/create/{id}', 'PaymentDetailsController@create')->name('paymentdetails.create1');
    Route::post('/paymentdetails/store/{id}', 'PaymentDetailsController@store')->name('paymentdetails.store1');
    Route::delete('/paymentdetails/delete/{id}', 'PaymentDetailsController@destroy2')->name('paymentdetails.destroy2');
    Route::resource('paymentpays', 'PaymentPaysController');
    Route::get('/paymentpays/create/{id}', 'PaymentPaysController@create')->name('paymentpays.create1');
    Route::post('/paymentpays/store/{id}', 'PaymentPaysController@store')->name('paymentpays.store1');
    Route::get('/student/index/brayati', 'StudentController@indexb')->name('student.b');
    Route::Post( '/search', 'StudentController@search')->name('search');

});
Route::group(['middleware' => ['auth','role:Admin']], function ()
{
    Route::get('/paymentpays/report/{id}', 'PaymentPaysController@createreport')->name('paymentpays.createreport');
Route::post('/paymentpays/report', 'PaymentPaysController@returnreport')->name('paymentpays.returnreport');
Route::post('/paymentpays/sectionreport', 'PaymentPaysController@report2')->name('paymentpays.sectionreport');
Route::post('/paymentpays/coursereport', 'PaymentPaysController@report3')->name('paymentpays.coursereport');
    Route::get('/roles-permissions', 'RolePermissionController@roles')->name('roles-permissions');
    Route::get('/role-create', 'RolePermissionController@createRole')->name('role.create');
    Route::post('/role-store', 'RolePermissionController@storeRole')->name('role.store');
    Route::get('/role-edit/{id}', 'RolePermissionController@editRole')->name('role.edit');
    Route::put('/role-update/{id}', 'RolePermissionController@updateRole')->name('role.update');
    Route::get('/permission-create', 'RolePermissionController@createPermission')->name('permission.create');
    Route::post('/permission-store', 'RolePermissionController@storePermission')->name('permission.store');
    Route::get('/permission-edit/{id}', 'RolePermissionController@editPermission')->name('permission.edit');
    Route::put('/permission-update/{id}', 'RolePermissionController@updatePermission')->name('permission.update');
    Route::resource('assignrole', 'RoleAssign');
    Route::resource('course', 'CourseController');
    Route::get('/course/index/lawandiploma', 'CourseController@indexld')->name('course.ld');
    Route::get('/course/index/lawanvocational', 'CourseController@indexlv')->name('course.lv');
    Route::get('/course/index/brayati', 'CourseController@indexb')->name('course.b');
    Route::get('/course/attendence/{id}', 'CourseController@show2')->name('course.show2');
    Route::resource('paymentdetails', 'PaymentDetailsController');
    Route::get('/paymentdetails/create/{id}', 'PaymentDetailsController@create')->name('paymentdetails.create1');
    Route::post('/paymentdetails/store/{id}', 'PaymentDetailsController@store')->name('paymentdetails.store1');
    Route::resource('paymentpays', 'PaymentPaysController');
    Route::get('/paymentpays/create/{id}', 'PaymentPaysController@create')->name('paymentpays.create1');
    Route::post('/paymentpays/store/{id}', 'PaymentPaysController@store')->name('paymentpays.store1');
    Route::get('/student/index/lawandiploma', 'StudentController@indexld')->name('student.ld');
    Route::get('/student/index/brayati', 'StudentController@indexb')->name('student.b');
    Route::get('/course/index/finished', 'CourseController@showfinished')->name('course.finished');
    Route::get('/student/index/cancel', 'StudentController@showcancel')->name('student.cancel');
    Route::get('/student/index/paymentscollect', 'StudentController@getStudentsWithOutstandingPayments')->name('student.paymentscollect');
    Route::get('/student/index/paymentscollectdate', 'StudentController@paymentscollectdate')->name('student.paymentscollectdate');
    Route::get('/student/index/firstpayment', 'StudentController@firstpayment')->name('student.firstpayment');
     Route::get('/student/index/lawanbrayati', 'StudentController@lawanbrayati')->name('student.lawanbrayati');
    Route::Post( '/search/{branch}', 'StudentController@search')->name('search');
    Route::Post( '/searchc/{branch}', 'CourseController@search')->name('searchc');
    Route::resource('student', 'StudentController');
    Route::resource('teacher', 'TeacherController');

});
