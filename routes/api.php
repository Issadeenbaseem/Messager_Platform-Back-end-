<?php


use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Contact;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/contact',[ContactController::class,'index']);

// Route::post('/contact',[ContactController::class,'store']);


Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/contacts/search/{firstname}',[ContactController::class,'search']);


Route::group(['middleware' =>'auth:sanctum'],function(){
  
    Route::resource('contacts', ContactController::class);
    Route::post('/logout',[AuthController::class,'logout']);

});