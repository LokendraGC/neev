<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\StoryController;
use App\Http\Controllers\Frontend\CompanyController;
use App\Http\Controllers\Frontend\SectorController;

Route::get('/', [FrontController::class, 'index'])->name('home');


// for all dynamic post and pages
Route::match(['get', 'post'], '{slug}', [PostController::class, 'index'])->name('frontend.post.index');


// for all dynamic story
Route::get('story/{slug}', [StoryController::class, 'index'])->name('frontend.story.index');
Route::get('company/{slug}', [CompanyController::class, 'index'])->name('frontend.company.index');


// category route
Route::get('sector/{slug}', [SectorController::class, 'index'])->name('frontend.category.sector.index');