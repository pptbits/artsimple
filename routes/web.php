<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\backend\Upload_ArtworkController;
use App\Http\Controllers\admin\Art_formController;
use App\Http\Controllers\admin\ManageUserController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['middleware' => ['auth.web']], function () {
    /**
     * Logout Route
     */
    Route::group(['middleware' => ['role:Buyer']], function () {
        Route::get('/uploadArtworkBuy/detail/{id}', [Upload_ArtworkController::class, 'detail'])->name('uploadArtwork.detail');
    }
    );
    Route::group(['middleware' => ['role:Seller']], function () {
        Route::get('/uploadArtwork', [Upload_ArtworkController::class, 'index'])->name('uploadArtwork');
        Route::post('/uploadArtwork/store', [Upload_ArtworkController::class, 'store'])->name('uploadArtwork.store');
        Route::get('/uploadArtwork/edit/{id}', [Upload_ArtworkController::class, 'edit'])->name('uploadArtwork.edit');
        Route::post('/uploadArtwork/update', [Upload_ArtworkController::class, 'update'])->name('uploadArtwork.update');
        // Route::get('/uploadArtwork/delete/{id}', [Upload_ArtworkController::class, 'destroy'])->name('uploadArtwork.destroy');

        Route::get('/uploadArtwork/detail/{id}', [Upload_ArtworkController::class, 'detail'])->name('uploadArtwork.detail');
    }
    );
    Route::group(['middleware' => ['role:Admin']], function () {
        Route::get('/art_form', [Art_formController::class, 'index'])->name('art_form');
        Route::post('/art_form/store', [Art_formController::class, 'store'])->name('art_form.store');
        Route::get('/art_form/edit/{id}', [Art_formController::class, 'edit'])->name('art_form.edit');
        Route::post('/art_form/update', [Art_formController::class, 'update'])->name('art_form.update');
        Route::get('/art_form/delete/{id}', [Art_formController::class, 'destroy'])->name('art_form.destroy');

        Route::get('/manage_user', [ManageUserController::class, 'index'])->name('manage_user');
        Route::get('/manage_user/edit/{id}', [ManageUserController::class, 'edit'])->name('manage_user.edit');
        Route::post('/manage_user/update', [ManageUserController::class, 'update'])->name('manage_user.update');
        Route::get('/manage_user/delete/{id}', [ManageUserController::class, 'destroy'])->name('manage_user.destroy');
    }
    );
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/logout', [LogoutController::class,'perform'] )->name('logout.perform');
 });

