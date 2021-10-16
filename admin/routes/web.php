<?php

use App\Http\Livewire\AddPost;
use App\Http\Livewire\AdminDashboard;
use App\Http\Livewire\EditPost;
use App\Http\Livewire\PostCategories;
use App\Http\Livewire\PostCategoriesEdit;
use App\Http\Livewire\ViewPosts;
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
    return redirect()->route('login');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    
    Route::get('dashboard', AdminDashboard::class)->name('dashboard');
    Route::get('posts/add', AddPost::class)->name('post.add');
    Route::get('posts/edit/{unique_id}', EditPost::class)->name('post.edit');
    Route::get('posts/view', ViewPosts::class)->name('post.view');
    Route::get('posts/categories', PostCategories::class)->name('post.categories');
    Route::get('posts/categories/edit/{unique_id}', PostCategoriesEdit::class)->name('post.categories.edit');
});
