<?php
use App\Http\Controllers\web\BillController;
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

Route::group(['controller' => BillController::class,'prefix'=>'bills'
],function(){
    Route::get('create','create')->name('bill.create');
    Route::post('store','store')->name('bill.store');
});