<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\website\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PostController;
use App\Models\Categorie;
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

Route::get('/',[IndexController::class,'index'])->name('index');   


Route::middleware('auth')->prefix('admin')->group(function(){
    Route::get('/home', function () {
        return view('layout.admin');
    })->name('admin.dashboard');
    Route::get('/post',[PostController::class,'index'])->name('admin.post');
    Route::get('/createPost',[PostController::class,'create'])->name('admin.post.showCreate');
    Route::post('/storePost',[PostController::class,'store'])->name('admin.post.store');
    Route::get('/viewPost/{id}',[PostController::class,'show'])->name('admin.post.view');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
