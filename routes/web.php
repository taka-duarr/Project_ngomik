<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerKomik; // Import Controller

// Route::get('/', function () {
//     return view('welcome');
// });

//  
// Route::get('/', [ControllerKomik::class, 'index'])->name('welcome');


Route::get('/', [ControllerKomik::class, 'index'])->name('ViewUser.index');


