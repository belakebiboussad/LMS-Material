  @extends('layouts.app')
  @section('content')
  <div class="main-content position-relative bg-gray-100  h-100">
    <form method='POST' action="{{ route('farms.store') }}">
      @csrf
      <div class="card card-plain h-100">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-md-8 d-flex align-items-center">
              <h6 class="mb-3">Ajouter une {{ __('Farme') }}</h6>
            </div>
          </div>
        </div>
        <div class="card-body p-3">
          @if (session('errors'))
          <div class="alert alert-warning" role="alert">
            {{ session('errors') }}
          </div>
          @endif
          <div class="row">
            <div class="mb-3 col-md-6">
              <label class="form-label">Nom</label>
              <input type="text" name="name" class="form-control border border-2 p-2" value='{{ old('name') ? : '' }}' required>
              @error('name')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Propriétaire</label>
              <select name="owner_id" class="form-control border border-2 p-2">
                @foreach($owners as $key=>$owner)
                <option value="{{ $key }}" class="border-2 p-2">
                  {{ $owner }}
                </option>
                @endforeach
              </select>
              @error('owner_id')
              <p class='text-danger inputerror'>{{ $message }}</p>
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Wilaya</label>
              <select name="wilaya_id" class="form-control border border-2 p-2">
                @foreach($wilayas as $key=>$wilaya)
                <option value="{{ $key }}" class="border-2 p-2">
                  {{ $wilaya }}
                </option>
                @endforeach
              </select>
              @error('wilaya_id')
              <p class='text-danger inputerror'>{{ $message }}</p>
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Type</label>
              <select name="type" class="form-control border border-2 p-2">
                @foreach($animalTypes as $key=>$type)
                <option value="{{ $key }}" class="border-2 p-2">
                  {{ ucfirst($type) }}
                </option>
                @endforeach
              </select>
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Type</label>
              @foreach($animalTypes as $key=>$type)
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="fcustomCheck1" checked="">
                <label class="custom-control-label" for="customCheck1">aa</label>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  @endsection