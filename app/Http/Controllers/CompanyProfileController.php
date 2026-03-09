<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyProfile;

class CompanyProfileController extends Controller
{
    public function edit()
    {
        $profile = CompanyProfile::where('user_id', auth()->id())->first();

        return view('settings.company', [
            'profile' => $profile
        ]);
    }

    public function update(Request $request)
    {

        $validated = $request->validate(

            [
                'company_name' => 'required|string',
                'nip' => ['required','regex:/^\d{10}$/'],

                'street' => 'required|string',
                'street_number' => 'required|string',
                'postal_code' => ['required','regex:/^\d{2}-\d{3}$/'],
                'city' => 'required|string',
                'country' => 'required|string',

                'supervisor_name' => 'required|string',
                'supervisor_role' => 'required|string',
                'supervisor_phone' => ['nullable','regex:/^[0-9+\-\s]+$/'],
                'supervisor_email' => 'nullable|email',
            ],

            [
                'company_name.required' => 'Podaj nazwę firmy.',

                'nip.required' => 'Podaj NIP.',
                'nip.regex' => 'NIP musi zawierać dokładnie 10 cyfr.',

                'street.required' => 'Podaj ulicę.',
                'street_number.required' => 'Podaj numer budynku.',

                'postal_code.required' => 'Podaj kod pocztowy.',
                'postal_code.regex' => 'Kod pocztowy musi mieć format 00-000.',

                'city.required' => 'Podaj miasto.',
                'country.required' => 'Podaj kraj.',

                'supervisor_name.required' => 'Podaj imię i nazwisko opiekuna.',
                'supervisor_role.required' => 'Podaj stanowisko opiekuna.',

                'supervisor_phone.regex' => 'Telefon może zawierać tylko cyfry, spacje, + lub -.',
                'supervisor_email.email' => 'Podaj poprawny adres e-mail.',
            ]

        );

        $profile = CompanyProfile::updateOrCreate(
            ['user_id' => auth()->id()],
            array_merge($validated, [
                'user_id' => auth()->id()
            ])
        );
        
        return redirect()
            ->route('settings.company')
            ->with('success', 'Dane firmy zostały zapisane.');
    }
}