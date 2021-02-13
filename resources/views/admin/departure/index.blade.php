@extends('layouts.admin')
@section('content')
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Mobil</th>
        <th scope="col">Asal</th>
        <th scope="col">Tujuan</th>
        <th scope="col">Harga</th>
        <th scope="col">Hari</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($departures as $departure)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $departure->car->name }}</td>
        <td>{{ $departure->origin }}</td>
        <td>{{ $departure->dest }}</td>
        <td>{{ 'Rp. '.number_format($departure->price) }}</td>
        <td>{{ $departure->days }}</td>
        <td>
          <a href="{{ route('admin.departure.edit', $departure->id) }}" class="btn btn-sn btn-warning"> edit</a>
          <a href="{{ route('admin.departure.delete', $departure->id) }}" onclick="return confirm('yakin ingin menghapus?')" class="btn btn-sn btn-danger"> delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $departures->links() }}
@endsection