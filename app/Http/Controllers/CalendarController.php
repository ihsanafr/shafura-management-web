<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event; // Ensure you have an Event model
use Illuminate\Support\Facades\Gate;

class CalendarController extends Controller
{
    // Fetch all events
    public function index()
    {
        $events = Event::all();
        return view('pages.agenda.index', compact('events'));
    }

    // Store a new event
    public function store(Request $request)
    {
        $event = Event::create([
            'title' => $request->title,
            'start' => $request->start,
            'type' => $request->type,
            'description' => $request->description
        ]);

        return response()->json($event);
    }

    // Update an existing event
    public function update(Request $request)
    {
        $event = Event::findOrFail($request->id);
        $event->update([
            'title' => $request->title,
            'start' => $request->start,
            'type' => $request->type,
            'description' => $request->description
        ]);

        return response()->json($event);
    }

    // Delete an event
    public function destroy(Request $request)
    {
        $event = Event::findOrFail($request->id);
        $event->delete();

        return response()->json(['success' => true]);
    }
}

