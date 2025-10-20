<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AUthController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return 'welcome cihuyyy';
});


Route::get('/pcr', function(){
    return 'Selamat Datang di Website Kampus Pcr!';
});

Route::get('/mahasiswa', function(){
    return 'Selamat Datang di Kampus Pcr!';
})->name('mahasiswa.show');

Route::get('/nama/{param1}', function($param1){
    return 'Nama Saya: '.$param1;
});

Route::get('/nim/{param1?', function($param1){
    return 'Nim Saya: '.$param1;
});

Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);

Route::get('/about', function () {
    return view('halaman-about');
});

Route::get('/home', [HomeController::class,'index']);
Route::get('/info', [PegawaiController::class,'index']);


Route::post('question/store', [QuestionController::class, 'store'])
		->name('question.store');

Route::get('/dashboard', [DashboardController::class, 'index'])
		->name('admin.dashboard');

//Route::get('/login', [AuthController::class, 'index'])
//		->name('pages.login');
//
//        // Route untuk halaman login
//Route::get('/login', [AuthController::class, 'index'])->name('pages.login');
//
//// Route untuk proses login
//Route::post('/login', [AuthController::class, 'login']);
//
//// Route untuk halaman register
//Route::get('/register', [AuthController::class, 'index'])->name('pages.register');
//
//// Route untuk proses register (Named Route)
//Route::post('/register', [AuthController::class, 'register']);
//
//// Route untuk dashboard (setelah login)
//Route::get('/dashboard', function() {
//    return view('dashboard');
//})->middleware('auth')->name('dashboard');
//
//// Route untuk logout
//Route::post('/logout', function() {
//    Auth::logout();
//    request()->session()->invalidate();
//    request()->session()->regenerateToken();
//    return redirect('/login');
//})->name('logout');

Route::resource('pelanggan', PelangganController::class);


Route::resource('user', UserController::class);
