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
use App\Http\Controllers\Admin\Address\ManageAddress;
use App\Http\Controllers\Admin\Customer\CustomerController;
use App\Http\Controllers\Admin\Cms\CmsController;
use App\Http\Controllers\Web\Company\DeliverPartnerServiceController;
use App\Http\Controllers\Web\Home\HomeController;
use App\Http\Controllers\Web\Package\PackageController as WebPackageController;
use App\Http\Controllers\Admin\BusinessBanking\BusinessBankingController;

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ChangePasswordController;
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
use App\Http\Controllers\MailTestController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Admin\FacilitorController;

use App\Http\Controllers\Admin\StripePayController;
use App\Http\Controllers\StripeController;
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
Route::post('/service-login-check',[WebPackageController::class,'service_login_check'])->name('service_login_check');


Route::get('/register', [AuthController::class, 'viewRegisterForm'])->name('register-form');
Route::post('/register',[AuthController::class,'saveRegisterForm'])->name('save-register-form');
Route::post('/service-register-user',[WebPackageController::class,'serviceRegisterUser'])->name('service-register-user');


Route::post('/registerNewAddess',[AuthController::class,'registerNewAddess'])->name('register-new-address');

Route::any('/find-address',[AuthController::class,'findAddress'])->name('find-address');

// Register for checkout
Route::post('/checkout-final',[CheckoutStepController::class,'paymentNow'])->name('checkout-final');
Route::post('/checkout-custom-payment',[CheckoutStepController::class,'custom_payment'])->name('checkout-custom-payment');


Route::get('/my-account', [AuthController::class, 'myAccount'])->name('my-account')->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('clientlogout')->middleware('auth');
Route::get('/my-details', [AccountController::class, 'details'])->name('my_details')->middleware('auth');
Route::post('/primary-address-save',[AccountController::class,'savePrimaryAddress'])->name('primary-address-save')->middleware('auth');
Route::post('/billing-address-save',[AccountController::class,'saveBillingAddress'])->name('billing-address-save')->middleware('auth');
Route::post('/selected-address-save',[AccountController::class,'saveSelectedAddress'])->name('selected-address-save')->middleware('auth');
Route::post('/my-details-save',[AccountController::class,'saveMyDetails'])->name('my-details-save')->middleware('auth');
Route::get('/update-selected-address', [AccountController::class, 'updateSelectedAddress'])->name('update-selected-address')->middleware('auth');
Route::post('/new-address-save', [AccountController::class, 'saveNewAddress'])->name('new-address-save')->middleware('auth');
Route::post('/new-address-save-company', [AccountController::class, 'saveNewAddressCompany'])->name('new-address-save-company')->middleware('auth');
// Route::post('/save_registered_office_add', [AccountController::class, 'save_registered_office_add'])->name('save_registered_office_add')->middleware('auth');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
Route::get('send-mail-attach',[MailTestController::class,'TestMail'])->name('send-mail-attach');
// Route::get('generate_slug',[MailTestController::class,'generateSlug'])->name('generate_slug')->middleware('auth');

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/package', WebPackageController::class)->name('package');

Route::get('/guarantee-package', [WebPackageController::class,'guarantee_package'])->name('guarantee_package');
Route::get('/package/digital', [WebPackageController::class,'digital'])->name('digital_package');
Route::get('/package/privacy', [WebPackageController::class,'privacy'])->name('privacy_package');
Route::get('/package/professional', [WebPackageController::class,'professional'])->name('professional_package');
Route::get('/package/prestige', [WebPackageController::class,'prestige'])->name('prestige_package');
Route::get('/package/all-inclusive', [WebPackageController::class,'all_inclusive'])->name('all_inclusive_package');
Route::get('/package/non-residents', [WebPackageController::class,'non_residents'])->name('non_residents_package');
Route::get('/package/llp', [WebPackageController::class,'llp'])->name('llp_package');
Route::get('/package/e-seller', [WebPackageController::class,'e_seller'])->name('e_seller_package');
Route::get('/package/plc', [WebPackageController::class,'plc'])->name('plc_package');

Route::get('/company-services/{service_name}', [WebPackageController::class,'get_services'])->name('company_services');
Route::get('/services/business-web-design-marketing', [WebPackageController::class,'buisness_web_design'])->name('buisness_web_design');

