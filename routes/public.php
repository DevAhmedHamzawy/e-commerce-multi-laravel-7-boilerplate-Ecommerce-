<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes (NOTE:- SPECIALIZED FOR PUBLIC ROUTES) 
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// List SubCategories
Route::get('list_subcategories/{id}', 'SubCategoryController@list')->name('list_subcategories');

// List Options
Route::get('list_options/{id}', 'OptionController@list')->name('list_options');

// List Areas
Route::get('list_areas/{area}' , 'AreaController@show')->name('areas.show');

// Welcome
Route::get('/', 'Main\HomeController@welcome')->name('welcome');

// Vendors
Route::resource('the_all_vendors', 'Main\VendorController')->only(['index', 'show']);

// Vendors Map
Route::get('vendors_map', 'Main\VendorController@onMap');

// vendors page
Route::get('the_all_vendors_page/{vendor_page}', 'Main\VendorController@page')->name('the_all_vendors_page');

// Create New Vendor
Route::get('createStore', 'Main\CreateStoreController@show')->name('createStore');

// Save The Store
Route::post('saveStore', 'Main\CreateStoreController@store')->name('saveStore');

// Invoice
Route::get('/invoice/{order}', 'Main\HomeController@invoice')->name('invoice');

// search
Route::get('/search', 'Main\SearchController@index')->name('search');

// Products By Category
Route::get('/all_products/{category}', 'Main\ProductController@index')->name('all_products.index');

// Show Product
Route::get('/all_product/{product}', 'Main\ProductController@show')->name('all_products.show');

// Contacts
Route::get('contact_us', 'Main\ContactController@show')->name('contact_us');
Route::post('sendcontact', 'Main\ContactController@store');

// Cart
Route::get('/cart', 'Main\CartController@index')->name('cart.index');
Route::get('/add_to_cart/{product}', 'Main\CartController@store')->name('cart.store');
Route::post('/update_cart', 'Main\CartController@update')->name('cart.update');
Route::get('/remove_from_cart/{rowId}', 'Main\CartController@destroy')->name('cart.destroy');

// pages
Route::get('the_page/{the_page}', 'Main\PageController@showWeb')->name('the_page');

// discount
Route::get('get_discount', 'Main\CouponController@apply')->name('get_discount');

// The Shipping Address
Route::get('/the_shipping_address', 'Main\CheckOutController@getShippingAddress')->name('the_shipping_address');
Route::post('/save_the_shipping_address', 'Main\CheckOutController@storeTheShippingAddress')->name('save_the_shipping_address');

// The Order Summary
Route::get('/the_summary', 'Main\CheckOutController@summary')->name('the_summary');

// The Order
Route::get('/save_the_order/{sort}', 'Main\OrderController@store')->name('save_the_order');

// The Payment
Route::post('/the_payment/{sort}', 'Main\PaymentController@store')->name('the_payment');

// If Payment Success => success , If Payment Fail => fail
Route::get('/success/{sort}', 'Main\CheckOutController@success')->name('success');
Route::get('/fail', 'Main\CheckOutController@fail')->name('fail');


Route::group(['middleware' => 'verified'],function(){

    // Home
    Route::get('/home', 'Main\HomeController@index')->name('home');

     // Shipping Address
     Route::get('/shipping_address', 'Main\CheckOutController@getShippingAddress')->name('shipping_address');
     Route::post('/save_shipping_address', 'Main\CheckOutController@storeShippingAddress')->name('save_shipping_address');
 
     // Order Summary
     Route::get('/summary', 'Main\CheckOutController@summary')->name('summary');
 
     // Order
     Route::get('/save_order/{sort}', 'Main\OrderController@store')->name('save_order');
     Route::get('/order/{id}', 'Main\OrderController@show')->name('show_order');
 
     //Payment
     Route::post('/payment/{sort}', 'Main\PaymentController@store')->name('payment');
 
     //Favourite
     Route::post('/favourite', 'Main\FavouriteController@store')->name('favourite');
 
     //Get Favourites
     Route::get('the_favourites', function () {
         return view('main.profile.favourites.index');
     })->name('get_favourites');
 
     // Rating
     Route::post('/ratingStar', 'Main\RatingController@store')->name('ratingStar');

    Route::resource('messages', 'Main\MessageController')->only(['index','show','store']);
});
