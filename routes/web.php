<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DepartamentController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\ProvinceController;
use App\Http\Controllers\Backend\SubCategoryController;
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
Route::get('subcategories/all/{category_id}', [SubCategoryController::class, 'all'])->name('admin.subcategories.all');
Route::resource('/subcategories', SubCategoryController::class)->names('admin.subcategories');
// RUTAS PARA DEPARTAMENTOS
Route::get('departaments/all/{departament_id}', [DepartamentController::class, 'all'])->name('admin.departaments.all');
Route::resource('/departaments', DepartamentController::class)->names('admin.departaments');
// RUTAS PARA PROVINCIAS
Route::resource('/provinces', ProvinceController::class)->names('admin.provinces');
// RUTAS PARA PUBLICACIONES
Route::resource('/posts', PostController::class)->names('admin.posts');