@extends('layouts.app')
@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h4 class="text-white mx-3">{{ __('animal.index') }}</h4>
            </div>
          </div>
          <div class="me-3 my-3 text-end">
            <a class="btn bg-gradient-dark mb-0" href="{{ route('animals.create') }}"><i
                class="material-icons text-sm">add</i>&nbsp;&nbsp;
              {{ __('animal.create') }}
            </a>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th
                      class="text-uppercase text-secondary text-lg font-weight-bolder opacity-7">
                      {{ __('animal.eid') }}</th>
                    <th
                      class="text-uppercase text-secondary text-lg font-weight-bolder opacity-7">
                      {{ __('animal.animalType') }}</th>
                    <th
                      class="text-uppercase text-secondary text-lg font-weight-bolder opacity-7 ps-2">
                       {{ __('animal.breed_id') }}</th>
                    <th class="text-uppercase text-secondary text-lg font-weight-bolder opacity-7 ps-2">
                     Sexe</th> 

                    <th
                      class="text-center text-uppercase text-secondary text-lg font-weight-bolder opacity-7">
                      {{ __('animal.age') }}
                    </th>
                    <th
                      class="text-center text-uppercase text-secondary text-smfont-weight-bolder opacity-7">
                      {{ __('animal.is_seek') }}</th>
                    <th
                      class="text-center text-uppercase text-secondary text-lg font-weight-bolder opacity-7">
                      {{ __('animal.farm_id') }}</th>
                    <th
                      class="text-center text-uppercase text-secondary text-lg font-weight-bolder opacity-7">
                      {{ __('creation_at') }}</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($animals as $animal)
                  <tr>
                    <td class="align-middle">
                      <div class="d-flex px-2 py-1">
                        <span class="text-md">{{ $animal->rfidTag->eid ?? '' }}</span>
                      </div>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-lg">{{ $animal->animalType->name }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-lg">{{ $animal->breed->name }}</span>
                    </td>
                     <td class="align-middle text-center">
                      <span class="text-lg">{{ $animal->sexe }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-lg">{{ $animal->age }}</span>
                    </td>
                    <td class="align-middle text-center text-md">
                      @if($animal->is_seek)
                      <span class="badge badge-sm bg-gradient-danger">{{ __('app.yes') }}</span>
                      @else
                      <span class="badge badge-sm bg-gradient-success">{{ __('app.no') }}</span>
                      @endif
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-lg mb-0">{{ $animal->farm->name }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-lg mb-0">{{ $animal->created_at->format('d/m/Y') }}</span>
                    </td>
                    <td class="align-middle">
                      <a rel="tooltip" class="btn btn-info btn-link"
                        href="{{ route('animals.show',$animal) }}" data-original-title=""
                        title="">
                        <i class="material-icons">visibility</i>
                        <div class="ripple-container"></div>
                      </a>
                      <a rel="tooltip" class="btn btn-success btn-link  font-weight-bold"
                        href="{{ route('animals.edit',$animal) }}" data-original-title=""
                        title="">
                        <i class="material-icons">edit</i>
                      </a>
                      <a href="{{ route('animals.destroy', $animal->id) }}"
                        class="btn btn-danger btn-link font-weight-bold"
                        data-toggle="tooltip" data-original-title="Delete user"
                        onclick="event.preventDefault(); if(confirm('{{ ('Are you sure you want to delete this user?') }}')){ document.getElementById('delete-form-{{ $animal->id }}').submit(); }"
                        {{ Auth::id() === $animal->id ? 'disabled' :''}}>
                        <i class="material-icons">delete</i>
                      </a>
                      <form id="delete-form-{{ $animal->id }}" action="{{ route('animals.destroy', $animal->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                      </form>
                        <a href="{{ route('animals.movements.index', $animal->id) }}" class="btn btn-light btn-link font-weight-bold text-xs"
                          data-toggle="tooltip" data-original-title="{{ __('Movements') }}">
                          {{-- __('Movements') --}}
                          <i class="material-icons">sync_alt</i>
                        </a>
                        {{-- <a href="{{ route('animals.treatments', $animal->id) }}" class="text-secondary font-weight-bold text-xs mx-3"
                        data-toggle="tooltip" data-original-title="{{ __('Treatments') }}">
                        {{ __('Treatments') }}
                        </a>
                        <a href="{{ route('animals.vaccinations', $animal->id) }}" class="text-secondary font-weight-bold text-xs"
                          data-toggle="tooltip" data-original-title="{{ __('Vaccinations') }}">
                          {{ __('Vaccinations') }}
                        </a>
                        --}}
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
</main>
@endsection