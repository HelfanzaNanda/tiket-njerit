@extends('layouts.admin')
@section('content')
@if ($message = Session::get('success'))
    <x-alert-success message="{{ $message }}" />
@endif
<div class="card border border-primary border-1">
    <div class="card-header bg-primary text-white">Tambah Mobil</div>
    <div class="card-body bg-white">
        <form action="{{ route('admin.car.edit', $car->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
              <label for="name">Nama</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ $car->name }}">
            </div>
            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" id="img" required name="image">
                <label class="custom-file-label" for="img">Choose file...</label>
                <div class="invalid-feedback">Example invalid custom file feedback</div>
              </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>

@endsection