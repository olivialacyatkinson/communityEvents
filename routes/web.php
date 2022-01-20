<?php

use App\Http\Controllers\EventsController;
use App\Http\Controllers\GoogleController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Event;
use Illuminate\Support\Facades\Request;

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
    return Inertia::render('Welcome', [
        // props
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

// nav pages
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard', [
        'events' => Event::paginate(12)->through(fn($event) => [
            //passing in only selective data
            'id' => $event->id,
            'title' => $event->title,
            'photo' => $event->photo,
            'description' => $event->description,
            'start_date_time' => $event->start_date_time,
            'building_number' => $event->building_number,
            'street' => $event->street,
            'postal_code' => $event->postal_code,
            'city' => $event->city,
        ])
    ]);
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/events', [EventsController::class, 'index'])->name('events');
Route::middleware(['auth:sanctum', 'verified'])->post('/events', [EventsController::class, 'store'])->name('events.store');
Route::middleware(['auth:sanctum', 'verified'])->get('/events/create', [EventsController::class, 'create'] )->name('events.create');
Route::middleware(['auth:sanctum', 'verified'])->get('/events/{event}/edit', [EventsController::class, 'edit'] )->name('events.edit');
Route::middleware(['auth:sanctum', 'verified'])->put('/events/{event}', [EventsController::class, 'update'] )->name('events.update');
Route::middleware(['auth:sanctum', 'verified'])->get('/events/{event}', [EventsController::class, 'destroy'] )->name('events.destroy');
