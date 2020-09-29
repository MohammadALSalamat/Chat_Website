<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserSection;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontUserController;
use App\Http\Controllers\FrontIndexController;
use App\Http\Controllers\BackDashboardController;

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

Auth::routes();

//Back end controllers
Route::match(['get', 'post'], '/admin', [BackDashboardController::class, 'login_page'])->name('login_page');

// log out
Route::get('/logout', [BackDashboardController::class, 'logout'])->name('logout');
// security part start thr admin panel page.
Route::group(['middleware' => ['admin']], function () {


    /*+++++++++++++++++++++++++++++++ Start the user Routs +++++++++++++++++++++++++++*/

    // show the dashboard
    Route::get('/dashboard', [BackDashboardController::class, "dashboard"])->name('dashboard');
    // user section
    Route::get('/users_section/View', [UserSection::class, 'view_users'])->name('view_users');
    Route::get('/users_section/Add', [UserSection::class, 'Add_users'])->name('Add_users');
    Route::post('/users_section/Add_user', [UserSection::class, 'Store_users'])->name('Insert_users');
    //user sittings
    Route::get('/profile', [UserSection::class, 'sittings'])->name('sittings');
    // check the password validate
    Route::get('/admin/check-pwd', [UserSection::class, 'changPass']);
    Route::patch('/admin/update_password', [UserSection::class, 'update_password'])->name('update_password');
    //update prodile username
    Route::match(['get', 'post'], '/admin/update_profile/{id]', [UserSection::class, 'update_profile'])->name('update_profile');
    // delete the user
    Route::match(['get', 'post'], '/admin/user/{id}', [UserSection::class, 'Delete_user']);
    // modify the user
    Route::get('users/Edit/{id}', [UserSection::class, 'Edit_user'])->name('Edit_user');
    Route::post('Edit/{id}', [UserSection::class, 'Modify_user']);

    // show the banuser page
    Route::get('user/banned', [UserSection::class, "banned_user"])->name('ban_users');

    /*+++++++++++++++++++++++++++++++ End  the user Routs +++++++++++++++++++++++++++*/
});



// login page
Route::match(['get', 'post'], '/login_page', [FrontIndexController::class, 'Front_login'])->name('Login_page');
Route::match(['get', 'post'], '/register_page', [FrontIndexController::class, 'Front_register'])->name('register_page');

// log out
Route::get('/Front_logout', [FrontIndexController::class, 'logout'])->name('Front_logout');

Auth::routes();
Route::group(['middleware' => ['Front']], function () {
    //front end controllers
    Route::get('/', [FrontIndexController::class, 'main_page'])->name('main_page'); // main page for users
    Route::get('/Front_page/{id}', [FrontUserController::class, 'Front_page'])->name('Front_page'); // main page for users
    // user's profile that user can not access unless he register first
    Route::post('/Store_Edit_Profile/{id}', [FrontUserController::class, 'Store_data'])->name('Store_profile_Edit');
    Route::get('/profile/edit/{id}', [FrontUserController::class, 'Edit_profile'])->name('Edit_profile');

    // Edit Section
});
