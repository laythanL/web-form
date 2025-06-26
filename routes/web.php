<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\Logincontroller;
use App\Http\Controllers\SupportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Redirect('/login');
});



Route::get('login', [Logincontroller::class, 'index'])->name('login');
Route::post('login', [Logincontroller::class, 'login']);
Route::post('logout', [Logincontroller::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [SupportController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/buat-support', [SupportController::class, 'create'])->name('admin.buat-support');
    Route::post('/admin/buat-support', [SupportController::class, 'store'])->name('admin.store-support');

    Route::get('/admin/edit-support/{support}', [SupportController::class, 'edit'])->name('admin.edit-support');
    Route::put('/admin/edit-support/{support}', [SupportController::class, 'update'])->name('admin.update-support');

    Route::delete('/admin/support/{support}', [SupportController::class, 'destroy'])->name('admin.delete-support');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/list-device', [DeviceController::class, 'index'])->name('admin.list');
    Route::get('/buat-device', [DeviceController::class, 'create'])->name('admin.buat-device');
    Route::post('/buat-device', [DeviceController::class, 'store'])->name('admin.store-device');


    Route::get('/edit-device/{device}', [DeviceController::class, 'edit'])->name('admin.edit-device');
    Route::put('/edit-device/{device}', [DeviceController::class, 'update'])->name('admin.update-device');

    Route::delete('/device/{device}', [DeviceController::class, 'destroy'])->name('admin.delete-device');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/list-client', [ClientController::class, 'index'])->name('admin.list-client');
    Route::get('/buat-client', [ClientController::class, 'create'])->name('admin.buat-client');
    Route::post('/buat-client', [ClientController::class, 'store'])->name('admin.store-client');



    Route::get('/edit-client/{client}', [ClientController::class, 'edit'])->name('admin.edit-client');
    Route::put('/edit-client/{client}', [ClientController::class, 'update'])->name('admin.update-client');

    Route::delete('/client/{client}', [ClientController::class, 'destroy'])->name('admin.delete-client');

});





Route::middleware(['auth', 'role:staf'])->group(function () {
    Route::get('/staf/dashboard', function () {
        return view('staf.dashboard');
    });
})->name('dashbaord-staf');

Route::get('register', [LoginController::class, 'showRegisterForm'])->name('register');

// Proses register
Route::post('register', [LoginController::class, 'register']);


