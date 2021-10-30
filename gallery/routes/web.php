<?php

use App\Http\Livewire\GalleryCategoryView;
use App\Http\Livewire\GalleryDetails;
use App\Http\Livewire\GalleryHome;
use App\Http\Livewire\ImageGalleries;
use App\Http\Livewire\VideoGalleries;
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

Route::get('/', GalleryHome::class)->name('gallery.home');
Route::get('/videos', VideoGalleries::class)->name('gallery.videos');
Route::get('/images', ImageGalleries::class)->name('gallery.images');
Route::get('/category/{slug}', GalleryCategoryView::class)->name('gallery.category');
Route::get('/gallery/{slug}', GalleryDetails::class)->name('gallery');