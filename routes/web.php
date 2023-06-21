<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;

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
//     return view('welcome');
// });
Route::get('/', function () {
    return redirect('home');
});

// Route::get('/home', function () {
//     return view('home');
// })->name('home');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'viewLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'viewRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Route::get('/dashboard/index', [DashboardController::class, 'viewHome'])->name('viewHome');

Route::prefix('category')->group(function() {
    Route::get('/', [CategoryController::class, 'index'])->name('category.list');
    Route::get('/create', [CategoryController::class, 'viewCreate'])->name('category.create');
    Route::post('/create', [CategoryController::class, 'create']);
    Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    Route::get('/edit/{id}', [CategoryController::class, 'viewEdit'])->name('category.edit');
    Route::post('/edit/{id}', [CategoryController::class, 'update']);
});
