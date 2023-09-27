<?php
use App\Http\Controllers\web\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::group(['controller' => ProductController::class,'prefix'=>'products'
],function(){
    Route::get('create','create')->name('product.create');
    Route::post('store','store')->name('product.store');
});