<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Livewire\Tool;
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

Route::get('', [PostController::class, 'index'])
    ->name('post.index');
Route::get('/post/{post:slug}', [PostController::class, 'show'])
    ->name('post.show');

Route::get('/tool', Tool::class);


// Route::get('/{page:slug}', [PageController::class, 'show'])
//     ->name('page.show')
//     ->where('page:slug', '^((?!admin).)*$');
