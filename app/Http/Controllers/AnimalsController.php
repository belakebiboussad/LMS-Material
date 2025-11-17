<?php

namespace App\Http\Controllers;

use App\Enums\TagStatus;
use App\Models\Farm;
use App\Models\Animal;
use App\Models\AnimalType;
use App\Models\Tag;
use App\Enums\TagType;
use App\Models\Breed;
use Illuminate\Http\Request;
use Illuminate\JsonSchema\Types\Type;

class AnimalsController extends Controller
{
     public function index()
    {
        $animals = Animal::all();
        return view('assets.animals.index', compact('animals'));
    }
     public function create()
    {
        $animalTyps = AnimalType::pluck('name', 'id');
        $farms = (auth()->user()->hasRole('farmer')) ?  auth()->user()->farms()->pluck('name', 'id') : auth()->user()->guardedFarm()->pluck('name', 'id');
        return view('assets.animals.create', compact('farms'));
    }
    public function edit(Animal $animal)
    {
        $animalTyps = AnimalType::pluck('name', 'id');
        $farms = auth()->user()->farms()->pluck('name', 'id');
        $animalTypes = AnimalType::all()->pluck('name', 'id');
        return view('assets.animals.edit', compact('animal','animalTypes', 'farms'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'eid' => 'nullable|exists:tags,id',
            'animalType_id' => 'required|exists:animal_types,id',
            'weight' => 'nullable|numeric',
            'dob' => 'nullable|date',
            'sexe' => 'required','in:male,female',
            'breed_id' => 'nullable|exists:breeds,id',
            'is_seek' => 'boolean',
            'farm_id' => 'required|exists:farms,id',
        ]);
        if(isset($request->eid))
            Tag::findOrFail($request->eid)->update(['status'=>TagStatus::ACTIVE]);
        Animal::create($validated);
        return redirect()->route('animals.index')->with('success', __('animal.created'));
    }

    public  function update(Animal $animal) 
    {

    }

    public function destroy( Animal $animal)
    {
        $animal->delete();
        return redirect()->route('animals.index')->with('success', __('animal.deleated'));
    } 

    public function getBreedsAndRFID($animalTypeId)
    {
        $breeds = Breed::where('animal_type_id', $animalTypeId)->get()->pluck('name', 'id'); 
        $rfidTags = Tag::where('owner_id', auth()->id())->where('type', TagType::BIRTH)->where('animalType_id',$animalTypeId)->get()->pluck('eid', 'id');
        return response()->json([ 'breed'=> $breeds, 'rfids'=> $rfidTags ], 200);
    }
}
