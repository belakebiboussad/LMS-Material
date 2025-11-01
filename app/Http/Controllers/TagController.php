<?php

namespace App\Http\Controllers;

use App\Enums\TagStatus;
use App\Enums\TagType;
use App\Models\AnimalType;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags= Tag::all();
        return view('tags.index',compact('tags'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $animalTypes = AnimalType::all();
        $types = TagType::cases();
        return view('tags.create',compact('animalTypes','types'));
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
