@extends('layouts.app')
@section('slider')
    <div class="mt-2">
        @if ($message = Session::get('success'))
            <x-alert-success-order orderId="{{ $orderId }}" message="{{ $message }}" />
        @endif
        <x-slider/>
    </div>
@endsection
@section('content')


<form action="{{ route('user.bus') }}" autocomplete="off" method="POST">
    @csrf
    <div class="d-flex">
        <input type="text" class="form-control" name="origin" placeholder="Dari mana?" value="{{ $origin ?? '' }}">
        <input type="text" class="form-control" name="dest" placeholder="Mau kemana?" value="{{ $dest ?? '' }}">
        <input type="text" class="form-control datepicker" readonly style="background: white" name="date" id="date" placeholder="Kapan?" value="{{ $date ?? '' }}">
        <input type="hidden" name="day" id="day" value="{{ $day ?? '' }}">
        <button class="btn btn-primary " type="submit">cari</button>
    </div>
</form>

<form action="{{ route('user.bus.detail') }}" method="POST" id="detail">
    @csrf
    <input type="hidden"  name="id" id="detail-id"/>
    <input type="hidden"  name="date" id="detail-date"/>
</form>

<div class="row my-3">
    @foreach ($departures as $departure)
        <div class="col-md-4">
            <div class="card" style="cursor: pointer" onclick="goDetail({{ $departure->id }})">
                <div class="card-body text-center">
                    <img class="img-responsive" width="300" height="150" src="{{ asset('uploads/car/'.$departure->car->filename) }}" style="object-fit: cover; object-position: center;">
                    <h6>{{ $departure->car->name }}</h6>
                    <P>{{ $departure->car->departure['origin'] .' - '. $departure->car->departure['dest'] }}</P>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="col-md-12 text-center">
    <a href="{{ route('user.bus') }}" class="btn btn-success">Lihat Semua</a>
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
        $("#date").on('change', () => {
            date = $("#date").val();
            newDate = new Date(date);
            $('#day').val(weekday[newDate.getDay()]);
        })
    })
</script>

<script>
    function goDetail(departureId){
        date = "{{ $date ?? '' }}"
        $("#detail-id").val(departureId);
        $("#detail-date").val(date);
        $("#detail").submit();
    }
</script>
@endpush