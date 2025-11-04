@extends('layouts.app')
@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h4 class="text-white mx-3">{{ __('tag.index') }}</h4>
            </div>
          </div>
          <div class="me-3 my-3 text-end">
            <button type="button" id="attributionBtn" class="btn btn-primary mb-0" data-toggle="modal" data-target="#myModal">
              <i class="material-icons">receipt_long</i>&nbsp;&nbsp;
              {{ __('Associe') }}
            </button>
            <a class="btn bg-gradient-dark mb-0" href="{{ route('tags.create') }}"><i
                class="material-icons">add</i>&nbsp;&nbsp;
              {{ __('tag.create') }}
            </a>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th
                      class="text-uppercase text-secondary text-md font-weight-bolder opacity-7">
                    </th>
                    <th
                      class="text-uppercase text-secondary text-md font-weight-bolder opacity-7">
                      {{ __('tag.eid') }}
                    </th>
                    <th
                      class="text-uppercase text-secondary text-md font-weight-bolder opacity-7">{{ __('tag.vis_id') }}</th>
                    <th
                      class="text-uppercase text-secondary text-md font-weight-bolder opacity-7 ps-2">{{ __('tag.animalType_id') }}</th>
                    <th
                      class="text-center text-uppercase text-secondary text-md font-weight-bolder opacity-7">{{ __('tag.type') }}</th>
                    <th
                      class="text-center text-uppercase text-secondary text-md font-weight-bolder opacity-7">{{ __('status') }}
                    </th>
                    <th
                      class="text-center text-uppercase text-secondary text-md font-weight-bolder opacity-7">
                      {{ __('creation_at') }}
                    </th>

                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($tags as $tag)
                  <tr id="{{ $tag->id }}">
                    <td>
                      <div class="mt-2 d-flex">
                        <h6 class="mb-0"></h6>
                        <div class="form-check form-switch ps-0 ms-auto my-auto">
                          <input id="tag-{{ $tag->id }}" name="tags[]" class="form-check-input mt-0 ms-auto" type="checkbox" value="{{ $tag->id }}" aria-label="Select tag">
                        </div>

                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <p class="mb-0 text-lg">{{ $tag->eid }}</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-lg font-weight-bold mb-0">{{ $tag->vis_id }}</p>
                    </td>
                    <td>
                      <p class="text-lg font-weight-bold mb-0">{{ $tag->animalType->name }}</p>
                    </td>
                    <td class="align-middle text-center text-md">
                      <span
                        class="badge badge-sm bg-gradient-success">{{ $tag->type->label() }}</span>
                    </td>
                    <td class="align-middle text-center text-md">
                      @if($tag->is_active)
                      <span
                        class="badge badge-sm bg-gradient-success">{{ __('active') }}</span>
                      @else
                      <span
                        class="badge badge-sm bg-gradient-secondary">{{ __('inactive') }}</span>
                      @endif
                    </td>
                    <td class="align-middle text-center">
                      <span
                        class="text-secondary text-md font-weight-bold">{{ $tag->created_at->format('d/m/Y') }}</span>
                    </td>
                    <td class="align-middle">
                      <a href="{{ route('tags.show', $tag->id) }}"
                        class="btn btn-lg btn-info btn-link"
                        data-toggle="tooltip" data-original-title="Edit tag">
                        <i class="material-icons">visibility</i>
                      </a>
                      <a href="{{ route('tags.edit', $tag->id) }}"
                        class="btn btn-lg btn-success btn-link"
                        data-toggle="tooltip" data-original-title="Edit tag"><i class="material-icons">edit</i>
                      </a>
                      <a href="{{ route('tags.destroy', $tag->id) }}"
                        class="btn btn-lg btn-danger btn-link"
                        data-toggle="tooltip" data-original-title="Delete tag"
                        onclick="event.preventDefault(); if(confirm('{{ __('Are you sure you want to delete this tag?') }}')){ document.getElementById('delete-form-{{ $tag->id }}').submit(); }">
                        <i class="material-icons">delete</i>
                      </a>
                      <form id="delete-form-{{ $tag->id }}" action="{{ route('tags.destroy', $tag->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <x-modal id="myModal" name="myModal">
    <x-slot name="header">
      Attribuer des Tags RFID
    </x-slot>
    <p>This is the main content of the modal body.</p>

    <div class="row">
      <div class="mb-3 col-md-12">
        <label class="form-label">{{ __('tag.owner_id') }}</label>
        <select id="owner_id" class="form-control border border-2 p-2 {{ $errors->has('owner_id') ? ' is-invalid' : '' }}" required>
          <option value="">{{ __('Select owner') }}</option>
          @foreach($owners as $owner)
          <option value="{{ $owner->id }}" {{ old('owner_id') == $owner->id ? 'selected' : '' }}>{{ $owner->name }}</option>
          @endforeach
        </select>

      </div>
    </div>
    <x-slot name="footer">
      <button type="button" class="btn btn-warning" data-dismiss="modal">{{ __('Cancel') }}</button>
      <button type="submit" class="btn bg-gradient-primary" onclick="fct();">
        <i class="material-icons">save</i>
        {{ __('Save') }}</button>
    </x-slot>
  </x-modal>
</main>
@endsection

@section('js')
<script>
  function fct() {
    var selectedIds = [];
    $('input[name="tags[]"]:checked').each(function() {
      selectedIds.push($(this).val());
    });
    if (selectedIds.length > 0) {
      $.ajax({
        url: "{{ route('tags.assign') }}", // Replace with your actual route name
        type: 'POST', // Or 'GET', depending on your route
        dataType: 'json', // Expecting JSON response
        data: {
          tagIds: selectedIds, // Send the array as a parameter
          owner_id: $("#owner_id").val(),
          _token: '{{ csrf_token() }}' // Include CSRF token for POST requests
        },
        success: function(response) {
            $.each(selectedIds, function(index, value) {
                $('#' + value).remove();
            });
          $('#myModal').modal('hide');
        },
        error: function(xhr, status, error) {
          console.error('Error:', error);
        }
      });
    } else {
      console.log('No IDs selected.');
    }
  }
    
  // Shorthand syntax
  $(function() {
    $("#attributionBtn").prop("disabled", true);
    $('input[type="checkbox"]').on('change', function() {
      if ($(this).is(':checked')) {
        $("#attributionBtn").prop("disabled", false);
      } else {
        var boxes = $('input[name=tags]:checked');
        if (boxes.length == 0)
          $("#attributionBtn").prop("disabled", true);
      }
    });
  });
</script>

@endsection