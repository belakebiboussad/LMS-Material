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
              <input type="text" name="prof_id" class="form-control pid border border-2 p-2" value="{{ old('prof_id') ? : '' }}" required>
              @error('prof_id')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label"><abbr title="">{{ __('user.NIN') }}</abbr></label>
              <input type="text" id ="NIN" name="NIN" class="form-control nin border border-2 p-2" value="{{ old('NIN') ? : '' }}" required>
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
            <div class="mb-3 col-md-3">
              <label class="form-label">{{ __('user.phone') }}</label>
              <input type="tel" name="phone" class="form-control phone border border-2 p-2" value="{{ old('phone') ?: '' }}">
              @error('phone')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-3">
              <label class="form-label">{{ __('user.email') }}</label>
              <input type="text" name="email" class="form-control email border border-2 p-2" value="{{ old('email') ?: '' }}">
              @error('email')
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
            <div class="mb-3 col-md-3">
              <label class="form-label">{{ __('user.username') }}</label>
              <input type="text" name="username" class="form-control border border-2 p-2" value='{{ old('username') ?: '' }}'>
              @error('username')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-3">
              <label for="role" class="ms-0">{{ __('user.role') }}</label>
              <select class="form-control border border-2 p-2" title="Role" name="role">
                @foreach($roles as $role)
                <option value="{{ $role->name }}" class="border-2 p-2" {{ (old('role') == $role->name) ? 'selected' : '' }}>
                  {{ __(  $role->name) }}
                </option>
                @endforeach
              </select>
            </div>

            <div class="mb-3 col-md-3">
              <label class="form-label">{{ __('user.password') }}</label>
              <input type="password" name="password" class="form-control border border-2 p-2" value=''>
              @error('password')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-3">
              <label class="form-label">{{ __('user.password_confirmation') }}</label>
              <input type="password" name="password_confirmation" class="form-control border border-2 p-2" value="">
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
    $(function() {
      Inputmask("9", { repeat: 20 }).mask("#NIN");
    })
  </script>
  @endsection