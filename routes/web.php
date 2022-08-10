<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});
// RUTAS PARA ADMINISTRACIÓN BACKEND
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
// RUTAS PARA CATEGORÍAS
Route::resource('/categories', CategoryController::class)->names('admin.categories');
// RUTAS PARA SUBCATEGORÍAS
Route::resource('/subcategories', SubCategoryController::class)->names('admin.subcategories');