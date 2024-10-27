<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinces = Province::with('cities')->get(); // Eager load cities
        $districts = District::all(); // Fetch all districts
        $cities = City::all();
        $religions = Religion::all();

        return view('registration', compact('provinces', 'cities', 'districts', 'religions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'current_address' => 'required|string',
            'district_id' => 'required|exists:districts,id',
            'city_id' => 'required|exists:cities,id',
            'province_id' => 'required|exists:provinces,id',
            'phone_number' => 'nullable|string|max:15',
            'mobile_number' => 'nullable|string|max:15',
            'email' => 'required|email|unique:registrations,email',
            'nationality' => 'required|string',
            'date_of_birth' => 'required|date',
            'place_of_birth_city' => 'required|string',
            'place_of_birth_province_id' => 'required|exists:provinces,id',
            'gender' => 'required|in:Male,Female',
            'marital_status' => 'required|in:Single,Married',
            'religion_id' => 'required|exists:religions,id',
        ]);

        Registration::create($request->all());

        return redirect()->route('dashboard')->with('success', 'Registration successful!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Registration $registration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registration $registration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registration $registration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registration $registration)
    {
        //
    }
}
