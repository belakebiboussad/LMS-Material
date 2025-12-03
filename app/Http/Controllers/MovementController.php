<?php

namespace App\Http\Controllers;
use App\Enums\Transaction;
use App\Models\User;
use App\Models\Animal;
use App\Models\Farm;
use App\Models\Movement;
use Illuminate\Http\Request;

use Auth;

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
    public function create() {
        $farms = Farm::all()->pluck('id','name');
        $farmers = User::Role('farmer')->pluck('name', 'id');
        return view('movements.create', compact('farms','farmers'));
    }
    public function creation( $transaction)
     {
        switch($transaction) {
              case 'sell'://$view = 'movements.create';
                redirect()->action([MovementController::class, 'create']);
                break;
            case 'buy':
                return view('movements.buy');
                break;
            case 'interne':
                return view('movements.interne');
                break;
            default:
               // return view('errors.500');

        }
        

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'seller_id' => 'required|exists:users,id',
            'sfarm_id' => 'nullable|exists:farms,id',
            'type' =>'required|new Enum(Transaction::class',
            'animals' => 'required|array|min:1',
            'buyer_id' =>'required|exists:users,id'
        ]);
      
        Movement::create($validated);
        return redirect()->route('movements.index')->with('success', __('movement.created'));
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
