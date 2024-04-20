<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admins', [AdminController::class, 'index']);
Route::post('/admins/store', [AdminController::class, 'store']);
Route::put('/admins/update', [AdminController::class, 'update']);
Route::get('/admins/search', [AdminController::class, 'show']);
Route::delete('/admins/delet/{id}', [AdminController::class, 'destroy']);

Route::get('/courses', [CourseController::class, 'index']);
Route::post('/courses/store', [CourseController::class, 'store']);
Route::put('/courses/update', [CourseController::class, 'update']);
Route::get('/courses/search', [CourseController::class, 'show']);
Route::delete('/courses/delet/{id}', [CourseController::class, 'destroy']);
Route::get('/total_courses', [CourseController::class, 'TotalCourses']);

Route::get('/students', [StudentController::class, 'index']);
Route::post('/students/store', [StudentController::class, 'store']);
Route::put('/students/update', [StudentController::class, 'update']);
Route::get('/students/search', [StudentController::class, 'show']);
Route::delete('/students/delet/{id}', [StudentController::class, 'destroy']);
Route::get('/total_students', [StudentController::class, 'TotalStudents']);
