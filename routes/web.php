<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Statische Seiten (Pages)
|--------------------------------------------------------------------------
*/
Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

/*
|--------------------------------------------------------------------------
| FEATURE Kurs-Routen (Courses)
|--------------------------------------------------------------------------
| HINWEIS ZUR REIHENFOLGE:
| 1. Feste URLs (z.B. /courses, /courses/create, /courses/join) MÜSSEN ZUERST stehen.
| 2. URLs mit dynamischen Parametern (z.B. /courses/{course}) kommen DANACH,
|    da sonst z.B. "create" oder "join" als ID interpretiert wird -> 404 Fehler!
|
| Group:
| - controller(CourseController::class) : Controllername muss nur einmal geschrieben werden
| - 'courses' wird vor jede route gehangen :   Route::get('/create',...) wird zu Route::get('courses/create',...)
| - as('courses.') : setzt automatisch courses. vor die named routen  name('index') wird zu name('courses.index')
*/
Route::controller(CourseController::class)->prefix('courses')->as('courses.')->group(function () {

    // 1. FESTE ROUTEN (Ohne Parameter)
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');

    Route::get('/create', 'create')->name('create');
    Route::get('/join', 'join')->name('join');


    // 2. DYNAMISCHE ROUTEN (Mit {course} Parameter)
    Route::get('/{course}', 'show')->name('show');
    Route::get('/{course}/created', 'created')->name('created');

    // Join Flow (Parameter-gestützt)
    Route::get('/{course}/confirm-join', 'confirmJoin')->name('confirm-join');
    Route::post('/{course}/join', 'processJoin')->name('process-join');
    Route::get('/{course}/joined', 'joined')->name('joined');

});
