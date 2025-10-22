<?php

namespace App\Http\Controllers;

use App\Models\AnimalType;
use App\Models\Farm;
use App\Models\User;
use App\Models\Wilaya;
use Illuminate\Http\Request;

class FarmsController extends Controller
{
    public function index()
    {
        return view('farms.index');
    }
    public function create()
    {
        $owners = User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['Eleveur', 'Gardien']);
        })->pluck('name','id');
        $wilayas = Wilaya::all()->pluck('name', 'id');
        $animalTypes = AnimalType::all()->pluck('name', 'id');
        return view('farms.create', compact('owners', 'wilayas', 'animalTypes'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'recordNbr' => 'required|string|max:10',
            'name' => 'required|string|max:255',
            'x_lon' => 'required|numeric',
            'y_lat' => 'required|numeric',
            'wilaya_id' => 'required|exists:wilayas,id',
            'owner_id' => 'required|exists:users,id',
            'animal_types' => 'array',
            'animal_types.*' => 'exists:animal_types,id',
        ]);

        $farm = Farm::create($validated);

        if (isset($validated['animal_types'])) {
            foreach ($validated['animal_types'] as $typeId) {
                $farm->animalTypes()->attach($typeId);
            }
        }

        return redirect()->route('farms.index')->with('success', 'Farm created successfully.');
    }
    public function show(Farm $farm)
    {
        return view('farms.show', compact('farm'));
    }
}
