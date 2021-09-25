<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\IjinController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::resource('products', ProductController::class);

//Public rutes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/ijins', [IjinController::class, 'index']);
Route::get('/users', [AuthController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/ijins/{id}', [IjinController::class, 'show']);
Route::get('/products/search/{name}', [ProductController::class, 'search']);
Route::get('/ijins/search/{nik}', [IjinController::class, 'search']);


// Route::resource('ijins', IjinController::class);
// Route::get('/ijins/search/{nik}', [IjinController::class, 'search']);


// Route::get('/ijins', [IjinController::class, 'index']);
// Route::post('/ijins', [IjinController::class, 'store']);


//Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/products', [ProductController::class, 'store']); 
    Route::post('/ijins', [IjinController::class, 'store']);      
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::put('/ijins/{id}', [IjinController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
    Route::delete('/ijins/{id}', [IjinController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
