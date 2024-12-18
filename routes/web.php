<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\backend\PDFController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\ShipController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\SlideController;
use App\Http\Controllers\frontend\BlogController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\PageController;
use App\Http\Controllers\backend\CouponController;
use App\Http\Controllers\backend\CommentController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\frontend\FilterController;
use App\Http\Controllers\frontend\SocialController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\frontend\CustomerController;
use App\Http\Controllers\backend\RequirementController;
use App\Http\Controllers\frontend\VerificationController;
use App\Http\Controllers\frontend\ForgotPasswordController;
use RealRashid\SweetAlert\Facades\Alert;//dùng sweet alert




//Route handle page main
Route::get('/', [PageController::class, 'index']);
Route::get('/home', [PageController::class, 'index']);
Route::get('/shop', [PageController::class, 'shop']);
Route::get('/shop/brand/{id}', [PageController::class, 'brand']);
Route::get('/shop/category/{id}', [PageController::class, 'category']);
Route::get('/shop/product/{id}', [PageController::class, 'product']);
Route::get('/contact', [PageController::class, 'contact']);

//Route handle cart
Route::get('/cart', [CartController::class, 'cart']);
Route::get('/checkout', [CartController::class, 'checkout']);
Route::post('/payment', [CartController::class, 'payment']);
// Route::post('/payment/online', [CartController::class, 'paymentCreate']);
Route::get('/payment/return', [CartController::class, 'paymentReturn']);
Route::post('/add_to_cart', [CartController::class, 'addToCart']);
Route::post('/update_quantity_cart', [CartController::class, 'updateQuatityCart']);
Route::post('/delete_product_cart', [CartController::class, 'deleteProductCart']);
Route::post('/add_coupon_cart', [CartController::class, 'addCouponCart']);
Route::get('/get_data_cart', [CartController::class, 'getDataCart']);
Route::post('/delete_cart_offset', [CartController::class, 'deteleProductCartOffset']);
Route::post('/get_district_checkout', [CartController::class, 'getDistricCheckout']);
Route::post('/get_ship_checkout', [CartController::class, 'getShipCheckout']);

//Login Google
Route::get('/auth/redirect/{provider}', [SocialController::class, 'redirect']);
Route::get('/callback/{provider}', [SocialController::class, 'callback']);



//Route blog
Route::get('/blog', [PageController::class, 'blog']);



Route::get('/customer', [CustomerController::class, 'index'])->name('login');
Route::post('/customer/login', [CustomerController::class, 'customerLogin']);
Route::post('/customer/register', [CustomerController::class, 'customerRegister']);
Route::get('/email/verify/{user_id}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password/{token}', [ForgotPasswordController::class, 'reset'])->name('password.update');
Route::prefix('customer')->middleware('HandleLoginCustomer')->group(function () {
    Route::get('/profile', [CustomerController::class, 'customerProfile']);
    Route::get('/shipaddres', [CustomerController::class, 'customerShipAddres']);
    Route::post('/logout', [CustomerController::class, 'customerLogout']);
    Route::patch('/change_profile', [CustomerController::class, 'customerChangeProfile']);
    Route::patch('/change_profile_more', [CustomerController::class, 'customerChangeProfileMore']);
    Route::patch('/change_addres', [CustomerController::class, 'customerChangeAddres']);
    Route::get('/order', [CustomerController::class, 'customerOrder']);
    Route::get('/orderdetail/{id}', [CustomerController::class, 'customerOrderDetail']);
    Route::get('/wishlist', [CustomerController::class, 'customerWishList']);
});

//Route handle wish list, comment, search
Route::post('/handle-wishlist', [CustomerController::class, 'handleWishList']);
Route::post('/add-comment-customer', [CustomerController::class, 'addCommentUser']);
Route::post('/get-data-search', [CustomerController::class, 'getDataSearch']);

//Route đăng nhập phía quản trị
Route::get('/admin', [UserController::class, 'getLogin']);
Route::post('/admin', [UserController::class, 'postLogin']);



//Route prefix admin, middleware login admin
Route::prefix('admin')->middleware('handleLoginAdmin')->group(function () {
    //Route dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);

    //Route Categorys
    Route::get('/categorys', [CategoryController::class, 'index']);
    Route::get('/categorys/create', [CategoryController::class, 'create']);
    Route::post('/categorys', [CategoryController::class, 'store']);
    Route::get('/categorys/{id}/edit', [CategoryController::class, 'edit']);
    Route::patch('/categorys/{id}', [CategoryController::class, 'update']);
    Route::delete('/categorys/{id}', [CategoryController::class, 'destroy']);

    //Route Brands
    Route::resource('/brands', BrandController::class);

    //Route products
    Route::resource('/products', ProductController::class);

    //Route Users
    Route::resource('/users', UserController::class)->middleware('handleRoleAdmin');

    //Route profile admin
    Route::get('/profile/show', [UserController::class, 'showProfileAdmin']);
    Route::get('/profile/update', [UserController::class, 'showFormUpdateAdmin']);
    Route::patch('/profile/update', [UserController::class, 'updateProfileAdmin']);
    Route::get('/profile/logout', [UserController::class, 'logoutAdmin']);

    //Route orders
    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/orders/{id}', [OrderController::class, 'show']);
    Route::patch('/orders/{id}', [OrderController::class, 'update']);
    Route::delete('/orders/{id}', [OrderController::class, 'destroy']);
    

    //Route ships
    Route::get('/ships', [ShipController::class, 'index']);
    Route::get('/ships/create', [ShipController::class, 'create']);
    Route::get('/ships/{id}/edit', [ShipController::class, 'edit']);
    Route::post('/ships', [ShipController::class, 'store']);
    Route::post('/ships/{id}', [ShipController::class, 'update']);
    Route::delete('/ships/{id}', [ShipController::class, 'destroy']);
    Route::post('/city-id', [ShipController::class, 'getDataDistricts']);

});

//Route handle Filemanager
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

//Route link storage with puplic
Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
    echo "Link done !";
});


//Route clear cache, optimize
Route::get('/optimize', function () {
    Artisan::call('optimize');
    echo "Optimize done !";
});