Route::get('/load-company-services/{service_slug}/{service_id}',[WebPackageController::class,'loadCompanyService'])->name('load_company_service');
Route::post('/submit-company-services/{service_slug}/{service_id}',[WebPackageController::class,'submitCompanyService'])->name('submit_company_service');

Route::get('/company-services/business/logo', [WebPackageController::class,'business_logo'])->name('service_business_logo');

Route::get('/company-services/business/share-business-idea', [WebPackageController::class,'share_business_idea'])->name('share_business_idea');
Route::get('/company-services/business/helping-startups', [WebPackageController::class,'helping_startups'])->name('helping_startups');
Route::get('/company-services/business/business-help', [WebPackageController::class,'business_help'])->name('business_help');
Route::get('/company-services/business/info-require-to-set-company', [WebPackageController::class,'info_to_set'])->name('info-require-to-set-company');


require __DIR__ . '/auth.php';






//contact us page
Route::get('/contact-us',[ContactController::class,'view'])->name('contact.view');
Route::post('/contact-us',[ContactController::class,'store'])->name('contact.store');

Route::resource('/cart', CartController::class);
Route::get('/cart/{id}', [CartController::class, 'show'])->name('add-cart');
Route::get('/cart-update-after/{id}/{index}', [CartController::class, 'update_cart_after'])->name('update-cart-after');

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

Route::get('companies', CompaniesListController::class)->middleware('auth')->name('companies-list');
Route::get('import-companies', [CompaniesListController::class,'importCompany'])->middleware('auth')->name('import-companies');
Route::post('import-companies', [CompaniesListController::class,'importCompany'])->middleware('auth')->name('import-companies-data');
Route::post('import-companies/add', [CompaniesListController::class,'importCompanyAdd'])->middleware('auth')->name('import-companies-add');
Route::post('edit-auth-code', [CompaniesListController::class,'editAuthCode'])->middleware('auth')->name('edit-auth-code');
Route::post('edit-companies-service', [CompaniesListController::class,'editCompanyServiceInCart'])->middleware('auth')->name('edit-companies-service');
Route::get('edit-companies-appointment', [CompaniesListController::class,'editCompanyAppointment'])->middleware('auth')->name('edit-companies-appointment');
Route::post('save-companies-appointment', [CompaniesListController::class,'saveCompanyAppointment'])->middleware('auth')->name('save-companies-appointment');
Route::post('edit-companies-nameChange-service', [CompaniesListController::class,'editCompanyNameChangeServiceInCart'])->middleware('auth')->name('edit-nameChange-companies-service');
Route::post('change-accounting-date', [CompaniesListController::class,'changeAccountingReferenceDateInCart'])->middleware('auth')->name('change-accounting-date');
Route::get('companies-statement', [CompaniesListController::class, 'viewCompanyStatement'])->middleware('auth')->name('companies-statement');
Route::post('save-companies-statement', [CompaniesListController::class,'saveCompanyStatement'])->middleware('auth')->name('save-companies-statement');
// Route::get('edit-company-mail-notification',[CompaniesListController::class,'editCompanyMailNotification'])->middleware('auth')->name('edit-company-mail-notification');
Route::get('cart-companies', [CompaniesListController::class, 'viewCart'])->middleware('auth')->name('cart-company');
Route::post('delete-cart', [CompaniesListController::class,'deleteCart'])->middleware('auth')->name('delete-cart');
Route::post('/cart-pay',[CompaniesListController::class,'cartPay'])->name('cart-pay');
Route::get('cart-payment-success', [CompaniesListController::class, 'paymentSuccess'])->name('cart-payment-success');
Route::get('cart-payment-declined', [CompaniesListController::class, 'paymentDeclined'])->name('cart-payment-declined');
Route::get('cart-payment-exception', [CompaniesListController::class, 'paymentException'])->name('cart-payment-exception');
Route::get('cart-payment-cancelled', [CompaniesListController::class, 'paymentCancelled'])->name('cart-payment-cancelled');

