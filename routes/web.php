<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PanelController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'catalogue');
Route::view('/admin/create', 'admin/create');
Route::view('/admin', 'admin/index');

Route::get('/', [PageController::class, 'show']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [PanelController::class, 'index'])->name('admin.index');
Route::get('/admin/create', [PanelController::class, 'create'])->name('admin.create');
Route::get('/admin/{post}', [PanelController::class, 'show'])->name('admin.show');
Route::get('/admin/{post}/edit', [PanelController::class, 'edit'])->name('admin.edit');

Route::post('/admin', [PanelController::class, 'store'])->name('admin.store');

Route::patch('/admin/{post}', [PanelController::class, 'update'])->name('admin.update');

Route::delete('/admin/{post}', [PanelController::class, 'destroy'])->name('admin.delete');





Auth::routes();

