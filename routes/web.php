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
use App\Http\Controllers\Web\Company\DeliverPartnerServiceController;
use App\Http\Controllers\Web\Home\HomeController;
use App\Http\Controllers\Web\Package\PackageController as WebPackageController;
use App\Http\Controllers\Admin\BusinessBanking\BusinessBankingController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Web\Company\CompaniesListController;
use App\Http\Controllers\Admin\Subadmin\SubadminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Web\Company\BusinessEssentialsController;
use App\Http\Controllers\Web\Company\CompanieFormController;
use App\Http\Controllers\Web\Company\CompanyForm\CompanyFormController;
use App\Http\Controllers\Web\Company\ReviewController;

use App\Http\Controllers\Web\Order\OrderController;
use App\Http\Controllers\Web\Invoice\InvoiceController;
use App\Http\Controllers\Web\Payment\PaymentController;

use App\Http\Controllers\Admin\Company\CompanyController;

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
Route::post('/checkout-final',[CheckoutStepController::class,'paymentNow'])->name('checkout-final');

Route::get('/my-account', [AuthController::class, 'myAccount'])->name('my-account')->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('clientlogout')->middleware('auth');
Route::get('/my-details', [AccountController::class, 'details'])->name('my_details')->middleware('auth');
Route::post('/primary-address-save',[AccountController::class,'savePrimaryAddress'])->name('primary-address-save')->middleware('auth');
Route::post('/billing-address-save',[AccountController::class,'saveBillingAddress'])->name('billing-address-save')->middleware('auth');
Route::post('/selected-address-save',[AccountController::class,'saveSelectedAddress'])->name('selected-address-save')->middleware('auth');
Route::post('/my-details-save',[AccountController::class,'saveMyDetails'])->name('my-details-save')->middleware('auth');
Route::get('/update-selected-address', [AccountController::class, 'updateSelectedAddress'])->name('update-selected-address')->middleware('auth');
Route::post('/new-address-save', [AccountController::class, 'saveNewAddress'])->name('new-address-save')->middleware('auth');
// Route::post('/save_registered_office_add', [AccountController::class, 'save_registered_office_add'])->name('save_registered_office_add')->middleware('auth');

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
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('update-cart-auth')->middleware('auth');
// Route::delete('/cart/{id}', [CartController::class, 'update'])->name('delete-cart');

Route::get('review-company-package', [CheckoutStepController::class, 'reviewCompanyPackage'])->name('review-company-package');
Route::match(['get', 'post'], 'addon-services', [CheckoutStepController::class, 'addOnServices'])->name('addon-services');
Route::get('checkout', [CheckoutStepController::class, 'validateAuthentication'])->name('checkout');

Route::get('pay-now', [CheckoutStepController::class, 'paymentNow'])->name('pay-now');
Route::get('payment-success', [CheckoutStepController::class, 'paymentSuccess'])->name('payment-success');
Route::get('payment-declined', [CheckoutStepController::class, 'paymentDeclined'])->name('payment-declined');
Route::get('payment-exception', [CheckoutStepController::class, 'paymentException'])->name('payment-exception');
Route::get('payment-cancelled', [CheckoutStepController::class, 'paymentCancelled'])->name('payment-cancelled');


Route::get('/delete-cart-item/{indx}',[CheckoutStepController::class,'deleteCartItem'])->name('delete-cart-item');

Route::get('companies', CompaniesListController::class)->name('companies-list');

Route::get('/search-companie', CompanieController::class);
Route::get('/page/{slug}', [PageController::class, 'show'])->name('page');
// Route::get('refund-cancellation', [PageController::class, 'refundcancellation'])->name('page.refundcancellation');

Route::get('registered-address', [CompanyFormController::class, 'registerAddress'])->middleware('auth')->name('registered-address');
Route::post('registered-address-step', [CompanyFormController::class, 'registerAddressStoreStep'])->middleware('auth')->name('registered-address-step');
Route::post('buisness-address-step', [CompanyFormController::class, 'buisnessAddressStoreStep'])->middleware('auth')->name('buisness-address-step');
Route::post('appointment-step', [CompanyFormController::class, 'appointmentStoreStep'])->middleware('auth')->name('appointment-step');
Route::post('review-step', [CompanyFormController::class, 'reviewStoreStep'])->middleware('auth')->name('review-step');
Route::get('edit-address', [CompanyFormController::class, 'editRegisterAddress'])->name('edit-address')->middleware('auth');
Route::get('choose-address', [CompanyFormController::class, 'chooseAddress'])->name('choose-address')->middleware('auth');
Route::get('choose-address-after-buy-now', [CompanyFormController::class, 'chooseAddressAfterBuyNow'])->name('choose-address-after-buy-now')->middleware('auth');
Route::get('choose-address-business', [CompanyFormController::class, 'chooseBusinessAddress'])->name('choose-address-business')->middleware('auth');
Route::get('update-address', [CompanyFormController::class, 'updateRegisterAddress'])->name('update-address')->middleware('auth');
Route::post('save_company_in_shopping_cart', [CompanyFormController::class, 'saveCompanyInShoppingCart'])->name('save_company_in_shopping_cart')->middleware('auth');
Route::post('save_company_in_shopping_cart_business', [CompanyFormController::class, 'saveCompanyInShoppingCart_Business'])->name('save_company_in_shopping_cart_business')->middleware('auth');
Route::get('address-listing', [CompanyFormController::class, 'address_listing'])->name('address-listing')->middleware('auth');
Route::post('address-edit-page', [CompanyFormController::class, 'address_edit_page'])->name('address-edit-page')->middleware('auth');
Route::post('enter-new-address', [CompanyFormController::class, 'enter_new_address'])->name('enter-new-address')->middleware('auth');
Route::get('new-address-form', [CompanyFormController::class, 'new_address_form'])->name('new-address-form')->middleware('auth');
Route::get('remove-officer-list', [CompanyFormController::class, 'remove_officer_list'])->name('remove-officer-list')->middleware('auth');
Route::POST('update-shareholder-from-appointment-listing', [CompanyFormController::class, 'update_shareholder_from_appointment_listing'])->name('update-shareholder-from-appointment-listing')->middleware('auth');

