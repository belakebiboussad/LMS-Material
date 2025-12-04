<?php

namespace App\Http\Controllers;

use App\Enums\TagStatus;
use App\Models\Animal;
use App\Models\AnimalType;
use App\Models\Tag;
use App\Enums\TagType;
use App\Models\Breed;
use App\Models\Farm;

use Illuminate\Http\Request;

class AnimalsController extends Controller
{
     public function index()
    {
        if(request()->ajax()) {
           return( request()->id ? Animal::where('farm_id', request()->id)->with('rfidTag')->get()->pluck('id', 'rfidTag.eid') : Animal::with('rfidTag')->get()->pluck('id', 'rfidTag.eid')); 
        }
         $animals = auth()->user()->hasRole('farmer') ? Animal::whereIn('farm_id', auth()->user()->farms->pluck('id'))->present()->with('rfidTag','animalType','breed','farm')->get() : Animal::whereIn('farm_id', auth()->user()->guardedFarm->pluck('id'))->with('rfidTag','animalType','breed','farm')->get();
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
        $tags = $animal->farm->owner->rfidTags()->where('animalType_id', $animal->animalType_id)->where('status', TagStatus::INACTIVE)->get()->pluck('eid', 'id');
        return view('assets.animals.edit', compact('animal','animalTypes', 'farms', 'tags'));
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
        $validated = request()->validate([
            'eid' => 'nullable|exists:tags,id',
            'animalType_id' => 'required|exists:animal_types,id',
            'weight' => 'nullable|numeric',
            'dob' => 'nullable|date',
            'sexe' => 'required','in:male,female',
            'breed_id' => 'nullable|exists:breeds,id',
            'is_seek' => 'boolean',
            'farm_id' => 'required|exists:farms,id',
        ]);
        if(isset(request()->eid) && request()->eid != $animal->rfidTag?->id) {
            if($animal->rfidTag) {
                Tag::findOrFail($animal->rfidTag->id)->update(['status'=>TagStatus::INACTIVE]);
            }
            Tag::findOrFail(request()->eid)->update(['status'=>TagStatus::ACTIVE]);    
        }
        $animal->update($validated);
        return redirect()->route('animals.index')->with('success', __('animal.updated'));
    }   
    public function destroy( Animal $animal)
    {
        $animal->delete();
        return redirect()->route('animals.index')->with('success', __('animal.deleated'));
    } 

    public function getBreedsAndRFID($animalTypeId)
    {
        $breeds = Breed::where('animal_type_id', $animalTypeId)->get()->pluck('name', 'id'); 
        $rfidTags = Tag::where('owner_id', auth()->id())->where('type', TagType::BIRTH)->where('animalType_id',$animalTypeId)->inactive()->get()->pluck('eid', 'id');
        return response()->json([ 'breed'=> $breeds, 'rfids'=> $rfidTags ], 200);
    }
}
