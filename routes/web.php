<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Companies\CompanieController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\Addons\AddonController;
use App\Http\Controllers\Admin\Package\PackageController;
use App\Http\Controllers\Web\Cart\CartController;
use App\Http\Controllers\Web\Checkout\CheckoutStepController;
// use App\Http\Controllers\Admin\AddonService\AddonServiceController;
use App\Http\Controllers\Admin\Accounting\AccountingController;
use App\Http\Controllers\Admin\Customer\CustomerController;
use App\Http\Controllers\Admin\Cms\CmsController;

use App\Http\Controllers\Web\Home\HomeController;
use App\Http\Controllers\Web\Package\PackageController as WebPackageController;
use App\Http\Controllers\Admin\BusinessBanking\BusinessBankingController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Web\Company\CompaniesListController;
use App\Http\Controllers\Admin\Subadmin\SubadminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Web\Company\CompanieFormController;
use App\Http\Controllers\Web\Company\CompanyForm\CompanyFormController;

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

Route::post('/registerNewAddess',[AuthController::class,'registerNewAddess'])->name('register-new-address');

Route::any('/find-address',[AuthController::class,'findAddress'])->name('find-address');

// Register for checkout 
Route::post('/checkout-final',[CheckoutStepController::class,'checkoutCustomer'])->name('checkout-final');
Route::get('companie-formation', [CompanieFormController::class, 'index'])->name('companie-formation');

Route::get('/my-account', [AuthController::class, 'myAccount'])->name('my-account')->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('clientlogout')->middleware('auth');
Route::get('/my-details', [AccountController::class, 'details'])->name('my_details')->middleware('auth');
Route::post('/primary-address-save',[AccountController::class,'savePrimaryAddress'])->name('primary-address-save');
Route::post('/selected-address-save',[AccountController::class,'saveSelectedAddress'])->name('selected-address-save');
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
Route::get('checkout', [CheckoutStepController::class, 'validateAuthentication'])->name('checkout');
Route::get('companies', CompaniesListController::class)->name('companies-list');

Route::get('/search-companie', CompanieController::class);
Route::get('/page/{slug}', [PageController::class, 'show'])->name('page');
//Route::get('refund-cancellation', [PageController::class, 'refundcancellation'])->name('page.refundcancellation');

Route::get('registered-address', [CompanyFormController::class, 'registerAddress'])->middleware('auth')->name('registered-address');
Route::get('edit-address', [CompanyFormController::class, 'editRegisterAddress'])->name('edit-address')->middleware('auth');
Route::get('choose-address', [CompanyFormController::class, 'chooseAddress'])->name('choose-address')->middleware('auth');
Route::get('choose-address-after-buy-now', [CompanyFormController::class, 'chooseAddressAfterBuyNow'])->name('choose-address-after-buy-now')->middleware('auth');
Route::get('choose-address-business', [CompanyFormController::class, 'chooseBusinessAddress'])->name('choose-address-business')->middleware('auth');
Route::get('update-address', [CompanyFormController::class, 'updateRegisterAddress'])->name('update-address')->middleware('auth');

Route::get('update-forwarding-registered-office-address', [CompanyFormController::class, 'updateForwardingRegisterAddress'])->name('update-forwarding-registered-office-address')->middleware('auth');



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
        Route::resource('cms', CmsController::class);

        // Route::post('move-to-agent', [AgentController::class, 'moveToAgent'])->name('move-to-agent');

        // Route::resource('product', ProductController::class);
        // Route::resource('category', CategoryController::class);
        Route::resource('change-password', ChangePasswordController::class);
    });
});

require __DIR__ . '/auth.php';
