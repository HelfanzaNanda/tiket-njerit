@extends('layouts.app')
@section('content')

<div class="row my-3">
    <div class="col-md-6">
        <img src="{{ asset('uploads/car/'.$departure->car->filename) }}" height="300" width="500">
    </div>
    <div class="col-md-6">
        <h4>{{'Nama PO : '. $departure->car->user->name }}</h4>
        <p>{{'Trayek : '. $departure->origin .' - '. $departure->dest }}</p>
        <p>{{'Harga : Rp. '. number_format($departure->price) }}</p>
        <p>{{'Hari Keberangkatan : '. $departure->days }}</p>
        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#orderModal">Pesan</button>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <form action="{{ route('user.order') }}" method="POST">
              @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <p>silahkan isi data diri anda</p>
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control" name="name" required>
                        <input type="hidden" name="id" value="{{ $departure->id }}">
                    </div>
                    <div class="form-group">
                        <label for="phone">No Hp</label>
                        <input type="tel" class="form-control" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="no_unique">No SIM / KTP</label>
                        <input type="number" class="form-control" name="no_unique" required>
                    </div>
                    <div class="form-group">
                        <label for="no_unique">Tanggal</label>
                        <input type="text" class="form-control datepicker" readonly style="background: white" name="date" id="date" placeholder="Kapan?" value="{{ $date ?? '' }}" required>
                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Order</button>
              </div>
          </form>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
<script>
    const weekday = new Array(7);
    weekday[0]="Minggu";
    weekday[1]="Senin";
    weekday[2]="Selasa";
    weekday[3]="Rabu";
    weekday[4]="Kamis";
    weekday[5]="Jumat";
    weekday[6]="Sabtu";

    $(document).ready( () => {
        $('.datepicker').datepicker();
    })
</script>

@endpush