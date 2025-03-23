<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerKomik; // Import Controller
use App\Http\Controllers\ControllerUser; // Import Controller
use App\Http\Controllers\ControllerChapter; // Import Controller
use App\Http\Controllers\ControllerAuth;

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




    Route::get('/komik/{id}/chapter', [ControllerChapter::class, 'index'])->name('ViewAdmin.chapterlist');
    Route::get('/komik/{id}/chapter/create', [ControllerChapter::class, 'create'])->name('chapter.create');
    Route::post('/komik/{id}/chapter', [ControllerChapter::class, 'store'])->name('chapter.store');
    Route::get('/chapter/{id}/edit', [ControllerChapter::class, 'edit'])->name('chapter.edit');
    Route::put('/chapter/{id}', [ControllerChapter::class, 'update'])->name('chapter.update');
    Route::delete('/chapter/{id}', [ControllerChapter::class, 'destroy'])->name('chapter.destroy');

   

Route::get('/register', [ControllerAuth::class, 'showRegisterForm'])->name('register');
Route::post('/register', [ControllerAuth::class, 'register']);
Route::get('/login', [ControllerAuth::class, 'showLoginForm'])->name('login');
Route::post('/login', [ControllerAuth::class, 'login']);
Route::post('/logout', [ControllerAuth::class, 'logout'])->name('logout');




Route::get('/home', [ControllerKomik::class, 'index'])->name('ViewUser.index');


