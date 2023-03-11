<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsagerController;
use App\Http\Controllers\AdminTicketController;
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
Route::get('/admin/tickets', [AdminTicketController::class, 'afficher'])->name("admin.tickets");

//route pour la création

Route::get('/admin/create', [AdminController::class, 'create'])->name("admin.create");
Route::post('/admin/create', [AdminController::class, 'store'])->name("admin.store");

//route pour la suppression
Route::delete('/admin/{bien}', [AdminController::class, 'delete'])->name("admin.delete");

//route pour l'édition
Route::get('/admin/{bien}', [AdminController::class, 'edit'])->name("admin.edit");
Route::put('/admin/{bien}', [AdminController::class, 'update'])->name("admin.update");
// Route::put('/admin/status', [AdminTicketController::class, 'updateStatus'])->name("admin.updateStatus");

// pour les tickets
Route::get('/usager', [UsagerController::class, 'index'])->name("usager");
Route::get('/usager/create', [UsagerController::class, 'create'])->name('usager.create');
Route::post('/usager/create', [UsagerController::class, 'store'])->name('usager.store');
Route::put('/tickets/{ticket}', [AdminTicketController::class, 'update'])->name('tickets.update');
Route::put('/tickets/{ticket}/close', [UsagerController::class, 'close'])->name('usager.tickets.close');
