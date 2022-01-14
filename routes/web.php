<?php

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
            'photo_url' => $event->photo_url,
            'description' => $event->description,
            'start_date' => $event->start_date,
            'start_time' => $event->start_time,
        ])
    ]);
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/events', function () {
    return Inertia::render('Events', [
        'events' => Event::all()
    ]);

    // return Inertia::render('Events', [
    //     'events' => Event::query()
    //         ->all()
    //         ->when(Request::input('search'), function ($query, $search) {
    //             $query->where('city', 'like', '%' . $search . '%');
    //         })
    // ]);
})->name('events');

Route::middleware(['auth:sanctum', 'verified'])->post('/events', function () {
    // validate the request, also data get returned to assign to attributes
    $attrs = Request::validate([
        'title' => 'required',
        'description' => 'required',
        'photo_url' => 'required',
        'start_date' => 'required',
        'start_time' => 'required',
        'building_number' => 'required',
        'building_street_name' => 'required',
        'building_name'  => 'required',
        'postal_code'  => 'required',
        'city' => 'required',
        'county'  => 'required',
        'country'  => 'required',
        'phone' => 'required',
        'is_online'  => 'required',
    ]);
    // create event is validation has uscceeded
    Event::create($attrs);
    // after ajax requext from inertia, return redirect
    return redirect('/events');
});


// pages
Route::middleware(['auth:sanctum', 'verified'])->get('/events/create', function () {
    return Inertia::render('Events/CreateEvent');
})->name('create');
