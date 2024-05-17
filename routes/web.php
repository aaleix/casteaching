<?php

use App\Http\Controllers\VideosController;
use App\Http\Controllers\VideosManageController;
use App\Models\Video;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/videos/{id}',[VideosController::class,'show']);

//Route::get('/videos/1', function () {
//    //return 'Ubuntu 101 | Here description | December 13';
//    $video=Video::find(1);
////    $video = new stdClass();
////    $video->title='Ubuntu 101';
////    $video->description='Here description';
////    $video->published_at='December 13';
//    return view('videos.show', [
//        'video'=>$video
//    ]);
//});




Route::middleware(['auth:sanctum','verified'])->group(function () {
    Route::get('/dashboard', function () {

        return view('dashboard');
    })->name('dashboard');

    Route::get('/manage/videos', [ VideosManageController::class,'index'])->middleware(['can:videos_manage_index'])
        ->name('manage.videos');
});
