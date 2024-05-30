<?php

use App\Http\Controllers\SeriesManageController;
use App\Http\Controllers\UserManageController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\VideosManageController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
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

Route::get('/', [\App\Http\Controllers\LandingPageController::class, 'show']);

Route::get('/videos/{id}',[VideosController::class,'show']);


Route::middleware(['auth:sanctum','verified'])->group(function () {
    Route::get('/dashboard', function () {

        return view('dashboard');
    })->name('dashboard');

    Route::get('/manage/videos', [ VideosManageController::class,'index'])->middleware(['can:videos_manage_index'])
        ->name('manage.videos');

    Route::post('/manage/videos', [ VideosManageController::class,'store'])->middleware(['can:videos_manage_store']);

    Route::post('/manage/users', [ UserManageController::class,'store'])->middleware(['can:users_manage_store']);

    Route::delete('/manage/videos/{id}', [ VideosManageController::class,'destroy'])->middleware(['can:videos_manage_destroy']);

    Route::get('/manage/videos/{id}', [ VideosManageController::class,'edit'])->middleware(['can:videos_manage_edit']);

    Route::put('/manage/videos/{id}', [ VideosManageController::class,'update'])->middleware(['can:videos_manage_update']);

    Route::get('/manage/users/{id}', [ UserManageController::class,'edit'])->middleware(['can:users_manage_edit']);

    Route::put('/manage/users/{id}', [ UserManageController::class,'update'])->middleware(['can:users_manage_update']);

    Route::delete('/manage/users/{id}', [ UserManageController::class,'destroy'])->middleware(['can:users_manage_destroy']);

    Route::get('manage/users', [ UserManageController::class,'index'])->middleware(['can:users_manage_index'])
        ->name('manage.users');
});

Route::get('/manage/series', [ SeriesManageController::class,'index'])->middleware(['can:series_manage_index'])
    ->name('manage.series');

Route::post('/manage/series',[ SeriesManageController::class,'store' ])->middleware(['can:series_manage_store']);
Route::delete('/manage/series/{id}',[ SeriesManageController::class,'destroy' ])->middleware(['can:series_manage_destroy']);
Route::get('/manage/series/{id}',[ SeriesManageController::class,'edit' ])->middleware(['can:series_manage_edit']);
Route::put('/manage/series/{id}',[ SeriesManageController::class,'update' ])->middleware(['can:series_manage_update']);

//Route::put('/manage/series/{id}/image',[ SeriesImagesManageController::class,'update' ])->middleware(['can:series_manage_update']);

Route::get('/auth/redirect', [\App\Http\Controllers\GithubAuthController::class, 'redirect']);
Route::get('/auth/callback', [\App\Http\Controllers\GithubAuthController::class, 'callback']);


