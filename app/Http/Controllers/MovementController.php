<?php

namespace App\Http\Controllers;
use App\Models\Animal;
use App\Models\Farm;
use Illuminate\Http\Request;

class MovementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Animal $animal)
    {
        $movements= $animal->movements();
        return view('movements.index', compact('movements')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Animal $animal)
    {
        $farms = Farm::all()->pluck('id','name');
        return view('movements.create', compact('farms', 'animal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
