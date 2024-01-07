<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CatagoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//người dùng
// Hiển thị trang chủ
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/lien-he',[HomeController::class, 'contact'])->name('contact_user');
// lien he trong admin
// Route::get('/lien-he-admin',[HomeController::class, 'contact_admin'])->name('contact');

//Hiển thị trang sản phẩm
Route::get('/san-pham',[CatagoriesController::class,'products'])->name('product');
//Hiển thị trang sản phẩm trong admin
Route::get('/san-pham-admin', [CatagoriesController::class, 'products_admin']);

// danh sách sản phẩm
Route::get('/danh-sach-san-pham', [CatagoriesController::class,'allProducts'])->name('allproduct');
// Hiển thị form thêm sản phẩm

Route::get('/them-san-pham', [CatagoriesController::class,'getProduct'])->name('getproduct');

Route::post('/them-san-pham', [CatagoriesController::class,'postProduct'])->name('postproduct');

Route::get('/delete/{id}', [CatagoriesController::class, 'delete'])->name('delete');

//admin
Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/',[AdminController::class, 'all_user'])->name('index');

    Route::get('/add',[AdminController::class, 'add'])->name('add');

    Route::post('/add',[AdminController::class, 'postAdd'])->name('post-add');

    Route::get('/edit/{id}', [AdminController::class, 'getEdit'])->name('edit');

    Route::post('/update', [AdminController::class, 'postEdit'])->name('post-edit');

    Route::get('/delete/{id}', [AdminController::class, 'delete'])->name('delete');
//mượn
    Route::get('/danh-sach-muon',[AdminController::class, 'muon'])->name('listmuon');//danh sách mượn

    Route::get('/them-nguoi-muon',[AdminController::class, 'getMuon'])->name('getmuon');//getthêm 

    Route::post('/them-nguoi-muon',[AdminController::class, 'postMuon'])->name('postmuon');//postthêm

    // Route::get('/edit/{id}', [AdminController::class, 'getEdit'])->name('edit');//get cập nhật

    // Route::post('/update', [AdminController::class, 'postEdit'])->name('post-edit');// post cập nhật
});

//Login
Route::get('/Login',[UsersController::class, 'display_login'])->name('login');

// ------------
Route::get('/danh-muc-san-pham/{category_id}', [CatagoriesController::class, 'show_category_home']);

Route::get('/cap-nhat-ngay-tra/{phieumuon_id}', [AdminController::class, 'cap_nhat_ngay_tra']);

Route::get('/chi-tiet-san-pham/{product_id}', [CatagoriesController::class, 'details_product']);


// Trang admin
Route::get('/admin', [AdminController::class, 'admin_index']);
Route::post('/login-admin', [AdminController::class, 'login_admin']);
Route::get('/admin-dashboard', [AdminController::class, 'admin_dashboard']);
Route::get('/logout-admin', [AdminController::class, 'logout_admin']);
Route::get('/all-user',[AdminController::class, 'all_user'])->name('all_user');;

// User
Route::post('/login-user', [UsersController::class, 'login_user'])->name('login_user');
Route::get('/logout-user', [UsersController::class, 'logout_user'])->name('logout_user');

// Edit san pham
Route::get('/edit-product/{product_id}', [CatagoriesController::class, 'edit_product'])->name('edit_product');
Route::post('/update-product/{product_id}',  [CatagoriesController::class, 'update_product']);
