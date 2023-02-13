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

use App\Http\Controllers\Auth\AuthController;

// use App\Http\Controllers\FavoritProductController;
// use App\Http\Controllers\Auth\AuthController;
// use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
// use App\Http\Controllers\OrderController;
// use App\Http\Controllers\ProductController;
// use App\Http\Controllers\InfoController;
// use WEB\Admin\SettingController;

// use ExperienceController;
// use EducationController;
use App\Models\Cart;
// use App\Models\Setting;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
// use Meneses\LaravelMpdf\Facades\LaravelMpdf as PDF;

// route::get('/test',function(){
//     $data = [
//         'invoice' => '123'
//     ];
//     $pdf = PDF::loadView('layout.invoice', $data);
//     // $pdf = PDF::loadView('layout.invoice', $data);

//     return $pdf->stream('document.pdf');

// }) ; 

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [
        'localeSessionRedirect',
        'localizationRedirect',
        'localeViewPath'
    ]
], function () {

    Route::prefix('/')->group(function () {
        // Route::post('/contact', [ContactController::class ,'store'])->name('contacts.store');
    Route::post('/message', [App\Http\Controllers\MessageController::class ,'store'])->name('messages.store');
        
        Route::get('/',[ HomeController::class,'index'])->name('app.index');
    });
    
// Route::prefix('cms/')->middleware('guest:admin,user')->group(function () {
//     Route::get('{guard}/login', [AuthController::class, 'showLoginView'])->name('cms.login');
//     Route::post('login', [AuthController::class, 'login']);
//     Route::view('user/register',  'cms.auth.register')->name('cms.register');
//     Route::post('user/register',  [UserController::class, 'store']);
//     Route::get('forgot-password', [ResetPasswordController::class, 'showForgotPassword'])->name('password.forgot');
//     Route::post('forgot-password', [ResetPasswordController::class, 'sendResetEmail'])->name('password.email');
//     Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetPasswordView'])->name('password.reset');
//     Route::post('reset-password', [ResetPasswordController::class, 'updatePassword'])->name('password.update');
// });


   

    Route::get('forgot/password', 'Auth\ForgotPasswordController@forgotPasswordForm')->name('forgotPasswordForm');
    Route::post('sendResetLinkEmail', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('sendResetLinkEmail');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.new');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');




    Route::get('/checkPayment/{order_id}', 'API\v1\CartController@checkPayment')->name('checkPayment');


    Route::group(['middleware' => ['auth']], function () {

    });


    Route::get('/sendMail', function (){


    });


    // Route::resource('/setting_copies', 'WEB\Admin\SettingCopyController');



    //ADMIN AUTH ///
    // Route::group(['prefix' => 'admin'], function () {
    //     Route::get('/', function () {
    //         return route('/login');
    //     });


    //     Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login.form');
    //     Route::post('/login', 'AdminAuth\LoginController@login')->name('admin.login');
    //     Route::get('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');
    // });


    Route::prefix('/')->middleware('guest:admin,user')->group(function () {
        Route::get('{guard}/login', [AuthController::class, 'showLoginView'])->name('cms.login');
        Route::post('login', [AuthController::class, 'login']);
        // Route::view('user/register',  'cms.auth.register')->name('cms.register');
        // Route::post('user/register',  [UserController::class, 'store']);
        // Route::get('forgot-password', [ResetPasswordController::class, 'showForgotPassword'])->name('password.forgot');
        // Route::post('forgot-password', [ResetPasswordController::class, 'sendResetEmail'])->name('password.email');
        // Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetPasswordView'])->name('password.reset');
        // Route::post('reset-password', [ResetPasswordController::class, 'updatePassword'])->name('password.update');
    });


    Route::group(['middleware' => ['web', 'admin'], 'prefix' => 'admin', 'as' => 'admin.',], function () {
        Route::get('/', function () {
            return redirect('/admin/home');
        });
        Route::post('/changeStatus/{model}', 'WEB\Admin\HomeController@changeStatus');

        Route::get('home', 'WEB\Admin\HomeController@index')->name('admin.home');

        Route::get('/admins/{id}/edit', 'WEB\Admin\AdminController@edit')->name('admins.edit');
        Route::patch('/admins/{id}', 'WEB\Admin\AdminController@update')->name('users.update');
        Route::get('/admins/{id}/edit_password', 'WEB\Admin\AdminController@edit_password')->name('admins.edit_password');
        Route::post('/admins/{id}/edit_password', 'WEB\Admin\AdminController@update_password')->name('admins.edit_password');


        Route::get('/admins', 'WEB\Admin\AdminController@index')->name('admins.all');
       
        Route::get('/orders/changeStatus/{id}/{status}', 'OrderController@changeStatus')->name('changeOrderStatus');
        Route::get('/order_products', 'OrderProductController@index');
         Route::post('/admins/changeStatus', 'WEB\Admin\AdminController@changeStatus')->name('admin_changeStatus');
        Route::delete('admins/{id}', 'WEB\Admin\AdminController@destroy')->name('admins.destroy');
        Route::post('/admins', 'WEB\Admin\AdminController@store')->name('admins.store');
        Route::get('/admins/create', 'WEB\Admin\AdminController@create')->name('admins.create');
        Route::get('/editMyProfile', 'WEB\Admin\AdminController@editMyProfile')->name('admins.editMyProfile');
        Route::post('/updateProfile', 'WEB\Admin\AdminController@updateProfile')->name('admins.updateProfile');
        Route::get('/changeMyPassword', 'WEB\Admin\AdminController@changeMyPassword')->name('admins.changeMyPassword');
        Route::post('/updateMyPassword', 'WEB\Admin\AdminController@updateMyPassword')->name('admins.updateMyPassword');


        Route::get('/categories/{id}/meals', 'WEB\Admin\CategoryController@meals');
        // Route::resource('/categories', 'WEB\Admin\CategoryController');

        Route::resource('settings', SettingController::class);
   
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
        Route::get('/export/excel/products', 'ProductController@exportExcel');
        Route::get('/export/excel/orders', 'OrderController@exportExcel');
        Route::get('/pdfOrders', 'OrderController@pdfOrders');
        // Route::get('/report/orders', 'OrderController@report')->name('ordersReport');

        Route::resource('product_offers', ProductOfferController::class);
        Route::resource('product_coupons', ProductCouponController::class);
        Route::resource('banners', BannerController::class);
        Route::get('orders','OrderController@index')->name('admin.orders');


        Route::resource('messages', MessageController::class)->except([ 'store']);
        Route::get('profile/personal', [AuthController::class, 'profilePersonalInformation'])->name('admin.profile.personal-information');
    
        Route::put('profile/personal', [AuthController::class, 'updateProfilePersonalInformation'])->name('admin.profile.update-personal-information');
        
        Route::get('profile/account', [AuthController::class, 'profileAccountInformatiion'])->name('admin.profile.account-information');
        Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');
       






        Route::resource('/pages', 'WEB\Admin\PagesController');

        Route::resource('/roles', 'WEB\Admin\RolesController');
        Route::resource('/notifications', 'WEB\Admin\NotificationsController');

        Route::get('logs', 'WEB\Admin\LogController@index');


    });

    Route::prefix('/')->middleware(['auth:user'])->group(function () {
     
        Route::resource('carts', CartController::class);
        Route::resource('addresses', AddressController::class);
        Route::get('/shopping', [App\Http\Controllers\CartController::class, 'showCart'])->name('front.cart');
        Route::get('/total', [App\Http\Controllers\CartController::class, 'getTotal'])->name('cart.total');
        Route::get('/areas/{cityId}', [App\Http\Controllers\CartController::class, 'getareas']);
        Route::get('/sizes/{color_id}/{productId}', [App\Http\Controllers\ProductController::class, 'getsizes']);

        Route::resource('product_coupons', ProductCouponController::class);
        Route::resource('orders', OrderController::class);
        Route::resource('order_products', OrderProductController::class);
        Route::resource('favorit_products',  FavoritProductController::class);
        // Route::resource('orders',  OrderController::class);
        Route::get('/favorit', [App\Http\Controllers\FavoritProductController::class, 'showFavorit']);
        // Route::get('/product_coupons', [App\Http\Controllers\CartController::class, 'getCoupon'])->name('cart.coupon');
        Route::put('/carts/apply-coupon', [App\Http\Controllers\CartController::class, 'applyCoupon'])->name('cart.apply_coupon');
        
        Route::get('logout', [AuthController::class, 'logout'])->name('user.logout'); 
    
    });   


    route::prefix('/')->group(function () {

   
        route::get('products' ,  'ProductController@index')->name('front.products');
        route::get('products/{product}' ,  'ProductController@show')->name('products.show');
        // route::get('productscategory/' ,  'ProductController@showProducts');
        // Route::resource('carts', CartController::class);
        Route::resource('users', UserController::class);
        
        Route::get('/', 'FrontController@index')->name('front.index');
        Route::get('/get-affiliate-products', 'FrontController@getAffiliateProducts');
        Route::get('/about', 'web\admin\SettingController@showAboutPage')->name('front.about');
        Route::resource('messages', MessageController::class)->except([  'index' ,'destroy','show']);


        
        });

        
 



});

