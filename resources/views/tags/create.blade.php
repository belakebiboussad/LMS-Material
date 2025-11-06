  @extends('layouts.app')
  @section('title', __('tag.tags.create'))
  @section('content')
  <div class="main-content position-relative bg-gray-100  h-100">
    <div class="card card-plain h-100">
      <div class="card-header pb-0 p-3">
        <div class="row">
          <div class="col-md-8 d-flex align-items-center">
            <h3 class="mb-3">{{ __('tag.create') }}</h3>
          </div>
        </div>
      </div>
      <div class="card-body p-3">
        <form method='POST' action="{{ route('tags.store') }}">
          @csrf
          @if (session('errors'))
          @foreach (session('errors')->all() as $error)
          <div class="alert alert-danger">{{ $error }}</div>
          @endforeach
          @endif
          <div class="row">
            <div class="mb-3 col-md-6">
              <label class="form-label"><abbr title="RFID">{{ __('tag.eid') }}</abbr></label>
              <input type="text" name="eid" class="form-control border border-2 p-2 {{ $errors->has('eid') ? ' is-invalid' : '' }}" value="{{ old('eid') ?? '' }}" required>
              @error('eid')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">{{ __('tag.vis_id') }}</label>
              <input type="text" name="vis_id" class="form-control border border-2 p-2 {{ $errors->has('vis_id') ? ' is-invalid' : '' }}" value="{{ old('vis_id') ?? '' }}" required>
              @error('vis_id')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">{{ __('tag.animalType_id') }}</label>
              <select name="animalType_id" class="form-control border border-2 p-2 {{ $errors->has('type') ? ' is-invalid' : '' }}" required>
                <option value="">{{ __('Select type') }}</option>
                @foreach($animalTypes as $type)
                <option value="{{ $type->id }}" {{ old('animalType_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                @endforeach
              </select>
              @error('recordNbr')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">{{ __('type') }}</label>
              <select name="type" class="form-control border border-2 p-2 {{ $errors->has('type') ? ' is-invalid' : '' }}" required>
                <option value="">{{ __('Select type') }}</option>
                @foreach(\App\Enums\TagType::cases() as $type)
                <option value="{{ $type->value }}" {{ old('type') == $type->value ? 'selected' : '' }}>{{ $type->label() }}</option>
                @endforeach
              </select>
              @error('type')
              <p class='text-danger inputerror'>{{ $message }} </p>
              @enderror
            </div>
          </div>
          <div class="row mb-0">
            <div class="col-md-12 text-center">
              <button type="submit" class="btn bg-gradient-primary">{{ __('Save') }}</button>
              <a href="{{ route('tags.index') }}" class="btn btn-warning">{{ __('Cancel') }}</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  @endsection