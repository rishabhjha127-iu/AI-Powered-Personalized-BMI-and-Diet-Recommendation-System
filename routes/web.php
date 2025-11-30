<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorControllerV3;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/create-symlink', function () {
    try {
        Artisan::call('storage:link');
        return "Symbolic link created successfully!";
    } catch (\Exception $e) {
        return "Error creating the symbolic link: " . $e->getMessage();
    }
});

Route::get('/', function () {
    return view('welcome');
});


Route::post('/calculate-bmi', [DoctorControllerV3::class, 'store'])->name('calculate.bmi');


Auth::routes();


