<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\MenuComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\WishlistComponent;
use App\Http\Livewire\ProductDetailsComponent;

// use App\Http\Livewire\user\UserDashboardComponent;
use App\Http\Livewire\user\UserReviewComponent;
use App\Http\Livewire\user\UserReviewEditComponent;
use App\Http\Livewire\user\UserProfileComponent;
use App\Http\Livewire\user\UserProfileEditComponent;
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

use App\Http\Livewire\admin\AdminPermissionComponent;
use App\Http\Livewire\admin\AdminPermissionAddComponent;
use App\Http\Livewire\admin\AdminPermissionEditComponent;

use App\Http\Livewire\admin\AdminRoleComponent;
use App\Http\Livewire\admin\AdminRoleAddComponent;
use App\Http\Livewire\admin\AdminRoleEditComponent;

use App\Http\Livewire\admin\AdminUserRolesComponent;
use App\Http\Livewire\admin\AdminUserRolesEditComponent;

use App\Http\Livewire\admin\AdminAboutComponent;


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
Route::get('/', HomeComponent::class)->name('home.index');
Route::get('/menu', MenuComponent::class)->name('menu.index');
Route::get('/menu/{product_id}/{slug}', ProductDetailsComponent::class)->name('menu.details');
Route::get('/cart', CartComponent::class)->name('cart.index');
Route::get('/wishlist', WishlistComponent::class)->name('wishlist.index');


// For User or Customer
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
    Route::get('/checkout', CheckoutComponent::class)->name('checkout.index');
    Route::get('/thank-you', ThankYouComponent::class)->name('thankyou');

    Route::get('/user/order', UserOrderComponent::class)->name('user.order');
    Route::get('/user/order/{order_id}', UserOrderDetailsComponent::class)->name('user.orderdetail');

    Route::get('/user/change-password', UserChangePasswordComponent::class)->name('user.changepassword');

    Route::get('/user/review/{order_item_id}', UserReviewComponent::class)->name('user.review');
    Route::get('/user/review/edit/{order_item_id}', UserReviewEditComponent::class)->name('user.reviewedit');

    Route::get('/user/profile', UserProfileComponent::class)->name('user.profile');
    Route::get('/user/profile/edit', UserProfileEditComponent::class)->name('user.profileedit');


});

// For Admin
Route::middleware(['auth:sanctum', 'verified', 'role_or_permission:super-admin|admin-access'])->group(function () {

    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');

    Route::get('/admin/category', AdminCategoryComponent::class)->name('admin.category');
    Route::get('/admin/category/add', AdminCategoryAddComponent::class)->name('admin.addcategory');
    Route::get('/admin/category/edit/{category_id}', AdminCategoryEditComponent::class)->name('admin.editcategory');

    Route::get('/admin/product', AdminProductComponent::class)->name('admin.product');
    Route::get('/admin/product/add', AdminProductAddComponent::class)->name('admin.addproduct');
    Route::get('/admin/product/edit/{product_id}', AdminProductEditComponent::class)->name('admin.editproduct');

    Route::get('/admin/coupon', AdminCouponComponent::class)->name('admin.coupon');
    Route::get('/admin/coupon/add', AdminCouponAddComponent::class)->name('admin.addcoupon');
    Route::get('/admin/coupon/edit/{coupon_id}', AdminCouponEditComponent::class)->name('admin.editcoupon');

    Route::get('/admin/order', AdminOrderComponent::class)->name('admin.order');
    Route::get('/admin/order/{order_id}', AdminOrderDetailsComponent::class)->name('admin.orderdetail');

    Route::get('/admin/contact-us', AdminContactComponent::class)->name('admin.contact');

    Route::get('/admin/permission', AdminPermissionComponent::class)->name('admin.permission');
    Route::get('/admin/permission/add', AdminPermissionAddComponent::class)->name('admin.addpermission');
    Route::get('/admin/permission/edit/{permission_id}', AdminPermissionEditComponent::class)->name('admin.editpermission');

    Route::get('/admin/role', AdminRoleComponent::class)->name('admin.role');
    Route::get('/admin/role/add', AdminRoleAddComponent::class)->name('admin.addrole');
    Route::get('/admin/role/edit/{role_id}', AdminRoleEditComponent::class)->name('admin.editrole');

    Route::get('/admin/user-roles', AdminUserRolesComponent::class)->name('admin.userrole');
    Route::get('/admin/user-roles/edit/{user_id}', AdminUserRolesEditComponent::class)->name('admin.edituserrole');

    Route::get('/admin/about', AdminAboutComponent::class)->name('admin.about');

});
