<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $tags= Tag::whereDoesntHave('owner')->get();
        $owners = User::role(['farmer', 'guardian'])->get();
        return view('tags.index',compact('tags','owners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $animalTypes = AnimalType::all();
        return view('tags.create',compact('animalTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'eid' => 'required|string|unique:tags,eid',
            'type' => 'required|in:'.implode(',', array_map(fn($case) => $case->value, TagType::cases())),
            'animalType_id' => 'required|exists:animal_types,id',
            'vis_id' => 'required|string|unique:tags,vis_id',
        ]);
        $tag = Tag::create($validated);
        return redirect()->route('tags.index')->with('success', __('tag.created'));
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
    public function assign(Request $request)
    {
        return $request->owner_id;
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
