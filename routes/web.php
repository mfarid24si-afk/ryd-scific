<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\QuestionController;

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
