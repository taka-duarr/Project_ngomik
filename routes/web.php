<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerKomik; // Import Controller
use App\Http\Controllers\ControllerUser; // Import Controller

// Route::get('/', function () {
//     return view('ViewAdmin.userlist');
// });

//  
Route::get('/users', [ControllerUser::class, 'index'])->name('ViewAdmin.userlist');
Route::get('/users/create', [ControllerUser::class, 'create'])->name('user.create');
Route::post('/users', [ControllerUser::class, 'store'])->name('user.store');
Route::get('/users/{id}/edit', [ControllerUser::class, 'edit'])->name('user.edit');
Route::put('/users/{id}', [ControllerUser::class, 'update'])->name('user.update');
Route::delete('/users/{id}', [ControllerUser::class, 'destroy'])->name('user.destroy');

Route::get('/komik', [ControllerKomik::class, 'indexAdmin'])->name('ViewAdmin.komiklist');
Route::get('/komik/create', [ControllerKomik::class, 'create'])->name('komik.create');
Route::post('/komik', [ControllerKomik::class, 'store'])->name('komik.store');
Route::get('/komik/{id}/edit', [ControllerKomik::class, 'edit'])->name('komik.edit');
Route::put('/komik/{id}', [ControllerKomik::class, 'update'])->name('komik.update');
Route::delete('/komik/{id}', [ControllerKomik::class, 'destroy'])->name('komik.destroy');


Route::get('/', [ControllerKomik::class, 'index'])->name('ViewUser.index');


