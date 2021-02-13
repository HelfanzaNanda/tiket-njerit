@extends('layouts.admin')
@section('content')
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Telp</th>
        <th scope="col">sim/ktp</th>
        <th scope="col">mobil</th>
        <th scope="col">trayek</th>
        <th scope="col">tanggal</th>
        <th scope="col">total</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($orders as $order)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $order->passanger->name }}</td>
        <td>{{ $order->passanger->phone }}</td>
        <td>{{ $order->passanger->no_unique }}</td>
        <td>{{ $order->departure->car->name }}</td>
        <td>{{ $order->departure->origin . ' - ' . $order->departure->dest}}</td>
        <td>{{ $order->date->translatedFormat('l, d M Y')}}</td>
        <td>{{'Rp. '.number_format($order->total)}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $orders->links() }}
@endsection