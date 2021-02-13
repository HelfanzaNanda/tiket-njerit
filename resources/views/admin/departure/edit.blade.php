@extends('layouts.admin')
@section('content')
  @if ($message = Session::get('success'))
      <x-alert-success message="{{ $message }}" />
  @endif
  <div class="card border border-primary border-1">
      <div class="card-header bg-primary text-white">Tambah Keberangkatan</div>
      <div class="card-body bg-white">
          <form action="{{ route('admin.departure.edit', $departure->id) }}" method="POST" >
              @csrf
              @method('put')
              <div class="form-group">
                <label for="car">Mobil</label>
                <select name="car" id="car" class="form-control select"> 
                    @foreach ($cars as $car)
                        <option value="{{ $car->id }}" {{ $departure->car_id == $car->id ? 'selected' : '' }}>{{ $car->name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="origin">Asal</label>
                    <input type="text" id="origin" name="origin" class="form-control" value="{{ $departure->origin }}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="dest">Tujuan</label>
                    <input type="text" id="dest" name="dest" class="form-control" value="{{ $departure->dest }}">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="price">Harga</label>
                <input type="text" id="price" name="price" class="form-control" value="{{ $departure->price }}">
              </div>

              <div class="form-group">
                <label for="days[]">Hari</label>
                <select name="days[]" id="days[]" multiple class="form-control select">
                    @foreach ($days as $day)
                            <option value="{{ $day }}" 
                                @foreach (explode(",", $departure->days) as $item)
                                    @if ($item == $day) selected @endif 
                                @endforeach >{{ $day }}
                            </option>
                    @endforeach
                </select>
              </div>
              
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
      </div>
  </div>
@endsection

@push('scripts')
  <script type="text/javascript">
    $(document).ready(function () {
        $('.select').select2();
    });
    </script>
@endpush