Route::get('companie-formation', [CompanieFormController::class, 'index'])->name('companie-formation')->middleware('auth');
Route::post('upload-company-doc', [CompanieFormController::class, 'storeImage'])->name('upload-company-doc')->middleware('auth');

Route::post('companie-formation', [CompanieFormController::class, 'store'])->name('companie-formation.store')->middleware('auth');
Route::patch('company-name-update', [CompanieFormController::class, 'updateCompanieName'])->name('companyname.update')->middleware('auth');
Route::get('company-document', [CompanieFormController::class, 'companyDocuments'])->name('companyname.document')->middleware('auth');
Route::post('company-document', [CompanieFormController::class, 'uploadCompanyDocuments'])->name('companyname.documents')->middleware('auth');

// Business Essential Steps
Route::get('business-essential', [BusinessEssentialsController::class, 'index'])->name('business-essential.index')->middleware('auth');
Route::post('business-essential', [BusinessEssentialsController::class, 'store'])->name('business-essential.store')->middleware('auth');
Route::get('business-bank/terms-condition/{id}', [BusinessEssentialsController::class, 'termsAndCondition'])->name('business-bank-terms-conditions')->middleware('auth');

Route::resource('review', ReviewController::class)->middleware('auth');



// Route::get('business-service', [BusinessEssentialsController::class, 'index'])->name('business-service.index')->middleware('auth');
// Route::post('business-service', [BusinessEssentialsController::class, 'store'])->name('business-service.store')->middleware('auth');

// Delivery Partner Service
Route::get('deliver-partner-services', [DeliverPartnerServiceController::class, 'index'])->name('delivery-partner.index')->middleware('auth');
Route::post('deliver-partner-services/delivery-partner-details', [DeliverPartnerServiceController::class, 'create'])->name('delivery-partner.create')->middleware('auth');

Route::get('update-forwarding-registered-office-address', [CompanyFormController::class, 'updateForwardingRegisterAddress'])->name('update-forwarding-registered-office-address')->middleware('auth');
Route::get('update-forwarding-business-office-address', [CompanyFormController::class, 'updateForwardingBusinessAddress'])->name('update-forwarding-business-office-address')->middleware('auth');
Route::get('remove-forwarding-address-section', [CompanyFormController::class, 'removeForwardingAddressSection'])->name('remove-forwarding-address-section')->middleware('auth');
Route::get('remove-forwarding-business-address-section', [CompanyFormController::class, 'removeForwardingBusinessAddressSection'])->name('remove-forwarding-business-address-section')->middleware('auth');
Route::get('selected-address', [CompanyFormController::class, 'selected_address'])->name('selected-address')->middleware('auth');

// Appointment Section
Route::get('appointments', [CompanyFormController::class, 'appointments_open'])->name('appointments')->middleware('auth');
Route::get('appointments/edit', [CompanyFormController::class, 'person_appointment_edit'])->name('person_appointment_edit')->middleware('auth');
Route::get('appointments-corporate', [CompanyFormController::class, 'appointments_open_corporate'])->name('appointments_corporate')->middleware('auth');
Route::get('appointments-corporate/edit', [CompanyFormController::class, 'appointments_open_corporate_edit'])->name('appointments_open_corporate_edit')->middleware('auth');



Route::post('save-person-officer', [CompanyFormController::class, 'savePersonOfficer'])->name('save-person-officer')->middleware('auth');
Route::post('person-appointment-save', [CompanyFormController::class, 'person_appointment_save'])->name('person-appointment-save')->middleware('auth');
Route::post('person-appointment-update', [CompanyFormController::class, 'person_appointment_update'])->name('person-appointment-update')->middleware('auth');


// Route::get('save-person-office', [CompanyFormController::class, 'savePersonOfficer'])->name('save-person-officer')->middleware('auth');

//===========order section========//
Route::get('order-history', [OrderController::class, 'index'])->name('order-history')->middleware('auth');
Route::get('delete-order-item',[OrderController::class,'deleteOrderItem'])->name('delete-order-item')->middleware('auth');
Route::get('order-details', [OrderController::class, 'getDetails'])->name('order-details')->middleware('auth');
//===========invoice section========//
Route::get('invoice-history', [InvoiceController::class, 'index'])->name('invoice-history')->middleware('auth');
Route::get('order-invoice', [InvoiceController::class, 'orderInvoice'])->name('order-invoice')->middleware('auth');
//===========payment section========//
Route::get('payment-history', [PaymentController::class, 'index'])->name('payment-history')->middleware('auth');

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

        Route::resource('company', CompanyController::class);
    });
});

require __DIR__ . '/auth.php';
