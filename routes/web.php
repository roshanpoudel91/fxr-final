<?php

use App\Http\Controllers\ShopifyController;
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



#Route::get('/',[ShopifyController::class, 'index']);
Route::get('/',[ShopifyController::class, 'addPage']);
Route::post('/page/save',[ShopifyController::class, 'savePage']);
