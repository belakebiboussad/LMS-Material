  @extends('layouts.app')
  @section('title', __('movement.create'))
  @section('css')
  <style>
    #mapid {
      height: 300px;
    }

    .selection__choice {
      line-height: 1rem;
    }
  </style>
  @endsection
  @section('content')
  <div class="main-content position-relative bg-gray-100  h-100">
    <div class="card card-plain h-100">
      <div class="card-header pb-0 p-3">
        <div class="row">
          <div class="col-md-8 d-flex align-items-center">
            <h3 class="mb-3">{{ __('movement.create') }}</h3>
          </div>
        </div>
      </div>
    </div>
    <form method='POST' action="{{ route('movements.store') }}">
      @csrf
      <input type="hidden" name="seller_id" value="{{ auth()->id() }}">
      <input type="hidden" name="type" value="{{ App\Enums\Transaction::SELL }}">
      <div class="card card-plain h-100">
        <div class="card-body p-3">
          @if (session('errors'))
          @foreach (session('errors')->all() as $error)
          <div class="alert alert-warning">{{ $error }}</div>
          @endforeach
          @endif
          <div class="row">
            <div class="mb-3 col-lg-6">
              <label class="form-label">{{ __('movement.sfarm_id')}}</label>
              <select type="text" name="sfarm_id" class="form-control border border-2 p-2">
                @isset($animal)
                <option value={{ $animal->farm_id }} selected disabled>{{ $animal->farm->name}}</option>
                @else
                <option value="" selected>{{ __('selection') }}</option>
                @foreach(auth()->user()->farms as $farm)
                <option value="{{  $farm->id }}"> {{ $farm->name }} </option>
                @endforeach
                @endisset
              </select>
              @error('sfarm_id')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-lg-6">
              <label class="form-label">{{ __('animals') }}</label>
              <select type="text" name="animals[]" class="form-control border border-2 p-2" data-placeholder="{{__('animal.selects')}}" multiple="miltiple">
              </select>
              @error('animals')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-lg-6">
              <label class="form-label">{{ __('movement.buyer_id')}}</label>
              <select type="text" name="buyer_id" class="form-control border border-2 p-2" required>
                <option value="" selected>{{ __('selection') }}</option>
                @foreach($farmers as $key=>$farmer)
                <option value=" {{ $key }}" {{ $key == Auth::id() ? 'disabled' : '' }}>{{ $farmer }} </option>
                @endforeach
              </select>
              @error('buyer_id')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-lg-6">
              <label class="form-label">{{ __('movement.dfarm_id')}}</label>
              <select type="text" name="dfarm_id" class="form-control border border-2 p-2">
              </select>
              @error('dfarm_id')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">{{ __('movement.depDate') }}</label>
              <input type="date" name="depDate" class="form-control border border-2 p-2 {{ $errors->has('depDate') ? ' is-invalid' : '' }}" value="{{ old('depDate') ?? '' }}">
              @error('depDate')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">{{ __('movement.arrivDate') }}</label>
              <input type="date" name="arrivDate" class="form-control border border-2 p-2 {{ $errors->has('arrivDate') ? ' is-invalid' : '' }}" value="{{ old('arrivDate') ?? '' }}">
              @error('arrivDate')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer d-flex justify-content-end  text-center p-3">
        <button type="submit" class="btn bg-gradient-primary mb-0">{{ __('app.save') }}</button>
      </div>
    </form>
  </div>
  @endsection
  @section('js')
  <script>
    function animalsSelectFill(farmId) {
      $.ajax({
        url: "{{ route('animals.index') }}?id=" + farmId, // Replace with your server-side endpoint
        type: "GET", // Or "POST" depending on your server
        dataType: "json", // Expect JSON data
        success: function(data) {
          var select = $('select[name="animals[]"]');
          select.empty();
          $.each(data, function(eid, id) {
            select.append($('<option>', {
              value: id, // Assuming 'id' is the value
              text: eid // Assuming 'name' is the display text
            }));
          });
        },
        error: function(xhr, status, error) {
          alert("AJAX Error: " + status + error);
        }
      });
    }

    function farmSelectFill(farmerID) {
      $.ajax({
        url: "{{ route('farms.index') }}?id=" + farmerID, // Replace with your server-side endpoint
        type: "GET", // Or "POST" depending on your server
        dataType: "json", // Expect JSON data
        success: function(data) {
          var select = $('select[name="dfarm_id"]');
          select.empty();
          $.each(data, function(id, name) {
            select.append($('<option>', {
              value: id, // Assuming 'id' is the value
              text: name // Assuming 'name' is the display text
            }));
          });
        },
        error: function(xhr, status, error) {
          alert("AJAX Error: " + status + error);
        }
      });
    }
    $(document).ready(function() {
      $('select[name="animals[]"]').select2({
        placeholder: "{{ __('selection') }}",
        minimumResultsForSearch: Infinity,
        allowClear: true
      });
      $('select[name="sfarm_id"]').on('change', function() {
        animalsSelectFill($(this).val());
      });
      $('select[name="buyer_id"]').on('change', function() {
        farmSelectFill($(this).val());
      });
    });
  </script>
  @endsection