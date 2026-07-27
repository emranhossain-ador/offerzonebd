<?php

use App\Http\Controllers\Admin\BillPayController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\RechargeController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Livewire\Auth\LoginPage;
use App\Livewire\Auth\RegistrationPage;
use App\Livewire\Frontend\AboutUs;
use App\Livewire\Frontend\Home;
use App\Livewire\Frontend\PrivacyPolicy;
use App\Livewire\Frontend\Profile\ProfilePage;
use App\Livewire\Frontend\RefundPolicy;
use App\Livewire\Frontend\User\AddBalancePage;
use App\Livewire\Frontend\User\BillPaymentPage;
use App\Livewire\Frontend\User\BrilliantRechargePage;
use App\Livewire\Frontend\User\ChangePassword;
use App\Livewire\Frontend\User\Contact;
use App\Livewire\Frontend\User\ContactPage;
use App\Livewire\Frontend\User\DrivePackage;
use App\Livewire\Frontend\User\FAQPage;
use App\Livewire\Frontend\User\FreeFirePage;
use App\Livewire\Frontend\User\MobileRechargePage;
use App\Livewire\Frontend\User\MyOrdersPage;
use App\Livewire\Frontend\User\NotificationPage;
use App\Livewire\Frontend\User\NotificationSettings;
use App\Livewire\Frontend\User\RegularPackage;
use App\Livewire\Frontend\User\Settings;
use App\Livewire\Frontend\User\TransactionPage;
use App\Livewire\Frontend\User\UserHome;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;



Route::get('/emran-test', function () {

    Artisan::call('migrate', ['--force' => true]);
    Artisan::call('db:seed', ['--force' => true]);

    return redirect()->route('home');
});




Route::get('/clear-cache', function () {


    $results = [];

    // Clear application cache
    Artisan::call('cache:clear');
    $results[] = '✅ Application cache cleared';

    // Clear config cache
    Artisan::call('config:clear');
    $results[] = '✅ Config cache cleared';

    // Clear route cache
    Artisan::call('route:clear');
    $results[] = '✅ Route cache cleared';

    // Clear view cache
    Artisan::call('view:clear');
    $results[] = '✅ View cache cleared';

    // Clear compiled classes
    Artisan::call('clear-compiled');
    $results[] = '✅ Compiled classes cleared';

    // Optimize autoloader (optional, uncomment if needed)
    // exec('composer dump-autoload');
    // $results[] = '✅ Autoloader optimized';

    return '<pre>' . implode("\n", $results) . '</pre>';
});




Route::livewire('/', Home::class)->name('home');
Route::livewire('/about-us', AboutUs::class)->name('aboutus');
Route::livewire('/privacy-policy', PrivacyPolicy::class)->name('privacy-policy');
Route::livewire('/refund-policy', RefundPolicy::class)->name('refund-policy');
Route::livewire('/login', LoginPage::class)->name('login');
Route::livewire('/register', RegistrationPage::class)->name('register');



// Is User Login Area
Route::middleware(['auth','user'])->group(function (){

    Route::livewire('/{username}', UserHome::class)->name('user.home');
    Route::livewire('/{username}/transactions', TransactionPage::class)->name('transactions');
    Route::livewire('/{username}/my-orders', MyOrdersPage::class)->name('my-orders');
    Route::livewire('/{username}/add-balance', AddBalancePage::class)->name('add-balance');
    Route::livewire('/{username}/free-fire', FreeFirePage::class)->name('free-fire');
    Route::livewire('/{username}/brilliant-recharge', BrilliantRechargePage::class)->name('brilliant-recharge');
    Route::livewire('/{username}/profile', ProfilePage::class)->name('user.profile');
    Route::livewire('/{username}/settings', Settings::class)->name('user.settings');
    Route::livewire('/{username}/change-password', ChangePassword::class)->name('change-password');
    Route::livewire('/{username}/contact', ContactPage::class)->name('contact');
    Route::livewire('/{username}/notification-settings', NotificationSettings::class)->name('notification-settings');
    Route::livewire('/{username}/mobile-recharge', MobileRechargePage::class)->name('mobile-recharge');
    Route::livewire('/{username}/regular-package', RegularPackage::class)->name('regular-package');
    Route::livewire('/{username}/drive-package', DrivePackage::class)->name('drive-package');
    Route::livewire('/{username}/notification', NotificationPage::class)->name('notification-page');
    Route::livewire('/{username}/bill-pay', BillPaymentPage::class)->name('bill-payment');
    Route::livewire('/{username}/faq', FAQPage::class)->name('faq-page');

});


// Socialite
Route::controller(SocialiteController::class)->group(function (){
    Route::get('/auth/google', 'googleLogin')->name('auth.google');
    Route::get('/auth/google-callback', 'googleCallback')->name('auth.google.callback');
    Route::post('/logout', 'logout')->name('logout');
});


/*______________________ Admin Area ________________________*/

Route::middleware(['auth','admin'])->group(function (){

    Route::controller(DashboardController::class)->prefix('admin')->as('admin.')->group(function (){
        route::get('/dashboard', 'index')->name('dashboard');
        route::get('/customer-list', 'customers')->name('customers');
    });


    Route::controller(OrderController::class)->prefix('admin')->as('admin.')->group(function (){
        route::get('/order-list', 'index')->name('orders');
        route::get('/order/{order_id}', 'orderDetails')->name('order-details');
    });


    Route::controller(ItemController::class)->prefix('admin')->as('admin.')->group(function (){
        route::get('/sim-package', 'simPackage')->name('sim-package');
        route::get('/sim-package/create', 'createSimPackage')->name('create-sim-package');
        route::get('/sim-package/edit/{id}', 'editSimPackage')->name('edit-sim-package');

        route::get('/free-fire-diamond', 'freeFireDiamond')->name('free-fire-diamond');
        route::get('/create-free-fire-diamond', 'createFreeFireDiamond')->name('create-free-fire-diamond');
        route::get('/edit-free-fire-diamond/{id}', 'editFreeFireDiamond')->name('edit-free-fire-diamond');
    });


    Route::controller(SettingController::class)->prefix('admin')->as('admin.')->group(function (){
        route::get('/payment-methods', 'payment_methods')->name('payment_methods');
        route::get('/account', 'profile')->name('profile');
        route::get('/contact-us', 'contact')->name('contact');
    });


    Route::controller(RechargeController::class)->prefix('admin')->as('admin.')->group(function (){
        route::get('/add-balance-requests', 'addBalance')->name('add-balance');
        route::get('/add-balance-details/{id}', 'addBalanceDetails')->name('add-balance-details');

        route::get('/mobile-recharge-request', 'mobile_recharge_request')->name('mobile-recharge-request');
        route::get('/brilliant-recharge-request', 'brilliant_recharge_request')->name('brilliant-recharge-request');
    });



    Route::controller(BillPayController::class)->prefix('admin')->as('admin.')->group(function (){
        route::get('/bill-operator', 'billOperator')->name('bill-operator');
        route::get('/bill-payment-request', 'billPaymentRequest')->name('bill-payment-request');
        route::get('/bill-payment-details/{id}', 'billPaymentDetails')->name('bill-payment-details');

    });

});
