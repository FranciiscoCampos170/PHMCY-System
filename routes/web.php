<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    return view('welcome');
});

Route::get('send-category', function(){
    \App\Models\Category::create([
        'name' => "Pills"
    ]);

    return true;
});

Route::view('home', 'dashboard')->name('home');

Route::get('/product-create',function(){
    return view('product.create');
})->name('product.create');

Route::get('/product-list', function(){
    return view('product.index');
})->name('product.index');

Route::post('/product-store',function (Request $request){
    return $request;
})->name('product.store');

Route::get('/product-edit/{product}', function (){
    return view('product.edit');
})->name('product.edit');

Route::patch('/product-update', function (Request $request){
    return $request;
})->name('product.update');

Route::get('/pos', function (){
    return view('POS.index');
})->name('pos');
