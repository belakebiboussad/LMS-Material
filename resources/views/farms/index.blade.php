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
                      position</th>
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