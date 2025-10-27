  @extends('layouts.app')
  @section('content')
  <div class="main-content position-relative bg-gray-100  h-100">
    <div class="card card-plain h-100">
      <div class="card-header pb-0 p-3">
        <div class="row">
          <div class="col-md-8 d-flex align-items-center">
            <h6 class="mb-3">{{ __('farme.edit') }}</h6>
          </div>
        </div>
      </div>
      <div class="card-body p-3">
        <form method='POST' action="{{ route('farms.update',$farm) }}">
          @csrf
          @method('PUT')
          @if (session('errors'))
          <div class="alert alert-warning" role="alert">
            {{ session('errors') }}
          </div>
          @endif
          <div class="row">
            <div class="mb-3 col-md-6">
              <label class="form-label">N° Enregistrement</label>
              <input type="text" name="recordNbr" class="form-control border border-2 p-2" value="{{  old('recordNbr', $farm->recordNbr) }}" required>
              @error('recordNbr')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Nom</label>
              <input type="text" name="name" class="form-control border border-2 p-2" value='{{ old('name', $farm->name) }}' required>
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
              <label class="form-label">Type</label>
              <div class="col-md-12">
                @foreach($animalTypes as $key=>$type)
                <input type="checkbox" name="animal_types[]" id="{{ $type }}" class="filled-in chk-col-pink" value="{{ $key }}">
                <label for="{{ $type }}">{{ ucfirst($type) }}</label>
                @endforeach
              </div>
            </div>
          </div>
          <div class="row">
            <div class="mb-3 col-md-6">
              <label class="form-label">Date création</label>
              <input type="date" name="creationDt" class="form-control border border-2 p-2" value="{{ old('creationDt', $farm->creationDt) }}">
              @error('creationDt')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Superficie(ha)</label>
              <input type="number" step="0.01" min="0" name="area" class="form-control border border-2 p-2" value="{{ old('area', $farm->area) }}">
              @error('area')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Adresse</label>
              <input type="text" name="address" class="form-control border border-2 p-2" value="{{ old('address', $farm->address) }}">
              @error('address')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-3">
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
            <div class="mb-3 col-md-3">
              <label class="form-label">Téléphone</label>
              <input type="tel" name="phone" pattern="[0][4-8][0-9]" placeholder="0xxxxxxxxx" class="form-control border border-2 p-2" value="{{ old('phone', $farm->phone) }}" required>
              @error('phone')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">latitude</label>
              <input type="number" name="y_lat" id="latitude" step="0.0000001" min="0" class="form-control border border-2 p-2" value="{{ old('y_lat', $farm->y_lat) }}" required>
              @error('y_lat')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">longitude</label>
              <input type="number" name="x_lon" id="longitude" step="0.0000001" min="0" class="form-control border border-2 p-2" value="{{ old('x_lon', $farm->x_lon) }}" required>
              @error('x_lon')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
          </div>
          <div id="mapid"></div>
          <div class="row mb-0">
            <div class="text-center mt-4">
              <button type="submit" class="btn bg-gradient-dark">Enregistrer</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  @endsection
  @push('scripts')
  <script>
    var mapCenter = [28.0289837, 1.6666663];
    var map = L.map('mapid').setView(mapCenter, 6);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
    var marker = L.marker(mapCenter).addTo(map);

    function updateMarker(lat, lng) {
      marker
        .setLatLng([lat, lng])
        .bindPopup("Your location :  " + marker.getLatLng().toString())
        .openPopup();
      return false;
    };
    map.on('click', function(e) {
      let latitude = e.latlng.lat.toString().substring(0, 15);
      let longitude = e.latlng.lng.toString().substring(0, 15);
      $('#latitude').val(latitude);
      $('#longitude').val(longitude);
      updateMarker(latitude, longitude);
    });
    var updateMarkerByInputs = function() {
      return updateMarker($('#latitude').val(), $('#longitude').val());
    }
    $('#latitude').on('input', updateMarkerByInputs);
    $('#longitude').on('input', updateMarkerByInputs);
  </script>
  @endpush