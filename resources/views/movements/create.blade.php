  @extends('layouts.app')
  @section('title', __('movement.create'))
  @section('content')
  <div class="main-content position-relative bg-gray-100  h-100">
    <form method='POST' action="{{ route('movements.store') }}">
      @csrf
      <div class="card card-plain h-100">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-md-8 d-flex align-items-center">
              <h3 class="mb-3">{{ __('movement.create') }}</h3>
            </div>
          </div>
        </div>
        <div class="card-body p-3">
          @if (session('errors'))
          @foreach (session('errors')->all() as $error)
          <div class="alert alert-warning">{{ $error }}</div>
          @endforeach
          @endif
          <div class="row">
            <div class="mb-3 col-md-3">
              <label class="form-label">{{ __('movement.sfarm_id')}}</label>
              <select type="text" name="sfarm_id" class="form-control border border-2 p-2">
                @isset($animal)
                <option value={{ $animal->farm_id }} selected disabled>{{ $animal->farm->name}}</option>
                @else
                <option value="" selected disabled>{{ __('selection') }}</option>
                @foreach(auth()->user()->farms as $farm)
                <option value="{{  $farm->id }}"> {{ $farm->name }} </option>
                @endforeach
                @endisset
              </select>
              @error('sfarm_id')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-3">
              <label class="form-label">{{ __('movement.animals')}}</label>
              <select type="text" name="animals" class="form-control border border-2 p-2">

              </select>
              @error('sfarm_id')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-3">
              <label class="form-label">{{ __('movement.buyer')}}</label>
              <select type="text" name="sfarm_id" class="form-control border border-2 p-2" required></select>
              @error('sfarm_id')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
             </div>
            </div>
            <div class="mb-3 col-md-3">
              <label class="form-label">{{ __('movement.dfarm_id')}}</label>
              <select type="text" name="sfarm_id" class="form-control border border-2 p-2" required></select>
              @error('sfarm_id')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  @endsection
  @section('js')
  <script>
    function animalsSelectFill(farmId) {
      var url = "{{ route('animals.index', ['id' => ':id']) }}";
      var url = url.replace(':id', farmId);
      $.ajax({
            url: url, // Replace with your server-side endpoint
            type: "GET", // Or "POST" depending on your server
            dataType: "json", // Expect JSON data
            success: function(data) {
              $('select[name="animals"]').empty();
              // Add a default or placeholder option (optional)
              $('select[name="animals"]').append($('<option>', {
                value: '',
                text: 'Selectionner ...',
                disabled: true,
                selected: true
              }));
              // Loop through the data and add options
              $.each(data, function(key, type) {
                 $('select[name="animals"]').append($('<option>', {
                    value: type['id'], // Assuming 'id' is the value
                    text:  type['eid'] // Assuming 'name' is the display text
                  }));
              });
            },
          });
    }
    $(document).ready(function() {
      $('select[name="sfarm_id"]').on('change', function() {
        animalsSelectFill($(this).val());
      });
    });
  </script>
  @endsection