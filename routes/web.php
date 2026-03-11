<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/unit-management', function () {
    return view('unit-management');
})->middleware(['auth', 'verified'])->name('unit.management');

Route::get('/document/need-responses', function(){
    return view('need-response');
})->middleware(['auth', 'verified'])->name('need-response');

Route::get('/accounts', function () {
    return view('accounts-management');
})->middleware(['auth', 'verified'])->name('account');

Route::get('/documents/my-documents', function(){
    return view('my-documents');
})->middleware(['auth', 'verified'])->name('my-documents');

Route::get('/documents/create-document', function(){
    return view('create-document');
})->middleware(['auth', 'verified'])->name('create-document');

Route::get('/documents/all-documents', function(){
    return view('all-documents');
})->middleware(['auth', 'verified'])->name('all-documents');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

require __DIR__.'/auth.php';
