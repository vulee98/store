<?php
use WindowsAzure\Common\Internal\Atom\Category;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;

use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FronendController;
use App\Http\Controllers\RegisterController ;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/email', function () {
    return view('frontend.email'); 
});
//fronend
Route::get('/home', [FronendController::class, 'getHome'])->name('home');
Route::get('/details/{id}/{slug}.html', [FronendController::class, 'getDetail'])->name('product.details');
Route::post('/details/{id}/{slug}.html', [FronendController::class, 'postComment'])->name('comment');
Route::get('/search', [FronendController::class, 'getSearch'])->name('search');
Route::get('category/{id}/{slug}.html', [FronendController::class, 'getCategory'])->name('category');
//backend

Route::group(['namespace'=>'Admin'],function(){
    
        Route::get('/login', [LoginController::class, 'getLogin']);
        Route::post('/login', [LoginController::class, 'postLogin'])->name('postLogin');

        Route::get('admin/home', [HomeController::class, 'getHome'])->name('admin.home');
        
        Route::get('/logout', [HomeController::class, 'getLogout'])->name('logout');

        Route::get('/admin/category', [CategoryController::class, 'getCate'])->name('category');
        Route::post('/admin/category', [CategoryController::class, 'postCate'])->name('post.category');

        Route::get('admin/category/edit/{id}', [CategoryController::class, 'getEditCate'])->name('edit.category');
        Route::post('admin/category/edit/{id}', [CategoryController::class, 'postEditCate'])->name('admin.category.edit.post');
       
        Route::get('admin/category/delete/{id}', [CategoryController::class, 'getdeleteCate'])->name('delete.category');
});

// Route::resource('Product',ProductController::class);
// Route::group(['prefix'=>'product'],function(){});
       
Route::get('/admin/product', [ProductController::class, 'getProduct'])->name('product');
// Route::post('/admin/product', [ProductController::class, 'postProduct'])->name('post.product');
Route::post('admin/product/add', [ProductController::class, 'PostAddProduct'])->name('admin.product.add');
Route::get('/admin/product/add', [ProductController::class, 'getAddProduct'])->name('add.product');

Route::get('/admin/product/edit/{id}', [ProductController::class, 'getEditProduct'])->name('admin.product.edit');
Route::post('admin/product/edit/{id}', [ProductController::class, 'postEditProduct'])->name('edit.product.post');

Route::get('admin/product/delete/{id}', [ProductController::class, 'getDeleteProduct'])->name('delete.product');





Route::group(['prefix'=>'cart'],function(){
    Route::get('add/{id}','CartController@getAddCart');
});

Route::get('cart/add/{id}', [CartController::class, 'getAddCart'])->name('cart.add');

Route::get('cart', [CartController::class, 'getShowCart'])->name('cart.show');
// Route::get('delete/{id}', [CartController::class, 'getDeleteCart'])->name('cart.delete');
Route::get('cart/delete/{id}', [CartController::class, 'getDeleteCart'])->name('cart.delete');
Route::get('cart/update', [CartController::class, 'getUpdateCart'])->name('cart.update');
Route::post('cart', [CartController::class, 'postComplete'])->name('complete');

Route::get('complete', [CartController::class, 'getComplete'])->name('complete');


///dăng ký

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

//contact
Route::get('admin/contacts', [ContactController::class, 'contacts'])->middleware('auth');
Route::post('admin/contacts/{contact}/reply', [ContactController::class, 'reply'])->middleware('auth');

//oders
Route::resource('admin/orders', OrderController::class);
Route::patch('orders/{order}/status/{status}', [OrderController::class, 'changeStatus'])->name('orders.changeStatus');

Route::get('/backend/orders', [OrderController::class,'index'])->name('backend.orders.index');
