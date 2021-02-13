@extends('layouts.admin')
@section('content')
@if ($message = Session::get('success'))
    <x-alert-success message="{{ $message }}" />
@endif
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Foto</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($cars as $car)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $car->name }}</td>
        <td><img width="50" height="50" src="{{ asset('uploads/car/'.$car->filename) }}" alt=""></td>
        <td>
          <a href="{{ route('admin.car.edit', $car->id) }}" class="btn btn-sn btn-warning"> edit</a>
          <a href="{{ route('admin.car.delete', $car->id) }}" onclick="return confirm('yakin ingin menghapus?')" class="btn btn-sn btn-danger"> delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $cars->links() }}
@endsection
