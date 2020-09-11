<?php

use App\Category;
use App\Product;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Route;
use Stripe\ApiOperations\Update;

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

Route::get('/', function () {
    $products = Product::all()->sortDesc();
    $categories = Category::all();
    return view('welcome',compact('products','categories'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products','ProductController@index')->name('products.show');

Route::get('/products/create','ProductController@create')->name('products.create');

Route::post('/products/store','ProductController@store')->name('products.store');

Route::get('/categories/create','CategoryController@create')->name('categories.create');

Route::get('/categories','CategoryController@show')->name('categories.show');

Route::post('/categories/store','CategoryController@store')->name('categories.store');

Route::get('/products/{product}','ProductController@show')->name('products.show');

Route::get('/search','ProductController@search')->name('products.search');



// cart Routes

Route::get('/panier','CartController@index')->name('cart.index');

Route::post('/panier/ajouter','CartController@store')->name('cart.store');

Route::patch('/panier/{rowId}','CartController@update')->name('cart.update');

Route::get('/viderpanier',function(){
    Cart::destroy();
});

Route::delete('/panier/{rowid}','CartController@destroy')->name('cart.destroy');

// Paiement Routes

Route::get('/paiement','PaiementController@index')->name('paiement.index');

Route::get('/thanks','PaiementController@thanks')->name('paiement.thanks');



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
