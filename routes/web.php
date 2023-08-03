<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Companies\CompanieController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\Addons\AddonController;
use App\Http\Controllers\Admin\Package\PackageController;
use App\Http\Controllers\Web\Cart\CartController;
use App\Http\Controllers\Web\Checkout\CheckoutStepController;
// use App\Http\Controllers\Admin\AddonService\AddonServiceController;
use App\Http\Controllers\Admin\Accounting\AccountingController;
use App\Http\Controllers\Admin\Customer\CustomerController;

use App\Http\Controllers\Web\Home\HomeController;
use App\Http\Controllers\Web\Package\PackageController as WebPackageController;

use App\Http\Controllers\Admin\BusinessBanking\BusinessBankingController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Subadmin\SubadminController;
use App\Http\Controllers\ContactController;

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

// Route::get('/', function () {
//     return view('frontend.user_index');
// });

Route::get('/login', function () {
    $value = '';
    $value = session('hidden_param');
    // dd($value);
    return view('frontend.login', compact('value'));
})->name('frontend-login');

Route::post('/login',[AuthController::class,'login'])->name('clientlogin');

Route::get('/register', [AuthController::class, 'viewRegisterForm'])->name('register-form');
Route::post('/register',[AuthController::class,'saveRegisterForm'])->name('save-register-form');
Route::any('/find-address',[AuthController::class,'findAddress'])->name('find-address');

Route::get('/my-account', [AuthController::class, 'myAccount'])->name('my-account')->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('clientlogout')->middleware('auth');
Route::get('/my-details', [AccountController::class, 'details'])->name('my_details')->middleware('auth');
Route::post('/primary-address-save',[AccountController::class,'savePrimaryAddress'])->name('primary-address-save');
Route::post('/my-details-save',[AccountController::class,'saveMyDetails'])->name('my-details-save');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/package', WebPackageController::class)->name('package');

//contact us page
Route::get('/contact-us',[ContactController::class,'view'])->name('contact.view');
Route::post('/contact-us',[ContactController::class,'store'])->name('contact.store');

Route::resource('/cart', CartController::class);
Route::get('/cart/{id}', [CartController::class, 'show'])->name('add-cart');
Route::patch('/cart/{id}', [CartController::class, 'update'])->name('update-cart');
// Route::delete('/cart/{id}', [CartController::class, 'update'])->name('delete-cart');

Route::get('review-company-package', [CheckoutStepController::class, 'reviewCompanyPackage'])->name('review-company-package');
Route::match(['get', 'post'], 'addon-services', [CheckoutStepController::class, 'addOnServices'])->name('addon-services');
Route::get('check-auth', [CheckoutStepController::class, 'validateAuthentication'])->name('check-auth');
Route::get('checkout', [CheckoutStepController::class, 'checkoutFinal'])->name('checkout');

Route::get('/search-companie', CompanieController::class);

Route::prefix('admin')->middleware(['auth', 'auth.session'])
->group(function () {
    Route::name('admin.')
    ->group(function () {

        Route::get('/dashboard', DashboardController::class)->name('dashboard');
        // Route::resource('change-password', ChangePasswordController::class);

        Route::resource('package', PackageController::class);
        Route::resource('addonservice', AddonController::class);

        Route::resource('business-banking', BusinessBankingController::class);
        Route::resource('accounting', AccountingController::class);


        Route::resource('sub-admin', SubadminController::class);
        Route::resource('customer', CustomerController::class);

        // Route::post('move-to-agent', [AgentController::class, 'moveToAgent'])->name('move-to-agent');

        // Route::resource('product', ProductController::class);
        // Route::resource('category', CategoryController::class);
        Route::resource('change-password', ChangePasswordController::class);
    });
});

require __DIR__ . '/auth.php';
