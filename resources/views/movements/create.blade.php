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
             <div class="mb-3 col-md-6">
              <label class="form-label">{{ __('movement.sfarm_id')}}</label>
              <select type="text" name="sfarm_id" class="form-control border border-2 p-2" required>
              </select>
              @error('sfarm_id')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
          </div>
        </div>
      </div>
    </form>
  </div>
    @endsection
