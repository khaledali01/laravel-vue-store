<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\todo;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UploadImageContr;
use App\Http\Controllers\products;
use App\Http\Controllers\cart;

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

//Route::get('/', function () {
//    return view('welcome');
//});

// products
Route::get('/api/products', [products::class, 'index']);
Route::get('/api/products/{slug}',[products::class, 'show']);

// cart
Route::get('/api/cart',[cart::class, 'index'])->middleware('auth:sanctum');
Route::post('/api/cart',[cart::class, 'store'])->middleware('auth:sanctum');

//users - admin
Route::post('/api/admin/me', [AuthController::class, 'me'])->middleware(['auth:sanctum','abilities:admin:full']);

//users - front
Route::post('/api/me', [AuthController::class, 'me'])->middleware(['auth:sanctum','abilities:user:normal']);

// admin
Route::post('/api/product',[products::class, 'store'])->middleware(['auth:sanctum','abilities:admin:full']);
Route::get('/api/admin/products/{slug}', [products::class, 'adminProduct'])->middleware(['auth:sanctum','abilities:admin:full']);
Route::delete('/api/admin/products/{slug}', [products::class, 'delete'])->middleware(['auth:sanctum','abilities:admin:full']);
Route::post('/api/me', [AuthController::class, 'me'])->middleware(['auth:sanctum','abilities:admin:full']);

//todo
Route::get('/api/todo', [todo::class, 'index']);
Route::post('/api/todo',[todo::class, 'store']);
Route::put('/api/todo',[todo::class, 'update']);

//images
//Route::get('/api/image', [todo::class, 'index']);
Route::post('/api/image',[UploadImageContr::class, 'store'] );

// Meet Users
Route::post('/api/create-user',[AuthController::class, 'register']);
Route::post('/api/login',[AuthController::class, 'login']);
//Route::post('/api/me', [AuthController::class, 'me'])->middleware(['auth:sanctum','abilities:admin:full']);

Route::get('/{vue_capture?}', function () {
    return view('welcome');
})->where('vue_capture', '[\/\w\.-]*');







