<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\RemunerationController;
use App\Http\Controllers\RemunerationCategoryController;
use App\Http\Controllers\RemunerationRateController;
use App\Http\Controllers\DisciplineController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

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

Route::resource('user', UserController::class);

Route::resource('role', RoleController::class);

Route::resource('exam', ExamController::class);

Route::resource('remuneration', RemunerationController::class);

Route::resource('remuneration-category', RemunerationCategoryController::class);

Route::resource('remuneration-rate', RemunerationRateController::class);

Route::resource('discipline', DisciplineController::class);

Route::resource('designation', DesignationController::class);

Route::resource('year', YearController::class);

Route::resource('term', TermController::class);

Route::resource('session', SessionController::class);

Auth::routes();

Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

Route::get('setting', [SettingController::class, 'setting'])->name('setting');
Route::post('password/change', [SettingController::class, 'passwordUpdate'])->name('password.update');


Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/get-course', [\App\Http\Controllers\DropdownController::class, 'course'])->name('get.course');
Route::get('/get-teacher', [\App\Http\Controllers\DropdownController::class, 'teacher'])->name('get.teacher');
Route::get('/get-rate/{id}', [\App\Http\Controllers\DropdownController::class, 'rate'])->name('get.rate');


Route::get('/my-remuneration', [\App\Http\Controllers\RemunerationController::class, 'myRem'])->name('myream.index');
Route::post('/my-remuneration/result', [\App\Http\Controllers\RemunerationController::class, 'myRemResult'])->name('myream.result');

//search remunaration
Route::post('/remuneration/filter', [\App\Http\Controllers\RemunerationController::class, 'searchResult'])->name('remuneration.search');

Route::get('/remuneration/generate/pdf', [\App\Http\Controllers\RemunerationController::class, 'generatePdf'])->name('remuneration.pdf');

Route::get('/remuneration/list/new', [\App\Http\Controllers\RemunerationController::class, 'newList'])->name('remuneration.newlist');
Route::post('/remuneration/list/approve', [\App\Http\Controllers\RemunerationController::class, 'approve'])->name('remuneration.approve');

// notifications
Route::get('notifications', [\App\Http\Controllers\NotificationController::class, 'index'])->name('notification.index');
Route::get('notifications/{id}', [\App\Http\Controllers\NotificationController::class, 'show'])->name('notification.show');