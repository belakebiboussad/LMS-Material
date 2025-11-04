  @extends('layouts.app')
  @section('title', __('animal.create'))
  @section('content')
  <div class="main-content position-relative bg-gray-100  h-100">
    <div class="card card-plain h-100">
      <div class="card-header pb-0 p-3">
        <div class="row">
          <div class="col-md-8 d-flex align-items-center">
            <h3 class="mb-3">{{ __('animal.create') }}</h3>
          </div>
        </div>
      </div>
      <div class="card-body p-3">
        <form method='POST' action="{{ route('farms.store') }}">
          @csrf
          @if (session('errors'))
          <div class="alert alert-warning" role="alert">
            {{ session('errors') }}
          </div>
          @endif
          <div class="row">
            <div class="mb-3 col-md-6">
              <label class="form-label">{{ __('animal.name') }}</label>
              <input type="text" name="name" class="form-control border border-2 p-2 {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') ?? '' }}" required> 
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">{{ __('animal.farm') }}</label>
              <select name="farm_id" class="form-control border border-2 p-2 {{ $errors->has('farm_id') ? ' is-invalid' : '' }}" required>
                <option value="">{{ __('Select farm') }}</option>
                @foreach($farms as $id=>$farm)
                <option value="{{ $id }}" {{ old('farm_id') == $id ? 'selected' : '' }}>{{ $farm }}</option>
                @endforeach 
              </select>
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label  ">{{ __('animal.animalType') }}</label>
              <select name="animalType_id" class="form-control border border-2 p-2 {{ $errors->has('animalType_id') ? ' is-invalid' : '' }}" required>
                <option value="">{{ __('Select type') }}</option>
                @foreach($animalTypes as $id => $type)
                <option value="{{ $id }}" {{ old('animalType_id') == $type ? 'selected' : '' }}>{{ $type }}</option>
                @endforeach 
              </select>
            </div>  
            <div class="mb-3 col-md-6">
              <label class="form-label">{{ __('animal.dob') }}</label>
              <input type="date" name="dob" class="form-control border border-2 p-2 {{ $errors->has('dob') ? ' is-invalid' : '' }}" value="{{ old('dob') ?? '' }}" required>
            </div>
            <div class="mb-3  col-md-6">
              <label class="form-label">{{ __('animal.sexe') }}</label>
              <select name="sexe" class="form-control border border-2 p-2 {{ $errors->has('sexe') ? ' is-invalid' : '' }}" required>
                <option value="">{{ __('Select sexe') }}</option>
                <option value="male" {{ old('sexe') == 'male' ? 'selected' : '' }}>{{ __('Male') }}</option>
                <option value="female" {{ old('sexe') == 'female' ? 'selected' : '' }}>{{ __('Female') }}</option>
              </select>
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">{{ __('animal.weight') }}</label>
              <input type="number" step="0.01" name="weight" class="form-control border border-2 p-2 {{ $errors->has('weight') ? ' is-invalid' : '' }}" value="{{ old('weight') ?? '' }}">    
            </div>
             <div class="mb-3 col-md-6">
              <label class="form-label">{{ __('animal.is_seek') }}</label>
              <select name="is_seek" class="form-control border border-2 p-2  {{ $errors->has('is_seek') ? ' is-invalid' : '' }}" required>
                <option value="">{{ __('Select option') }}</option>
                <option value="1" {{ old('is_seek') == '1' ? 'selected' : '' }}>{{ __('Yes') }}</option>
                <option value="0" {{ old('is_seek') == '0' ? 'selected' : '' }}>{{ __('No') }}</option>   
              </select> 
             </div>           


            <div class="mb-3 col-md-6">
              <label class="form-label">{{ __('animal.dethDate') }}</label>
              <input type="date" name="dethDate" class="form-control border border-2 p-2 {{ $errors->has('dethDate') ? ' is-invalid' : '' }}" value="{{ old('dethDate') ?? '' }}">    
            @error('creationDt')
              <p class='text-danger inputerror'>{{ $message }} </p>
            @enderror 
          </div>
          <div class="row mb-0">      
            <div class="col-md-12 text-center mt-4">
              <button type="submit" class="btn bg-gradient-primary">{{ __('app.save') }}</button>
              <a href="{{ route('animals.index') }}" class="btn btn-warning">{{ __('app.cancel') }}</a>
            </div>  
          </div>
   
           


        </div>
        </form>

      </div>
    </div>  
  </div>
  @endsection