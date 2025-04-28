<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function create()
    {
        return view('teachers.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',    // don't forget to validate time
            'location' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('event_images', 'public');
        }

        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'time' => $request->time,
            'location' => $request->location,
            'image' => $imagePath,
        ]);

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function deleteAll()
    {
        Event::truncate();
        return redirect()->route('events.index')->with('success', 'All events have been deleted.');
    }
}
