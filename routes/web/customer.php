<?php
use App\Http\Controllers\web\CustomerController;
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

Route::group(['controller' => CustomerController::class,'prefix'=>'customer'
],function(){
    Route::get('create','create')->name('customer.create');
    Route::post('store','store')->name('customer.store');
});