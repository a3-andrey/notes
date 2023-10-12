<?php

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

Route::redirect('/', 'login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->name('dashboard.')->prefix('dashboard')->group(function () {
   Route::name('notes.')->prefix('notes')->group(function (){
       Route::get('/',[\App\Http\Controllers\Dashboard\NoteController::class,'index'])->name('index');
       Route::view('/notes/create','dashboard.notes.create' )->name('create');
       Route::get('/notes/{note}/edit',fn(\App\Models\Note $note) => view('dashboard.notes.edit',['note' => $note]))->name('edit');
   });
//    Route::view('/notes/edit','dashboard.notes.edit' )->name('notes.edit');
});

require __DIR__.'/auth.php';