Route::get('shop-companies', [CompaniesListController::class,'viewShop'])->middleware('auth')->name('shop-companies');
Route::post('save-cart-services', [CompaniesListController::class,'saveShopServicesInCart'])->middleware('auth')->name('save-cart-services');
Route::get('document-companies', [CompaniesListController::class,'viewDocument'])->middleware('auth')->name('document-companies');
Route::get('services-companies', [CompaniesListController::class,'viewCompanyServices'])->middleware('auth')->name('services-companies');
Route::get('get-started-companies', [CompaniesListController::class,'viewGetStarted'])->middleware('auth')->name('get-started-companies');
Route::post('save-get-services', [CompaniesListController::class,'saveStartedServicesInCart'])->middleware('auth')->name('save-get-services');





Route::get('companies/accepted', [CompaniesListController::class, 'acceptedCompanyDetails'])->middleware('auth')->name('accepted-company');
Route::get('companies/pdf/efilling_pdf', [CompaniesListController::class, 'efillingPdf'])->middleware('auth')->name('efilling_pdf');
Route::get('companies/pdf/certificate', [CompaniesListController::class, 'generateCertificate'])->middleware('auth')->name('generate_certificate');
Route::get('companies/pdf/incorporate-certificate', [CompaniesListController::class, 'incorporateCertificate'])->middleware('auth')->name('incorporate_certificate');
Route::get('companies/pdf/memo-articles-full', [CompaniesListController::class, 'memoArticlesFull'])->middleware('auth')->name('memoArticlesFull');


Route::get('/search-companie', CompanieController::class);
Route::get('/page/{slug}', [PageController::class, 'show'])->name('page');
Route::get('about-us', [PageController::class, 'aboutUs'])->name('aboutUs');

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
Route::get('business-accounting/business-service-terms-conditions/{id}', [BusinessEssentialsController::class, 'termsAndConditionBusinessAccounting'])->name('business-service-terms-conditions')->middleware('auth');

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

Route::get('appointments/other-legal-entity', [CompanyFormController::class, 'appointments_open_otherLegalEntity'])->name('appointments_otherLegalEntity')->middleware('auth');

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
Route::get('blog-details',[CmsController::class,'blogDetails'])->name('blog-details');
Route::resource('ticket', TicketController::class)->middleware('auth');
Route::get('ticket-replies/{id}', [TicketController::class,'view_ticket_replies'])->name('view-ticket-replies')->middleware('auth');
Route::post('add-ticket-replies', [TicketController::class,'add_ticket_replies'])->name('add-ticket-replies')->middleware('auth');
Route::get('pay/service-checkout/{id}', [WebPackageController::class, 'serviceValidateAuth'])->name('service-checkout');

Route::get('purchased-service-invoice/{id}', [WebPackageController::class, 'purchasedServiceInvoice'])->name('purchased-service-invoice')->middleware('auth');

Route::post('pay/service-payment-now', [CheckoutStepController::class, 'servicePaymentNow'])->name('service-payment-now')->middleware('auth');
Route::get('pay/custom-payment-success', [CheckoutStepController::class, 'custom_payment_success'])->name('custom-payment-success');


Route::get('pay/service-payment-success', [WebPackageController::class, 'servicePaymentSuccess'])->name('service-payment-success')->middleware('auth');

Route::get('purchased-service-list', [WebPackageController::class, 'purchasedServiceList'])->name('purchased-service-list')->middleware('auth');
Route::get('expired-service-list', [WebPackageController::class, 'expiredServiceList'])->name('expired-service-list')->middleware('auth');

Route::get('purchased-service-details', [WebPackageController::class, 'purchasedServiceDetails'])->name('purchased-service-details')->middleware('auth');

