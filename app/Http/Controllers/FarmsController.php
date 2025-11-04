<?php

namespace App\Http\Controllers;

use App\Http\Requests\FarmRequest;
use App\Http\Requests\FarmUpdateRequest;
use App\Models\AnimalType;
use App\Models\Farm;
use App\Models\User;
use App\Models\Wilaya;
use Illuminate\Http\Request;

class FarmsController extends Controller
{
    public function index()
    {
        $farms = Farm::with(['owner', 'wilaya', 'animalTypes'])->get();
        return view('assets.farms.index', compact('farms'));
    }
    public function create()
    {
        $wilayas = Wilaya::all()->pluck('name', 'id');
        $animalTypes = AnimalType::all()->pluck('name', 'id');
        return view('assets.farms.create', compact('wilayas', 'animalTypes'));
    }
    public function edit(Farm $farm)
    {
        $wilayas = Wilaya::all()->pluck('name', 'id');
        $animalTypes = AnimalType::all()->pluck('name', 'id');
        return view('assets.farms.edit', compact('farm','wilayas', 'animalTypes'));
    }
    public function store(FarmRequest $request)
    {
        $validated = $request->validated();

        $farm = Farm::create($request->only([
            'recordNbr',
            'name',
            'creationDt',
            'address',
            'phone',
            'area',
            'x_lon',
            'y_lat',
            'wilaya_id',
            'owner_id'
        ]));

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
    public function update(FarmUpdateRequest $request, Farm $farm)
    {
        $validated = $request->validated();

        $farm->update($request->only([
            'recordNbr',
            'name',
            'creationDt',
            'address',
            'phone',
            'area',
            'x_lon',
            'y_lat',
            'wilaya_id',
            'owner_id'
        ]));

        $farm->animalTypes()->detach();
        if (isset($validated['animal_types'])) {
            foreach ($validated['animal_types'] as $typeId) {
                $farm->animalTypes()->attach($typeId);
            }
        }

        return redirect()->route('farms.index')->with('success', 'Farm updated successfully.');
    }
    public function destroy(Farm $farm)
    {
        $farm->delete();
        return redirect()->route('farms.index')->with('success', 'Farm deleted successfully.');
    }
}
