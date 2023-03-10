<?php

use App\Http\Controllers\AdminController;

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name("accueil");
//route pour l'affichage
Route::get('/admin', [AdminController::class, 'index'])->name("admin");

//route pour la création

Route::get('/admin/create', [AdminController::class, 'create'])->name("admin.create");
Route::post('/admin/create', [AdminController::class, 'store'])->name("admin.store");

//route pour la suppression
Route::delete('/admin/{bien}', [AdminController::class, 'delete'])->name("admin.delete");

//route pour l'édition
Route::get('/admin/{bien}', [AdminController::class, 'edit'])->name("admin.edit");
Route::put('/admin/{bien}', [AdminController::class, 'update'])->name("admin.update");
