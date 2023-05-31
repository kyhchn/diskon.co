<?php

use App\Http\Controllers\KomenController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\ThreadController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/thread/{thread}/edit', [ThreadController::class, 'edit'])->name('thread.edit');
    Route::put('/thread/{thread}', [ThreadController::class, 'update'])->name('thread.update');
    Route::get('/thread/search', [ThreadController::class, 'search'])->name('thread.search');
    Route::delete('/komen/{id}', [KomenController::class, 'destroy'])->name('komen.destroy');
    Route::get('/komen/create/{thread_id}', [KomenController::class, 'create'])->name('komen.create');
    Route::get('/komen/{komen}/edit', [KomenController::class, 'edit'])->name('komen.edit');
    Route::put('/komen/{komen}', [KomenController::class, 'update'])->name('komen.update');
    Route::post('/komen', [KomenController::class, 'store'])->name('komen.store');
    Route::post('/reply', [ReplyController::class, 'store'])->name('reply.store');
    Route::delete('/reply/{id}', [ReplyController::class, 'destroy'])->name('reply.destroy');
    Route::get('/reply/create/{komen_id}', [ReplyController::class, 'create'])->name('reply.create');
    Route::get('/reply/{reply}/edit', [ReplyController::class, 'edit'])->name('reply.edit');
    Route::put('/reply/{reply}', [ReplyController::class, 'update'])->name('reply.update');
    Route::resource('thread', ThreadController::class);
});

require __DIR__ . '/auth.php';
