<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\blogsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blogs_listing',[blogsController::class,'blogsList']);
Route::get('/add_blogs',[blogsController::class,'addBlogs'])->name('add_blogs');
Route::post('/add_blog_data',[blogsController::class,'addBlogData'])->name('addBlogData');
Route::get('/filter-blogs', [blogsController::class, 'filterBlogs'])->name('filter_blogs');