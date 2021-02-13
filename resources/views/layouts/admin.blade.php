@extends('layouts.base')
@section('baseStyles')
  {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
  <link rel="stylesheet" href="{{ asset('select2/css/select2.min.css') }}">
@endsection
@section('baseScripts')
  {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
  
  {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>  --}}
  <script src="{{ asset('select2/js/select2.min.js') }}"></script>
  @stack('scripts')
@endsection
@section('body')
    <x-navbar/>
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-3">
                <x-sidebar/>
            </div>
            <div class="col-md-9">
                @yield('content')
            </div>
        </div>
    </div>
@endsection