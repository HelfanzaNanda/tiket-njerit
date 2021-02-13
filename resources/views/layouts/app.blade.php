@extends('layouts.base')
@section('baseStyles')
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" /> --}}
  <link rel="stylesheet" href="{{ asset('bootstrap-datepicker/css/datepicker.css') }}">
@endsection
@section('baseScripts')
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script> --}}
  <script src="{{ asset('bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
  @stack('scripts')
@endsection
@section('body')
    <x-navbar/>
    <div class="container-fluid">
        @hasSection ('slider')
            @yield('slider')
        @else
            {{ null }}
        @endif
        <div class="row mt-4">
            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>
@endsection