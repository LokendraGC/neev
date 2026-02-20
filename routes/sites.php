<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\TeamController;

Route::get('/', [FrontController::class, 'index'])->name('home');


// for all dynamic post and pages
Route::match(['get', 'post'], '{slug}', [PostController::class, 'index'])->name('frontend.post.index');


// for all dynamic team
Route::get('team/{slug}', [TeamController::class, 'index'])->name('frontend.team.index');
