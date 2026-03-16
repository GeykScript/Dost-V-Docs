<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect()->route('login');
});

// Dashboard page
Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Need Responses page
Route::get('/document/need-responses', function(){
    return view('documents.needResponses.need-response');
})->middleware(['auth', 'verified'])->name('need-response');

Route::get('/document/need-responses/view/{id}', function(){
    return view('documents.needResponses.need-response-view');
})->middleware(['auth', 'verified'])->name('need-response.view');


Route::get('/document/need-responses/transaction/view/', function(){
    return view('documents.transaction.transaction-view');
})->middleware(['auth', 'verified'])->name('transaction.view');


// My Documents page
Route::get('/document/my-documents', function () {
    return view('documents.myDocuments.my-documents'); 
})->middleware(['auth', 'verified'])->name('my-documents');

// All Documents page
Route::get('/document/all-documents', function () {
    return view('documents.allDocuments.all-documents'); 
})->middleware(['auth', 'verified'])->name('all-documents');

// Create Document page
Route::get('/document/create-document', function () {
    return view('documents.createDocument.create-document'); 
})->middleware(['auth', 'verified'])->name('create-document');

// Units page
Route::get('/management/unit', function () {
    return view('unit.units');   
})->middleware(['auth', 'verified'])->name('units');


// ACCOUNTS CONTROLLERS
use App\Http\Controllers\Accounts\EditAccountController;
use App\Http\Controllers\Accounts\AddAccountController;
// Accounts page ---------------------------------
Route::get('/management/accounts', function () {
    return view('account.accounts');
})->middleware(['auth', 'verified'])->name('accounts');
// Add Account page
Route::get('/management/accounts/add', [AddAccountController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('accounts.add');

// Account Edit page
Route::get('/management/accounts/edit/{id}', [EditAccountController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('accounts.edit');



// Document Types page
Route::get('/document/setup/type', function () {
    return view('type.types');
})->middleware(['auth', 'verified'])->name('type');

// Document Actions page
Route::get('/document/setup/action', function () {
    return view('action.actions');
})->middleware(['auth', 'verified'])->name('action');


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
