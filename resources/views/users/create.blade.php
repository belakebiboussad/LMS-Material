  @extends('layouts.app')
  @section('title', __('user.create'))
  @section('content')
  <div class="main-content position-relative bg-gray-100  h-100">
    <form method='POST' action="{{ route('users.store') }}">
      @csrf
      <div class="card card-plain h-100">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-md-8 d-flex align-items-center">
              <h6 class="mb-3">{{ __('user.create') }}</h6>
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
            <div class="mb-3 col-md-6">
              <label class="form-label">{{ __('user.prof_id') }}</label>
              <input type="text" name="prof_id" class="form-control border border-2 p-2" value="{{ old('prof_id') ? : '' }}" required>
              @error('prof_id')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label"><abbr title="">{{ __('user.NIN') }}</abbr></label>
              <input type="text" name="NIN" class="form-control border border-2 p-2" value="{{ old('NIN') ? : '' }}" required>
              @error('NIN')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">{{ __('user.name') }}</label>
              <input type="text" name="name" class="form-control border border-2 p-2" value="{{ old('name') ? : '' }}" required>
              @error('name')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">{{ __('user.lastName') }}</label>
              <input type="text" name="lastName" class="form-control border border-2 p-2" value="{{ old('username') ? : '' }}" required>
              @error('lastName')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">{{ __('user.birthDate') }}</label>
              <input type="date" name="birthDate" class="form-control border border-2 p-2" value="{{ old('birthDate') ? : '' }}">
              @error('birthDate')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">{{ __('user.email') }}</label>
              <input type="email" name="email" class="form-control border border-2 p-2" value="{{ old('email') ?: '' }}">
              @error('email')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">{{ __('user.address') }}</label>
              <input type="text" name="address" class="form-control border border-2 p-2" value="{{ old('address') ?: '' }}">
              @error('address')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">{{ __('user.commune_id') }}</label>
              <select type="text" name="commune_id" class="form-control border border-2 p-2">
                @foreach($cities as $city)
                <option value="{{ $city->id }}" class="border-2 p-2">{{ $city->name }}</option>
                @endforeach
              </select>
              @error('commune_id')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
          </div>
        </div>
      </div>
      <div class="card card-plain h-100">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-md-8 d-flex align-items-center">
              <h6 class="mb-3">Authentification</h6>
            </div>
          </div>
        </div>
        <div class="card-body p-3">
          <div class="row">
            <div class="mb-3 col-md-4">
              <label class="form-label">{{ __('user.username') }}</label>
              <input type="text" name="username" class="form-control border border-2 p-2" value='{{ old('username') ?: '' }}'>
              @error('username')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-4">
              <label for="role" class="ms-0">{{ __('user.role') }}</label>
              <select class="form-control border border-2 p-2" title="Role" name="role">
                @foreach($roles as $role)
                <option value="{{ $role->name }}" class="border-2 p-2"  "{{ old('role') == $role->name? 'selected' : '' }}"">
                  {{ __(  $role->name) }}
                </option>
                @endforeach
              </select>
            </div>
            <div class="mb-3 col-md-4" id="farSelectmDiv">
              <label for="role" class="ms-0">{{ __('farm.name') }}</label>
              <select class="form-control border border-2 p-2" title="Role" name="farm_id">
              </select>
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">{{ __('user.password') }}</label>
              <input type="password" name="password" class="form-control border border-2 p-2" value=''>
              @error('password')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">{{ __('user.confpassword') }}</label>
              <input type="password" name="confpassword" class="form-control border border-2 p-2" value="">
              @error('password')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
          </div>
          <div class="row mb-0">
            <div class="col-md-12 text-center">
              <button type="submit" class="btn bg-gradient-primary">{{ __('Save') }}
                <span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span>
              </button>
              <a href="{{ route('tags.index') }}" class="btn btn-warning">{{ __('Cancel') }}</a>
            </div>
          </div>
    </form>
  </div>
  @endsection
  @section('js')
  <script>
  function farmSelectFill() {
        var url = "{{ route('farms.index') }}";
        $.ajax({
          url: url, // Replace with your server-side endpoint
          type: "GET", // Or "POST" depending on your server
          dataType: "json", // Expect JSON data
          success: function(data) {
            $('select[name="farm_id"]').empty();
            // Add a default or placeholder option (optional)
            $('select[name="farm_id"]').append($('<option>', {
              value: '',
              text: 'Selectionner ...'
            }));
            // Loop through the data and add options
            $.each(data, function(index, name) {
              $('select[name="farm_id"]').append($('<option>', {
                value: index, // Assuming 'id' is the value
                text:  name // Assuming 'name' is the display text
              }));
            });
          },
          error: function(xhr, status, error) {
            console.error("AJAX Error:", status, error);
          }
        });  
  }   
  $(function() {
     $('#farSelectmDiv').hide()
    $('select[name="role"]').on('change', function() {
        if($(this).val() === 'guardien') {
          farmSelectFill();
          $('#farSelectmDiv').show();
        } else {
           $('#farSelectmDiv').hide()
        }
    });
  });
  </script>
  @endsection