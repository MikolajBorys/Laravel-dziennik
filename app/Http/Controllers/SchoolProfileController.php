<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolProfile;

class SchoolProfileController extends Controller
{
    public function edit()
    {
        $profile = SchoolProfile::where('user_id', auth()->id())->first();

        return view('settings.school', [
            'profile' => $profile
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate(

            [
                'school_name' => 'required|string',
                'street' => 'required|string',
                'street_number' => 'required|string',
                'postal_code' => ['required','regex:/^\d{2}-\d{3}$/'],
                'city' => 'required|string',
                'country' => 'required|string',
                'class_name' => 'required|string',

                'supervisor_name' => 'required|string',
                'supervisor_phone' => ['nullable','regex:/^[0-9+\-\s]+$/'],
                'supervisor_email' => 'nullable|email',
            ],

            [
                'school_name.required' => 'Podaj nazwę szkoły.',

                'street.required' => 'Podaj nazwę ulicy.',
                'street_number.required' => 'Podaj numer budynku.',

                'postal_code.required' => 'Podaj kod pocztowy.',
                'postal_code.regex' => 'Kod pocztowy musi mieć format 00-000.',

                'city.required' => 'Podaj miasto.',
                'country.required' => 'Podaj kraj.',
                'class_name.required' => 'Podaj klasę.',

                'supervisor_name.required' => 'Podaj imię i nazwisko opiekuna.',

                'supervisor_phone.regex' => 'Telefon może zawierać tylko cyfry, spacje, + lub -.',

                'supervisor_email.email' => 'Podaj poprawny adres e-mail.',
            ]

        );

        SchoolProfile::updateOrCreate(
            ['user_id' => auth()->id()],
            array_merge($validated, [
                'user_id' => auth()->id()
            ])
        );

        return redirect()
            ->route('settings.school')
            ->with('success', 'Dane szkoły zostały zapisane.');
    }
}