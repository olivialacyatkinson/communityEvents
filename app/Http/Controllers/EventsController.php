<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
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

    public function show(Event $event)
    {
        return Inertia::render('EventInformation', [
            'event' => $event
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
            'photo' => ['required', 'image'],
            'start_date_time' => ['required'],
            'building_number' => ['nullable'],
            'street' => ['nullable'],
            'building_name' => ['nullable'],
            'postal_code' => ['nullable'],
            'city' => ['nullable'],
            'county' => ['nullable'],
            'country' => ['nullable'],
            'phone' => ['nullable'],
            'email' => ['required'],
            'is_online' => [],
        ]);

        $request->file('photo')->store('images', 'public');

        Event::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'photo' =>  $request->file('photo')->hashName(),
            'start_date_time' => $request->input('start_date_time'),
            'building_number' => $request->input('building_number'),
            'street' => $request->input('street'),
            'building_name' => $request->input('building_name'),
            'postal_code' => $request->input('postal_code'),
            'city' => $request->input('city'),
            'county' => $request->input('county'),
            'country' => $request->input('country'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'is_online' => $request->input('is_online'),
            'user_id' => $request->user()->id,
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
            'photo' => ['required', 'image'],
            'start_date_time' => ['required'],
            'building_number' => ['nullable'],
            'street' => ['nullable'],
            'building_name' => ['nullable'],
            'postal_code' => ['nullable'],
            'city' => ['nullable'],
            'county' => ['nullable'],
            'country' => ['nullable'],
            'phone' => ['nullable'],
            'email' => ['required'],
            'is_online' => [],
        ]);

        $event->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'photo' =>  $request->file('photo')->hashName(),
            'start_date_time' => $request->input('start_date_time'),
            'building_number' => $request->input('building_number'),
            'street' => $request->input('street'),
            'building_name' => $request->input('building_name'),
            'postal_code' => $request->input('postal_code'),
            'city' => $request->input('city'),
            'county' => $request->input('county'),
            'country' => $request->input('country'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'is_online' => $request->input('is_online'),
            'user_id' => $request->user()->id,
        ]);
        
        return redirect('/dashboard');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect('/dashboard');
    }
}
