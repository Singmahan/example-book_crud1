<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
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

// Route::get('dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// Route::get('create-post', function () {
//     return view('create-post');
// })->name('create-post');

// Route::get('manage-post', function () {
//     return view('manage-post');
// })->name('manage-post');

// Route::get('authors', function () {
//     return view('authors');
// })->name('authors');

// Route::get('categories', function () {
//     return view('categories');
// })->name('categories');

// dashboard
Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::get('manage-category', [CategoryController::class, 'index'])->name('manage-category');
Route::post('store/category', [CategoryController::class, 'store'])->name('store_category');
Route::get('edit/category/{id}', [CategoryController::class, 'edit'])->name('edit_category');
Route::post('update/category/{id}', [CategoryController::class, 'update'])->name('update_category');
Route::get('delete/category/{id}', [CategoryController::class, 'delete'])->name('delete_category');

// Author
Route::get('manage-author', [AuthorController::class, 'index'])->name('manage-author');
Route::post('store/author', [AuthorController::class, 'store'])->name('store_author');
Route::get('edit/author/{id}', [AuthorController::class, 'edit'])->name('edit_author');
Route::post('update/author/{id}', [AuthorController::class, 'update'])->name('update_author');
Route::get('delete/author/{id}', [AuthorController::class, 'delete'])->name('delete_author');

// Post
Route::get('manage-post', [PostController::class, 'show'])->name('manage-post');
Route::get('create-post', [PostController::class, 'index'])->name('create_post');
Route::post('store/post', [PostController::class, 'store'])->name('store_post');
Route::get('edit/post/{id}', [PostController::class, 'edit'])->name('edit_post');
Route::post('update/post/{id}', [PostController::class, 'update'])->name('update_post');
// trash_post
Route::get('trash/post/{id}', [PostController::class, 'trash'])->name('trash_post');
Route::get('view-trash/post', [PostController::class, 'view_trashed_post'])->name('view_trashed_post');
Route::get('restore/post/{id}', [PostController::class, 'restore'])->name('restore_post');
Route::get('edit-trashed-post/post/{id}', [PostController::class, 'edit_trashed_post'])->name('edit_trashed_post');
Route::get('delete/post/{id}', [PostController::class, 'delete'])->name('delete_post');
Route::post('update/trash/post/{id}', [PostController::class, 'update_trashed_post'])->name('update_trashed_post');

