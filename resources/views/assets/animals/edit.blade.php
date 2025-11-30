  @extends('layouts.app')
  @section('title', __('animal.edit'))
  @section('content')
  <div class="main-content position-relative bg-gray-100  h-100">
    <div class="card card-plain h-100">
      <div class="card-header pb-0 p-3">
        <div class="row">
          <div class="col-md-8 d-flex align-items-center">
            <h3 class="mb-3">{{ __('animal.edit') }}</h3>
          </div>
        </div>
      </div>
      <div class="card-body p-3">
        <form method='POST' action="{{ route('animals.update', $animal) }}">
          @csrf
          @method('PUT')
          @if (session('errors'))
          <div class="alert alert-warning" role="alert">
            {{ session('errors') }}
          </div>
          @endif
          <div class="row">
            <div class="mb-3 col-md-6">
              <label class="form-label">{{ __('animal.farm_id') }}</label>
              <select name="farm_id" class="form-control border border-2 p-2 {{ $errors->has('farm_id') ? ' is-invalid' : '' }}" required>
                <option value="">{{ __('Select farm') }}</option>
                @foreach($farms as $id=>$farm)
                <option value="{{ $id }}" {{ $id == $animal->farm_id ? 'selected' : '' }}>{{ $farm }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label  ">{{ __('animal.animalType') }}</label>
              <select id="animalType_id" name="animalType_id" class="form-control border border-2 p-2 {{ $errors->has('animalType_id') ? ' is-invalid' : '' }}" required>
                <option value="">{{ __('Select type') }}</option>
                @foreach($animalTypes as $id => $type)
                <option value="{{ $id }}" {{ $animal->animalType_id == $id ? 'selected' : '' }}>{{ $type }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">{{ __('animal.breed_id') }} </label>
              <select id="breed_id" name="breed_id" class="form-control border border-2 p-2 {{ $errors->has('breed_id') ? ' is-invalid' : '' }}" required>
                <option value="">{{ __('Select name') }}</option>
                @foreach($animal->animalType->breeds as  $breed)
                <option value="{{ $breed->id }}" {{ $animal->breed_id == $breed->id ? 'selected' : '' }}>{{ $breed->name }}</option>
                @endforeach
              </select>
              @error('breed_id')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">{{ __('animal.dob') }}</label>
          <input type="date" name="dob" class="form-control border border-2 p-2 {{ $errors->has('dob') ? ' is-invalid' : '' }}" value="{{ $animal->dob->format('Y-m-d') }}" required>
            </div>
            <div class="mb-3  col-md-6">
              <label class="form-label">{{ __('animal.sexe') }}</label>
              <select name="sexe" class="form-control border border-2 p-2 {{ $errors->has('sexe') ? ' is-invalid' : '' }}" required>
                @foreach(\App\Enums\Sexe::cases() as $sexe)
                <option value="{{ $sexe->value }}" {{ old('sexe') == $sexe->value ? 'selected' : '' }}>{{ $sexe->label() }}</option>
                @endforeach
              </select>
              @error('sexe')
              <p class='text-danger inputerror'>{{ $message }} </p> 
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">{{ __('animal.weight') }}</label>
              <input type="number" step="0.01" name="weight" class="form-control border border-2 p-2 {{ $errors->has('weight') ? ' is-invalid' : '' }}" value="{{ old('weight', $animal->weight) }}">
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label>">{{ __('animal.eid') }}</label>
              <select id="rfid_id" name="eid" class="form-control border border-2 p-2 {{ $errors->has('eid') ? ' is-invalid' : '' }}">
                <option value="">{{ __('Select RFID Tag') }}</option>
                {{-- <option value="{{ $animal->rfidTag ? $animal->rfidTag->id :'' }}" selected> {{ $animal->rfidTag ? $animal->rfidTag->eid : '' }}</option> 
                --}}
                @foreach($tags as $id => $eid)
                <option value="{{ $id }}" {{ $animal->rfidTag && $animal->rfidTag->id == $id ? 'selected' : '' }}>{{ $eid }}</option>
                @endforeach 
              </select>
              @error('eid')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <div class="form-check form-switch mt-5">
                 <input type="checkbox" name="is_seek" class="form-check-input {{ $errors->has('is_seek') ? ' is-invalid' : '' }}" {{ old('is_seek') ? 'checked' : '' }} />
                <label class="form-check-label">{{ __('animal.is_seek') }}</label>
              </div>
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
  @section('js')
  <script>
    $(document).ready(function() {
      $('#animalType_id').on('change', function() {
        var selectedValue = $(this).val();
        var url = "{{ route('animals.getBreeds', ['id' => 'selectedValue']) }}";
        url = url.replace('selectedValue', selectedValue);
        $.ajax({
          url: url, // Replace with your server-side endpoint
          type: "GET", // Or "POST" depending on your server
          dataType: "json", // Expect JSON data
          success: function(data) {
            // Process the received data
            // Clear existing options (optional, if you're repopulating)
            $('#breed_id').empty();
            // Add a default or placeholder option (optional)
            $('#breed_id').append($('<option>', {
              value: '',
              text: 'Selectionner ...'
            }));
            // Loop through the data and add options
            $.each(data.breed, function(index, name) {
              $('#breed_id').append($('<option>', {
                value: index, // Assuming 'id' is the value
                text:  name // Assuming 'name' is the display text
              }));
            });
            $('#rfid_id').empty();
            $('#rfid_id').append($('<option>', {
              value: '',
              text: 'Selectionner ...'
            }));    
            $.each(data.rfids, function(id, eid) {
              $('#rfid_id').append($('<option>', {
                value: id, // Assuming 'id' is the value
                text: eid // Assuming 'name' is the display text
              }));
            });
          },
          error: function(xhr, status, error) {
            console.error("AJAX Error:", status, error);
          }
        });

      });
    });
  </script>
  @endsection