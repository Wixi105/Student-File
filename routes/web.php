<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [StudentController::class, 'index'])->name('students.dashboard');
    Route::get('/students/{student:studid}', [StudentController::class, 'show'])->name('students.show');
    Route::post('/temp/{student:studid}', [StudentController::class, 'tempUpload'])->name('students.temp');
    Route::post('/students/{student:studid}', [StudentController::class, 'upload'])->name('students.upload');

});

require __DIR__ . '/auth.php';
