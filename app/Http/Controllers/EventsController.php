<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Inertia\Inertia;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::Render('Events', [
            // 'events' => Event::all()
            'events' => Event::query()
                ->when($request->input('searchTitle'), function($query, $searchTitle) {
                    $query->where('title', 'like', "%{$searchTitle}%");
                })
                ->when($request->input('searchCity'), function($query, $searchCity) {
                    $query->where('city', 'like', "%{$searchCity}%");
                })
                ->limit(20)
                ->get(),

            'filters' => $request->only([
                'searchCity',
                'searchTitle'
            ])
        ]);
    }

    public function create()
    {
        return Inertia::render('Events/CreateEvent');
    }

    // Stores newly created events to db
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'photo_url' => ['nullable', 'image'],
            'start_date' => ['required'],
            'start_time' => ['required'],
            'building_number' => ['nullable'],
            'building_street_name' => ['nullable'],
            'building_name' => ['nullable'],
            'postal_code' => ['nullable'],
            'city' => ['nullable'],
            'county' => ['nullable'],
            'country' => ['nullable'],
            'phone' => ['nullable'],
            'is_online' => [],
        ]);

        Event::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'photo_url' => $request->file('photo_url') ? $request->file('photo_url')->store('images', 'public') : null,
            'start_date' => $request->input('start_date'),
            'start_time' => $request->input('start_time'),
            'building_number' => $request->input('building_number'),
            'building_street_name' => $request->input('building_street_name'),
            'building_name' => $request->input('building_name'),
            'postal_code' => $request->input('postal_code'),
            'city' => $request->input('city'),
            'county' => $request->input('county'),
            'country' => $request->input('country'),
            'phone' => $request->input('phone'),
            'is_online' => $request->input('is_online'),
        ]);
        
        return redirect('/events');
    }

    public function edit(Event $event)
    {
        // edit the events
        return Inertia::render('Events/EditEvent', [
            'event' => $event
        ]);
    }

    public function update(Event $event, Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'photo_url' => ['nullable', 'image'],
            'start_date' => ['required'],
            'start_time' => ['required'],
            'building_number' => ['nullable'],
            'building_street_name' => ['nullable'],
            'building_name' => ['nullable'],
            'postal_code' => ['nullable'],
            'city' => ['nullable'],
            'county' => ['nullable'],
            'country' => ['nullable'],
            'phone' => ['nullable'],
            'is_online' => [],
        ]);

        $event->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'photo_url' => $request->file('photo_url') ? $request->file('photo_url')->store('images', 'public') : $event->photo_url,
            'start_date' => $request->input('start_date'),
            'start_time' => $request->input('start_time'),
            'building_number' => $request->input('building_number'),
            'building_street_name' => $request->input('building_street_name'),
            'building_name' => $request->input('building_name'),
            'postal_code' => $request->input('postal_code'),
            'city' => $request->input('city'),
            'county' => $request->input('county'),
            'country' => $request->input('country'),
            'phone' => $request->input('phone'),
            'is_online' => $request->input('is_online'),
        ]);
        
        return redirect('/dashboard');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect('/dashboard');
    }
}
