<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DailyEntry;
use Illuminate\Validation\Rule;

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
            'entry_date' => [
                'required',
                'date',
                Rule::unique('daily_entries')->where(function ($query) {
                    return $query->where('user_id', auth()->id());
                }),
            ],

            'time_from' => 'required|date_format:H:i',
            'time_to' => 'required|date_format:H:i|after:time_from',

            'tasks' => 'required|string',
            'notes' => 'nullable|string',
        ], [
            'entry_date.required' => 'Data wpisu jest wymagana.',
            'entry_date.unique' => 'Masz już wpis dla tego dnia.',

            'time_from.required' => 'Godzina rozpoczęcia jest wymagana.',
            'time_to.required' => 'Godzina zakończenia jest wymagana.',
            'time_to.after' => 'Godzina zakończenia musi być późniejsza niż rozpoczęcia.',

            'tasks.required' => 'Opis wykonywanych zadań jest wymagany.',
        ]);

        $validated['user_id'] = auth()->id();

        DailyEntry::create($validated);

        return redirect()
            ->route('entries.index')
            ->with('success', 'Wpis został dodany.');
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
            'entry_date' => [
                'required',
                'date',
                Rule::unique('daily_entries')
                    ->where(fn ($query) => $query->where('user_id', auth()->id()))
                    ->ignore($entry->id),
            ],

            'time_from' => 'required|date_format:H:i',
            'time_to' => 'required|date_format:H:i|after:time_from',

            'tasks' => 'required|string',
            'notes' => 'nullable|string',
        ], [
            'entry_date.required' => 'Data wpisu jest wymagana.',
            'entry_date.unique' => 'Masz już wpis dla tego dnia.',

            'time_from.required' => 'Godzina rozpoczęcia jest wymagana.',
            'time_to.required' => 'Godzina zakończenia jest wymagana.',
            'time_to.after' => 'Godzina zakończenia musi być późniejsza niż rozpoczęcia.',

            'tasks.required' => 'Opis wykonywanych zadań jest wymagany.',
        ]);

        $entry->update($validated);

        return redirect()
            ->route('entries.index')
            ->with('success', 'Wpis został zaktualizowany.');
    }

    public function destroy($id)
    {
        $entry = DailyEntry::where('user_id', auth()->id())
            ->findOrFail($id);

        $entry->delete();

        return redirect()
            ->route('entries.index')
            ->with('success', 'Wpis został usunięty.');
    }
}