Route::group([ 'middleware' => 'isAdmin'], function() {
    Route::prefix('admin')->middleware(['auth', 'auth.session'])
    ->group(function () {
        Route::name('admin.')
        ->group(function () {

            Route::get('/dashboard', DashboardController::class)->name('dashboard');
            // Route::resource('change-password', ChangePasswordController::class);
            Route::resource('package', PackageController::class);

            Route::get('/facilitor',[FacilitorController::class,'index'])->name('facilitor.index');
            Route::get('/facilitor/create',[FacilitorController::class,'create'])->name('facilitor.create');
            Route::post('/facilitor/create',[FacilitorController::class,'store'])->name('facilitor.store');
            Route::get('/facilitor/edit/{id}',[FacilitorController::class,'edit'])->name('facilitor.edit');
            Route::put('/facilitor/edit/{id}',[FacilitorController::class,'update'])->name('facilitor.update');
            Route::delete('/facilitor/{id}',[FacilitorController::class,'destroy'])->name('facilitor.destroy');

            Route::resource('addonservice', AddonController::class);
            Route::get('remove_service_faq/{id}', [AddonController::class, 'removeServiceFaq'])->name('remove_service_faq');


            Route::resource('business-banking', BusinessBankingController::class);
            Route::resource('accounting', AccountingController::class);
            Route::resource('manage-address', ManageAddress::class);



        Route::resource('sub-admin', SubadminController::class);
        Route::resource('customer', CustomerController::class);
        Route::resource('cms', CmsController::class);
        Route::get('view-tickets', [TicketController::class,'view_tickets_admin'])->name('view-tickets-admin');

        Route::get('ticket-replies/{id}', [TicketController::class,'view_ticket_replies'])->name('view-ticket-replies-admin')->middleware('auth');
        Route::post('add-ticket-replies', [TicketController::class,'add_ticket_replies'])->name('add-ticket-replies-admin')->middleware('auth');

        Route::get('purchased-service-list-admin', [WebPackageController::class, 'purchasedServiceListAdmin'])->name('purchased-service-list-admin')->middleware('auth');
        Route::get('expired-service-list-admin', [WebPackageController::class, 'expiredServiceListAdmin'])->name('expired-service-list-admin')->middleware('auth');
            // Route::post('move-to-agent', [AgentController::class, 'moveToAgent'])->name('move-to-agent');

            // Route::resource('product', ProductController::class);
            // Route::resource('category', CategoryController::class);
            Route::resource('change-password', ChangePasswordController::class);

            Route::resource('company', CompanyController::class);
            Route::get('/company-report/download', [CompanyController::class, 'index'])->name('company-download-report');
            Route::get('/order-history', [OrderController::class, 'adminOrderHistory'])->name('order-history');
            Route::get('/order-history/report', [OrderController::class, 'adminOrderHistory'])->name('order-history-report');

            Route::any('/company/submit_company_house',[CompanyController::class,'submitCompanyHouse'])->name('submit_company_house');
            Route::any('/company/view-xml',[CompanyController::class,'viewXML'])->name('view_xml');
            Route::any('/company/check_status',[CompanyController::class,'checkStatus'])->name('check_status');
            Route::any('/company/update_status',[CompanyController::class,'updateStatus'])->name('update_status');
            Route::get('/company/send-email/{id}', [CompanyController::class,'sendEmail'])->name('company.sendEmail');
            Route::post('/company/sent_email',[CompanyController::class, 'sendEmailUpdate'])->name('company.sent_email_user');
            Route::get('/company/agent-email/{id}', [CompanyController::class,'sendEmailAgent'])->name('company.sendEmailAgent');
            Route::get('/stripe-pay', [StripePayController::class, 'index'])->name('admin.stripe.pay');
            Route::post('/stripe-create-intent', [StripePayController::class, 'createIntent'])->name('admin.stripe.createIntent');
            Route::post('/stripe-complete', [StripePayController::class, 'complete'])->name('admin.stripe.complete');
        });
    });
});


// Route::get('/admin/stripe-pay', [StripePayController::class, 'index'])->name('admin.stripe.pay');
// Route::post('/admin/stripe-create-intent', [StripePayController::class, 'createIntent'])->name('admin.stripe.createIntent');
// Route::post('/admin/stripe-complete', [StripePayController::class, 'complete'])->name('admin.stripe.complete');

Route::get('/pay', [StripeController::class, 'showPaymentForm'])->name('pay')->middleware('auth');
Route::post('/payment/create', [StripeController::class, 'createPaymentIntent'])->name('payment.create')->middleware('auth');
Route::post('/payment/webhook', [StripeController::class, 'webhook']);
Route::get('/stripe/create-products', [StripeController::class, 'createProducts']);
Route::get('/stripe/sync-products', [StripeController::class, 'syncFromStripe']);
