<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\MenuComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\WishlistComponent;
use App\Http\Livewire\ContactComponent;

use App\Http\Livewire\user\UserDashboardComponent;
use App\Http\Livewire\ThankYouComponent;

use App\Http\Livewire\user\UserOrderComponent;
use App\Http\Livewire\user\UserOrderDetailsComponent;

use App\Http\Livewire\user\UserChangePasswordComponent;

use App\Http\Livewire\admin\AdminDashboardComponent;

use App\Http\Livewire\admin\AdminCategoryComponent;
use App\Http\Livewire\admin\AdminCategoryAddComponent;
use App\Http\Livewire\admin\AdminCategoryEditComponent;

use App\Http\Livewire\admin\AdminProductComponent;
use App\Http\Livewire\admin\AdminProductAddComponent;
use App\Http\Livewire\admin\AdminProductEditComponent;

use App\Http\Livewire\admin\AdminCouponComponent;
use App\Http\Livewire\admin\AdminCouponAddComponent;
use App\Http\Livewire\admin\AdminCouponEditComponent;

use App\Http\Livewire\admin\AdminOrderComponent;
use App\Http\Livewire\admin\AdminOrderDetailsComponent;

use App\Http\Livewire\admin\AdminContactComponent;
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
//     return view('welcome');
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// for guest
Route::get('/',HomeComponent::class)->name('home.index');
Route::get('/menu',MenuComponent::class)->name('menu.index');
Route::get('/cart',CartComponent::class)->name('cart.index');
Route::get('/wishlist',WishlistComponent::class)->name('wishlist.index');
Route::get('/Contact-us',ContactComponent::class)->name('contact');

// For User or Customer
Route::middleware(['auth:sanctum','verified'])->group(function(){

    Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');    
    Route::get('/checkout',CheckoutComponent::class)->name('checkout.index');
    Route::get('/thank-you',ThankYouComponent::class)->name('thankyou');

    Route::get('/user/order',UserOrderComponent::class)->name('user.order');	
    Route::get('/user/order/{order_id}',UserOrderDetailsComponent::class)->name('user.orderdetail');

    Route::get('/user/change-password',UserChangePasswordComponent::class)->name('user.changepassword');	

});

// For Admin
Route::middleware(['auth:sanctum','verified','authadmin'])->group(function(){

    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');	
    
    Route::get('/admin/category',AdminCategoryComponent::class)->name('admin.category');	
    Route::get('/admin/category/add',AdminCategoryAddComponent::class)->name('admin.addcategory');	
    Route::get('/admin/category/edit/{category_id}',AdminCategoryEditComponent::class)->name('admin.editcategory');	

    Route::get('/admin/product',AdminProductComponent::class)->name('admin.product');	
    Route::get('/admin/product/add',AdminProductAddComponent::class)->name('admin.addproduct');	
    Route::get('/admin/product/edit/{product_id}',AdminProductEditComponent::class)->name('admin.editproduct');	

    Route::get('/admin/coupon',AdminCouponComponent::class)->name('admin.coupon');	
    Route::get('/admin/coupon/add',AdminCouponAddComponent::class)->name('admin.addcoupon');	
    Route::get('/admin/coupon/edit/{coupon_id}',AdminCouponEditComponent::class)->name('admin.editcoupon');	

    Route::get('/admin/order',AdminOrderComponent::class)->name('admin.order');	
    Route::get('/admin/order/{order_id}',AdminOrderDetailsComponent::class)->name('admin.orderdetail');	

    Route::get('/admin/contact',AdminContactComponent::class)->name('admin.contact');	
});
