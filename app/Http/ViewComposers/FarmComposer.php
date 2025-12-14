<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Wilaya;
use App\Models\AnimalType;
class FarmComposer
{
    public function compose(View $view)
    {
      $wilayas = Wilaya::all()->pluck('name', 'id');
      $animalTypes = AnimalType::all()->pluck('name', 'id');  
      $view->with(['wilayas'=> $wilayas,'animalTypes'=>$animalTypes]);
    }
}  
