<?php

use App\Http\Livewire\BlogCategoryLists;
use App\Http\Livewire\BlogHome;
use App\Http\Livewire\BlogPostDetails;
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

Route::get('/', BlogHome::class);

Route::get('/category/{slug}', BlogCategoryLists::class)->name('category');

Route::get('/post/{slug}', BlogPostDetails::class)->name(('post-details'));