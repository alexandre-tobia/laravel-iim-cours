<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('articles')->name('article.')->group(function () {
    Route::get('/', [\App\Http\Controllers\ArticleController::class, 'index'])->name('index');
    Route::get('/create', [\App\Http\Controllers\ArticleController::class, 'create'])->name('create');
    Route::get('/{slug}', [\App\Http\Controllers\ArticleController::class, 'show'])->name('show');
    Route::post('/', [\App\Http\Controllers\ArticleController::class, 'store'])->name('store');
    Route::get('/{slug}/edit', [\App\Http\Controllers\ArticleController::class, 'edit'])->name('edit');
    Route::put('/{slug}', [\App\Http\Controllers\ArticleController::class, 'update'])->name('update');
    Route::delete('/{slug}', [\App\Http\Controllers\ArticleController::class, 'delete'])->name('delete');

    Route::middleware('auth')->group(function() {
        Route::post('/{slug}/comments', [\App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');
        Route::delete('/{slug}/comments/{id}', [\App\Http\Controllers\CommentController::class, 'delete'])
            ->name('comment.delete')
            ->middleware('isAdmin')
        ;
    });
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
