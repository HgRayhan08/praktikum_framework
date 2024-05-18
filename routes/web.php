<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('welcome');
});
Route::get('home', [HomeController::class, 'index'])->middleware("auth")->name('home');
Route::get('profile', ProfileController::class)->middleware("auth")->name('profile');
Route::resource('employees', EmployeeController::class);

Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate']);

// Mennyimpan file pada local
Route::get('/local-disk', function () {
    Storage::disk('local')->put('local-example.txt', 'This is local example
    content');
    return asset('storage/local-example.txt');
});

// menyimpan file pada public
Route::get('/public-disk', function () {
    Storage::disk('public')->put('public-example.txt', 'This is public example
    content');
    return asset('storage/public-example.txt');
});

// Menampilkan isi file local
Route::get('/retrieve-local-file', function () {
    if (Storage::disk('local')->exists('local-example.txt')) {
        $contents = Storage::disk('local')->get('local-example.txt');
    } else {
        $contents = 'File does not exist';
    }
    return $contents;
});

// menampilkan isi file public
Route::get('/retrieve-public-file', function () {
    if (Storage::disk('public')->exists('public-example.txt')) {
        $contents = Storage::disk('public')->get('public-example.txt');
    } else {
        $contents = 'File does not exist';
    }
    return $contents;
});

// download file local
Route::get('/download-local-file', function () {
    return Storage::download('local-example.txt', 'local file');
});

// download file public
Route::get('/download-public-file', function () {
    return Storage::download('public/public-example.txt', 'public file');
});

// menampilkan url fule
Route::get('/file-url', function () {
    // Just prepend "/storage" to the given path and return a relative URL
    $url = Storage::url('local-example.txt');
    return $url;
});
// menampilkan size file
Route::get('/file-size', function () {
    $size = Storage::size('local-example.txt');
    return $size;
});
// menampilkan path file
Route::get('/file-path', function () {
    $path = Storage::path('local-example.txt');
    return $path;
});

// menyimpan via form
Route::get('/upload-example', function () {
    return view('upload_example');
});
Route::post('/upload-example', function (Request $request) {
    $path = $request->file('avatar')->store('public');
    return $path;
})->name('upload-example');


// menghapus file pada storage
Route::get('/delete-local-file', function (Request $request) {
    Storage::disk('local')->delete('local-example.txt');
    return 'Deleted';
});
Route::get('/delete-public-file', function (Request $request) {
    Storage::disk('public')->delete('public-example.txt');
    return 'Deleted';
});

// download file
Route::get('download-file/{employeeId}', [
    EmployeeController::class,
    'downloadFile'
])->name('employees.downloadFile');
