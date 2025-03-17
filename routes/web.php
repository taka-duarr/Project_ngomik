<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerKomik; // Import Controller
use App\Http\Controllers\ControllerUser; // Import Controller

// Route::get('/', function () {
//     return view('ViewAdmin.userlist');
// });

//  
 Route::get('/users', [ControllerUser::class, 'index'])->name('ViewAdmin.userlist');
 Route::get('/users/{id}/edit', [ControllerUser::class, 'edit'])->name('user.edit');
Route::put('/users/{id}', [ControllerUser::class, 'update'])->name('user.update');
Route::delete('/users/{id}', [ControllerUser::class, 'destroy'])->name('user.destroy');

Route::get('/', [ControllerKomik::class, 'index'])->name('ViewUser.index');


