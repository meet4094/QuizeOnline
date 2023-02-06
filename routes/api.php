<?php

use App\Http\Controllers\Api\MainController;
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

Route::post('apicall', [MainController::class, 'ApiCallData']);
Route::post('language', [MainController::class, 'LanguageData']);
Route::post('category', [MainController::class, 'CategoryData']);
Route::post('questions', [MainController::class, 'QuestionData']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
