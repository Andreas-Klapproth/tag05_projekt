<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Routing mit Named Routes
//  !!! Wichtig die Reihenfolge der Routen die dynamischen müssen an das Ende
//  !!! Ansonsten werden die dynamischen Routen aufgerufen mit den falschen Parametern
//  !!! Ergebnis 404-Fehler
//        Route::get('/courses/create'
//        Route::get('/courses/{course}' => wenn der vor der '/courses/create' steht, würde create als Parameter übergeben werden
//                                          Diese ID = create gibt es nicht deswegen 404                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       it Named Routes
Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// --- KURS ERSTELLEN (CREATION FLOW) ---
// 1. Formular anzeigen
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
// 2. Kurs in DB speichern
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
// 3. Bestätigungsseite NACH dem Erstellen
Route::get('/courses/{course}/created', [CourseController::class, 'created'])->name('courses.created');

// --- KURS ANZEIGEN ---
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');

// --- KURS BEITRETEN (JOIN FLOW) ---
// 1. Formular / Code-Eingabe zum Beitreten anzeigen
Route::get('/courses/join', [CourseController::class, 'join'])->name('courses.join');
// 2. Vorschau / Bestätigung VOR dem Beitreten (optional, z. B. "Kurs gefunden: Laravel 101. Beitreten?")
Route::get('/courses/{course}/confirm-join', [CourseController::class, 'confirmJoin'])->name('courses.confirm-join');
// 3. Beitritt verarbeiten / Speichern
Route::post('/courses/{course}/join', [CourseController::class, 'processJoin'])->name('courses.process-join');
// 4. Bestätigungsseite NACH dem Beitreten
Route::get('/courses/{course}/joined', [CourseController::class, 'joined'])->name('courses.joined');
