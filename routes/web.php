<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Companies\CompanieController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\Package\PackageController;

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
    return view('frontend.user_index');
});
Route::get('/login', function () {
    return view('frontend.login');
});
Route::post('/login',[AuthController::class,'login'])->name('clientlogin');
Route::get('/register', [AuthController::class, 'viewRegisterForm'])->name('register-form');
Route::post('/register',[AuthController::class,'saveRegisterForm'])->name('save-register-form');
Route::any('/find-address',[AuthController::class,'findAddress'])->name('find-address');

Route::get('/my-account', [AuthController::class, 'myAccount'])->name('my-account')->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/my-details', [AccountController::class, 'details'])->name('my_details')->middleware('auth');
Route::post('/primary-address-save',[AccountController::class,'savePrimaryAddress'])->name('primary-address-save');




Route::get('/search-companie', CompanieController::class);

Route::prefix('admin')->middleware(['auth', 'auth.session'])
->group(function () {
    Route::name('admin.')
    ->group(function () {

        Route::get('/dashboard', DashboardController::class)->name('dashboard');
        // Route::resource('change-password', ChangePasswordController::class);

         Route::resource('package', PackageController::class);
        // Route::post('move-to-agent', [AgentController::class, 'moveToAgent'])->name('move-to-agent');

        // Route::resource('product', ProductController::class);
        // Route::resource('category', CategoryController::class);
        Route::resource('change-password', ChangePasswordController::class);
    });
});

require __DIR__ . '/auth.php';
