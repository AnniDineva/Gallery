<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\UploadImagesController;
use App\Http\Controllers\UploadMultipleImageController;

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

Route::get('/', [HomeController::class, 'index'])
        ->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('users', [UserController::class, 'show'])
                ->name('user');

Route::get('gallery/{user_id?}', [GalleryController::class, 'index'])
        ->name('gallery');

Route::post('gallery/deletePhoto', [GalleryController::class, 'destroy'])
        ->name('photo_destroy');     
        
Route::get('photo/{id}', [GalleryController::class, 'show'])
        ->name('photo_show');

Route::get('/contacts', [ContactsController::class, 'create'])
                ->name('contacts');

Route::post('/contacts', [ContactsController::class, 'store'])
                ->name('contacts_send_message');




Route::middleware('auth')->group(function () {

    Route::post('/delete_user', [UserController::class, 'destroy'])
                ->name('user_destroy');

    Route::get('/upload_image', [UploadImagesController::class, 'index'])
                ->name('upload_image');
 
    Route::post('upload_image', [UploadImagesController::class, 'store'])
                ->name('upload_image');

    Route::post('add_comment', [CommentsController::class, 'store'])
                ->name('add_comment');

    Route::post('comment_destroy', [CommentsController::class, 'destroy'])
                ->name('comment_destroy');

    Route::get('/profile', [UserController::class, 'create'])
                ->name('profile');

    Route::post('/profile', [UserController::class, 'store'])
                ->name('profile_edit');
});