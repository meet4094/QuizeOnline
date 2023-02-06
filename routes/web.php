<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ApiCallController;

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

Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Language
    Route::get('language', [LanguageController::class, 'index'])->name('language');
    Route::get('/Get_LanguageData', [LanguageController::class, 'Get_LanguageData'])->name('Get_LanguageData');
    Route::post('/Add_Edit_LanguageData', [LanguageController::class, 'Add_Edit_LanguageData'])->name('Add_Edit_LanguageData');
    Route::get('/Edit_LanguageData/{id}', [LanguageController::class, 'Edit_LanguageData'])->name('Edit_LanguageData');
    Route::post('/Delete_LanguageData', [LanguageController::class, 'Delete_LanguageData'])->name('Delete_LanguageData');
    Route::post('/LanguageData', [LanguageController::class, 'LanguageData'])->name('LanguageData');

    // Category
    Route::get('category', [CategoryController::class, 'index'])->name('category');
    Route::get('/Get_CategoryData', [CategoryController::class, 'Get_CategoryData'])->name('Get_CategoryData');
    Route::post('/Add_Edit_CategoryData', [CategoryController::class, 'Add_Edit_CategoryData'])->name('Add_Edit_CategoryData');
    Route::get('/Edit_CategoryData/{id}', [CategoryController::class, 'Edit_CategoryData'])->name('Edit_CategoryData');
    Route::post('/Delete_CategoryData', [CategoryController::class, 'Delete_CategoryData'])->name('Delete_CategoryData');
    Route::post('/CategoryData', [CategoryController::class, 'CategoryData'])->name('CategoryData');


    // Question
    Route::get('question', [QuestionController::class, 'index'])->name('question');
    Route::get('/Get_QuestionsData', [QuestionController::class, 'Get_QuestionsData'])->name('Get_QuestionsData');
    Route::post('/Add_Edit_QuestionsData', [QuestionController::class, 'Add_Edit_QuestionsData'])->name('Add_Edit_QuestionsData');
    Route::get('/Edit_QuestionsData/{id}', [QuestionController::class, 'Edit_QuestionsData'])->name('Edit_QuestionsData');
    Route::post('/Delete_QuestionsData', [QuestionController::class, 'Delete_QuestionsData'])->name('Delete_QuestionsData');

    // App Setting
    Route::get('/appsetting', [SettingController::class, 'index'])->name('appsetting');
    Route::get('/Get_AppSettingData', [SettingController::class, 'Get_AppSettingData'])->name('Get_AppSettingData');
    Route::post('/Add_Edit_AppSettingData', [SettingController::class, 'Add_Edit_AppSettingData'])->name('Add_Edit_AppSettingData');
    Route::get('/Edit_AppSettingData/{id}', [SettingController::class, 'Edit_AppSettingData'])->name('Edit_AppSettingData');
    Route::post('/Delete_AppSettingData', [SettingController::class, 'Delete_AppSettingData'])->name('Delete_AppSettingData');

    // API CALL
    Route::get('/apicall', [ApiCallController::class, 'index'])->name('apicall');
    Route::get('/Get_ApiCallData', [ApiCallController::class, 'Get_ApiCallData'])->name('Get_ApiCallData');
});
