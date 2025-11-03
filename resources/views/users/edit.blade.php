  @extends('layouts.app')
  @section('content')
  <div class="main-content position-relative bg-gray-100  h-100">
    <form method='POST' action="{{ route('users.update', $user) }}">
      @csrf
      @method('PUT')
      <div class="card card-plain h-100">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-md-8 d-flex align-items-center">
              <h6 class="mb-3">Modfier l'{{ __('farmer') }}</h6>
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
              <label class="form-label">{{ __('user.prof_id') }}</label>
              <input type="text" name="prof_id" class="form-control border border-2 p-2" value="{{ old('prof_id', $user->prof_id) }}" required />
              <!-- inputmode=""  pattern=""  maxlength="" placeholder="" -->
              @error('prof_id')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label"><abbr title="">{{ __('user.NIN') }}</abbr></label>
              <input type="text" name="NIN" class="form-control border border-2 p-2" value="{{ old('NIN', $user->NIN) }}" required>
              @error('NIN')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">{{ __('user.name') }}</label>
              <input type="text" name="name" class="form-control border border-2 p-2" value="{{ old('name', $user->name) }}" required>
              @error('name')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">{{ __('user.lastName') }}</label>
              <input type="text" name="lastName" class="form-control border border-2 p-2" value="{{ old('lastName', $user->lastName) }}" required>
              @error('lastName')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">{{ __('user.birthDate') }}</label>
              <input type="date" name="birthDate" class="form-control border border-2 p-2" value="{{ old('birthDate', $user->birthDate) }}">
              @error('birthDate')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">{{ __('user.email') }}</label>
              <input type="email" name="email" class="form-control border border-2 p-2" value="{{ old('email', $user->email) }}">
              @error('email')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class=" mb-3 col-md-6">
              <label class="form-label">{{ __('user.address') }}</label>
              <input type="text" name="address" class="form-control border border-2 p-2" value="{{ old('address', $user->address) }}">
              @error('address')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">{{ __('user.commune_id') }}</label>
              <select type="text" name="commune_id" class="form-control border border-2 p-2">
                @foreach($cities as $city)
                <option value="{{ $city->id }}" class="border-2 p-2" @if ( $user->commune_id == $city->id) selected @endif>{{ $city->name }}</option>
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
            <div class="mb-3 col-md-6">
              <label class="form-label">{{ __('user.username') }}</label>
              <input type="text" name="username" class="form-control border border-2 p-2" value="{{ old('username', $user->username) }}">
              @error('username')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label for="role" class="ms-0">{{ __('user.role') }}</label>
              <select class="form-control border border-2 p-2" title="Role" name="role" {{ ($user->hasRole('admin')) ? 'disabled' : '' }}>
                @foreach($roles as $key=>$role)
                <option value="{{ $role->name }}" @if($user->roles->pluck('name')->contains($role->name)) selected @endif>
                  {{ __(  $role->name) }}
                </option>
                @endforeach
              </select>
            </div>
            {{--<div class="mb-3 col-md-4">
              <label class="form-label">{{ __('user.password') }}</label>
              <input type="password" name="password" class="form-control border border-2 p-2" value="">
              @error('password')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>--}}
          </div> 
          <div class="row mb-0">
            <div class="text-center mt-4">
                 <button type="submit" class="btn bg-gradient-primary">{{ __('Save') }}</button>
            </div>
          </div>
    </form>
  </div>
  @endsection