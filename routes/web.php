<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Homecontroller;
use Illuminate\Support\Facades\Route;

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

 




 
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect', [Homecontroller::class, 'redirect']);
Route::get('/about', [Homecontroller::class, 'about'])->name('about');
Route::get('/contact', [Homecontroller::class, 'contact'])->name('contact');

Route::get('/', [Homecontroller::class, 'index'])->name('home');
Route::get('/home', [Homecontroller::class, 'home'])->name('home');
Route::get('/category/{id}', [Homecontroller::class, 'show'])->name('categoryshow');
Route::get('/subcategory/{id}', [Homecontroller::class, 'showProductsBySubcategory'])->name('subcategory.show');
Route::get('/product/{id}', [Homecontroller::class, 'productdetail'])->name('productdetail');
Route::post('/addcard/{id}', [Homecontroller::class, 'addcard']);
Route::get('/showcart', [Homecontroller::class, 'showcart'])->name('showcart');
Route::get('/deletecart/{id}', [Homecontroller::class, 'deletecart'])->name('deletcart');
Route::post('/order', [Homecontroller::class, 'confirmeorder'])->name('order');


 




 

Route::get('/home',[AdminController::class, 'home'] )->name('home');

/**  product route */


Route::get('/addproduct',[AdminController::class, 'addproduct'])->name('addproduct');
Route::post('/insertproduct',[AdminController::class, 'insertproduct'])->name('insertproduct');
Route::get('/product',[AdminController::class, 'product'])->name('product');
Route::get('/deleteproduct/{id}',[AdminController::class, 'deleteproduct'])->name('deleteproduct');
Route::get('/productedit/{product}/edit',[AdminController::class, 'productedit'])->name('productedit');
Route::post('/productupdate/{id}',[AdminController::class, 'productupdate'])->name('productupdate');
Route::get('/product/search',[AdminController::class, 'searchproduct'])->name('product.search');
Route::get('/deliveredorders', [AdminController::class,'showDeliveredOrders'])->name('deliveredorders');



/**  Category route */

Route::get('/addcategory',[AdminController::class, 'addcategory'])->name('addcategory');
Route::post('/storecategory',[AdminController::class, 'storecategory'])->name('storecategory');
Route::get('/category',[AdminController::class, 'category'])->name('category');
Route::get('/deletecategory/{id}',[AdminController::class, 'deletecategory'])->name('delecategory');
Route::get('/categoryedit/{category}/edit',[AdminController::class, 'categoryedit'])->name('categoryedit');
Route::post('/categoryupdate/{id}',[AdminController::class, 'update'])->name('categoryupdate');
Route::get('/categories/search',[AdminController::class, 'search'])->name('categories.search');

 
 
/**  Subcategory route */

Route::get('/subcategory',[AdminController::class, 'subcategory'])->name('subcategory');
Route::post('/storesubcategory',[AdminController::class, 'storesubcategory'])->name('storesubcategory');
Route::get('/addsubcategory',[AdminController::class, 'addsubcategory'])->name('addsubcategory');
Route::get('/deletesubcategory/{id}',[AdminController::class, 'deletesubcategory'])->name('deletesubcategory');
Route::get('/subcategoryedit/{subcategory}/edit',[AdminController::class, 'subcategoryedit'])->name('subcategoryedit');
Route::post('/subcategoryupdate/{id}',[AdminController::class, 'updatesubcategory'])->name('subcategoryupdate');
Route::get('/subcategories/search',[AdminController::class, 'searchsubcategory'])->name('subcategory.search');

/**  Order route */

Route::get('/showorder',[AdminController::class, 'showorder'])->name('showorder');
Route::get('/updatestatus/{id}',[AdminController::class, 'updatestatus'])->name('updatestatus');





 



