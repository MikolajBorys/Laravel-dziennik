<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DailyEntry;

class DailyEntryController extends Controller
{

    public function index()
    {
        $entries = DailyEntry::where('user_id', auth()->id())
            ->orderBy('entry_date', 'desc')
            ->get();

        return view('entries.index', compact('entries'));
    }


    public function create()
    {
        return view('entries.create');
    }


    public function store(Request $request)
    {
    $validated = $request->validate([
        'entry_date' => 'required|date',
        'time_from'  => 'required',
        'time_to'    => 'required|after:time_from',
        'tasks'      => 'required',
        'notes'      => 'nullable'
    ]);

    // Sprawdzenie, czy istnieje wpis w tym dniu
    $exists = DailyEntry::where('user_id', auth()->id())
        ->where('entry_date', $validated['entry_date'])
        ->exists();

    if ($exists) {
        return redirect()
            ->back()
            ->withErrors(['entry_date' => 'Masz już wpis w tym dniu.']);
    }

    DailyEntry::create(array_merge($validated, [
        'user_id' => auth()->id()
    ]));

    return redirect()
        ->route('entries.index')
        ->with('success', 'Wpis dodany.');
    }


    public function edit($id)
    {
        $entry = DailyEntry::where('user_id', auth()->id())
        ->findOrFail($id);

        return view('entries.edit', compact('entry'));
    }


    public function update(Request $request, $id)
    {
        $entry = DailyEntry::where('user_id', auth()->id())
            ->findOrFail($id);

        $validated = $request->validate([
            'entry_date' => 'required|date',
            'time_from' => 'required',
            'time_to' => 'required|after:time_from',
            'tasks' => 'required',
            'notes' => 'nullable'
        ]);

        $entry->update($validated);

        return redirect()
            ->route('entries.index')
            ->with('success', 'Wpis zaktualizowany.');
    }


    public function destroy($id)
    {
        $entry = DailyEntry::where('user_id', auth()->id())
            ->findOrFail($id);

        $entry->delete();

        return redirect()
            ->route('entries.index')
            ->with('success', 'Wpis usunięty.');
    }
}