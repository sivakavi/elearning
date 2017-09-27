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


/**
 * Auth routes
 */
Route::group(['namespace' => 'Auth'], function () {

    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('logout');

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');

    // Confirmation Routes...
    if (config('auth.users.confirm_email')) {
        Route::get('confirm/{user_by_code}', 'ConfirmController@confirm')->name('confirm');
        Route::get('confirm/resend/{user_by_email}', 'ConfirmController@sendEmail')->name('confirm.send');
    }
});

/**
 * Backend routes
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {

    // Dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard');

    //Users
    Route::get('users', 'UserController@index')->name('users');
    Route::get('users/create', 'UserController@create')->name('users.create');
    Route::post('users', 'UserController@store')->name('users.store');
    Route::get('users/{user}', 'UserController@show')->name('users.show');
    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
    Route::put('users/{user}', 'UserController@update')->name('users.update');
    Route::get('student', 'UserController@studentindex')->name('users.studentindex');
    Route::get('studentList', 'UserController@studentList')->name('users.studentList');
    
    Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');
    Route::resource("colleges","CollegeController");
    Route::resource("categories","CategoryController");
    Route::resource("sub_categories","SubCategoryController");
    Route::resource("tests","TestController");
    Route::resource("groups","GroupController");

    Route::get('questions/create', 'QuestionController@create')->name('questions.create');
    Route::post('questions/store', 'QuestionController@store')->name('questions.store');
    Route::get('getsubcategory', 'QuestionController@getSubCategory')->name('getSubCategory');
    Route::get('getquestionlists', 'QuestionController@getQuestionLists')->name('questions.getQuestionLists');
    Route::get('questions', 'QuestionController@index')->name('questions.index');
    
    Route::delete('questions/{id}', 'QuestionController@destroy')->name('questions.destroy');
    Route::get('assigns', 'AssignController@index')->name('assigns.index');
    Route::post('assigns/store', 'AssignController@store')->name('assigns.store');
    Route::get('getGroupSubCategoryList', 'AssignController@getGroupSubCategoryList')->name('assigns.getGroupSubCategoryList');
    Route::get('getGroup', 'AssignController@getGroup')->name('assigns.getGroup');

    Route::post('userImport', 'UserController@importExcel')->name('users.importExcel');
    
    Route::post('questionImport', 'QuestionController@importExcel')->name('question.importExcel');
    
});


Route::get('/', 'HomeController@index');



/**
* Student routes
*/



Route::group(['prefix' => 'student', 'as' => 'student.', 'namespace' => 'Student', 'middleware' => 'student'], function () {

    // Dashboard
Route::get('/', 'DashboardController@index')->name('studentdashboard');
    
});
