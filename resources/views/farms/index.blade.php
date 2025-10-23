@extends('layouts.app')
@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header">
            <div class="bg-gradient-primary shadow-primary border-radius-lg">
              <h6 class="text-white mx-3"></h6>
            </div>
          </div>
          <div class="me-3 my-3 text-end">
            <a class="btn mb-0" href="{{ route('farms.create') }}"><i
                class="material-icons text-sm">add</i>&nbsp;&nbsp;
              {{ __('Farm add') }}
            </a>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th
                      class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      nom</th>
                    <th
                      class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                      Propriaitaire</th>
                    <th
                      class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      Wilaya
                    </th>
                    <th
                      class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      Longitude</th>
                    <th
                      class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      Latitude</th>

                    <th
                      class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      Date création</th>

                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($farms as $farm)
                  <tr>
                    <td>
                      <div class="text-xs mb-0">
                        <p> {{ $farm->name }}</p>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs mb-0">
                        {{ $farm->owner->name }}
                      </p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span
                        class="badge badge-sm bg-gradient-success">{{ $farm->wilaya->name }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span
                        class="text-secondary text-xs">{{ $farm->x_lon }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span
                        class="text-secondary text-xs">{{ $farm->y_lat }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span
                        class="text-secondary text-xs">{{ $farm->created_at->format('H:i:s d/m/Y') }}</span>
                    </td>

                    <td class="align-middle">
                      <a rel="tooltip" class="btn btn-success btn-link"
                        href="{{ route('farms.edit',$farm) }}" data-original-title=""
                        title="">
                        <i class="material-icons">edit</i>
                        <div class="ripple-container"></div>
                      </a>
                      <form action="{{ route('farms.destroy',$farm) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-link">
                          <i class="material-icons" style="font-size: 14px;">close</i>
                        </button>
                      </form>
                      <div class="ripple-container"></div>
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