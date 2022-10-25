<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

// main route for website
Route::get('/',[HomeController::class,"index"]);
// main route for dashboard 
Route::get("/redirect",[HomeController::class,'redirect']);


// category 
Route::get("view_category",[AdminController::class,'view_category']);

// add category 
Route::post('add_category',[AdminController::class,"add_category"]);

// delete category 
Route::get('delete_category/{id}',[AdminController::class,"delete_category"]);

//[[-------------------------- Products --------------------------------------------------------------------------------------------]]

// view_product
Route::get('/view_product',[AdminController::class,'view_product']);

// add_product
Route::post("/add_product",[AdminController::class,'add_product']);

// show product 
Route::get("show_product",[AdminController::class,"show_product"]);

// delete product 
Route::get("delete_product/{id}",[AdminController::class,"delete_product"]);

// update product 
Route::get("update_product/{id}",[AdminController::class,"update_product"]);

//update product logic
Route::post("update_product_logic/{id}",[AdminController::class,"update_product_logic"]);

// product details page
Route::get("/product_details/{id}",[HomeController::class,"product_details"]);

// ------------------------------------------------------------------------------------------------------------

// add to cart 
Route::post('add_to_cart/{id}',[HomeController::class,"add_to_cart"]);
// show cart 
Route::get("show_cart",[HomeController::class,"show_cart"]);
// delete product from cart
Route::get("delete_cart/{id}",[HomeController::class,"delete_cart"]);
// cash order 
Route::get("cash_order",[HomeController::class,"cash_order"]);
// stripe =>payment
Route::get("stripe/{total}",[HomeController::class,"stripe"]);
// stripe route
Route::post('stripe/{total_price}', [HomeController::class,"stripePost"])->name('stripe.post');


// ------------------ Orders  ----------------------------------------------------------------------------------

Route::get("orders",[AdminController::class,"orders"]);

// update_order_delevered
Route::get("update_order_delevered/{id}",[AdminController::class,"update_order_delevered"]);

//order_pdf
Route::get("order_pdf/{id}",[AdminController::class,"order_pdf"]);

// send email
Route::get("send_email/{id}",[AdminController::class,"send_email"]);
// send_notification
Route::get("send_notification/{id}",[AdminController::class,"send_notification"]);
// order_search
Route::get("order_search",[AdminController::class,"order_search"]);
// user_order
Route::get("user_order",[HomeController::class,"user_order"]);
// delete_order
Route::get("delete_order/{id}",[HomeController::class,"delete_order"]);


// --------------- contact ----------------------------------------------------------------------------------------------------------

// contact view 
Route::get("contact",[HomeController::class,"contact"]);
// add_message
Route::post("add_message",[HomeController::class,"add_message"]);

// -------------------- users  --------------------------------------------------------------------------------------------------------
Route::get("view_users",[AdminController::class,"view_users"]);
// add_user
Route::get("add_user",[AdminController::class,"add_user"]);
// delete_user
Route::get("delete_user/{id}",[AdminController::class,"delete_user"]);
// user_search
Route::get("user_search",[AdminController::class,"user_search"]);
// messages
Route::get("messages",[AdminController::class,"messages"]);