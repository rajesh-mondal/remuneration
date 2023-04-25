<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\RemunerationController;
use App\Http\Controllers\RemunerationCategoryController;
use App\Http\Controllers\RemunerationRateController;
use App\Http\Controllers\DisciplineController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', [HomeController::class, 'index'])->name('dashboard');

Route::resource('course', CourseController::class);

Route::resource('teacher', TeacherController::class);

Route::resource('exam', ExamController::class);

Route::resource('remuneration', RemunerationController::class);

Route::resource('remuneration-category', RemunerationCategoryController::class);

Route::resource('remuneration-rate', RemunerationRateController::class);

Route::resource('discipline', DisciplineController::class);

Route::resource('designation', DesignationController::class);

Route::resource('year', YearController::class);

Route::resource('term', TermController::class);

Route::resource('session', SessionController::class);

Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
