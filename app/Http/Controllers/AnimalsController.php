<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farm;
use App\Models\Animal;
use App\Models\AnimalType;

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
        $farms = auth()->user()->farms()->pluck('name', 'id');
        $animalTypes = AnimalType::all()->pluck('name', 'id');
        return view('assets.animals.create', compact('animalTypes', 'farms'));

        // $wilayas = Wilaya::all()->pluck('name', 'id');
        
        //  return view('assets.farms.create', compact('owners', 'wilayas', 'animalTypes'));
    }
}
