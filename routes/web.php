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

// Route::get('/', function () {
//     return view('add-student');
// });

Route::get('/add-student', [StudentController::class, 'addStudent']);
Route::post('/add-student', [StudentController::class, 'storeStudent'])->name('student.store');
Route::get('/all-students', [StudentController::class, 'students']);
Route::get('/edit-student/{id}', [StudentController::class, 'editStudent']);
Route::post('/update-student', [StudentController::class, 'updateStudent'])->name('student.update');
Route::get('/delete-student/{id}', [StudentController::class, 'deleteStudent']);


