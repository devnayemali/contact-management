<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/contacts', [ContactController::class, 'list'])->name('contacts.list');
Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('contacts.show');
Route::get('/contacts/{id}/edit', [ContactController::class, 'edit'])->name('contact.edit');
Route::put('/contacts/{id}', [ContactController::class, 'update'])->name('contact.update');
Route::delete('/contacts/{id}', [ContactController::class, 'delete'])->name('contact.delete');


