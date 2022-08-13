<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\querycontroller;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//route for without get data from db
Route::get('data',[ApiController::class, 'getdata']);
//route for with get data from db
Route::get('list',[ApiController::class, 'getdb']);
//route for with get data from db with parameter
Route::get('list/{id}',[ApiController::class, 'getpara']);
// Rouet for making Id optional
Route::get('listid/{id?}',[ApiController::class,'getpIdOptional']);

// Rouet for Post Api
Route::POST('add',[ApiController::class,'add']);



// Rouet for Put Api
Route::PUT('update',[ApiController::class,'update']);

Route::POST('register',[ApiController::class,'register']);

Route::DELETE('delete/{id}',[ApiController::class,'delete']);
// route for search Api
Route::get('search/{name}',[ApiController::class,'search']);
Route::POST('validate',[ApiController::class,'validatef']);
//route for resources
Route::resource('resourceurl',querycontroller::class);
Route::POST('fileupload',[ApiController::class,'fileupload']);

// Route for passport pkg

Route::post('login', [RegisterController::class, 'login']);

Route::middleware('auth:api')->group( function () {

    Route::resource('products', ProductController::class);

});
