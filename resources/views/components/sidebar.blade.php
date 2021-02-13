  <div class="list-group mb-3">
    <small class="text-secondary d-block mb-2">Mobil</small>
    <a href="{{ route('admin.car.create') }}" class="list-group-item list-group-item-action {{ Request::is('admin/car/create') ? 'active' : '' }}">Tambah </a>
    <a href="{{ route('admin.car.index') }}" class="list-group-item list-group-item-action {{ Request::is('admin/car') ? 'active' : '' }}">Tabel</a>
  </div>

  <div class="list-group mb-3">
    <small class="text-secondary d-block mb-2">Keberangkatan</small>
    <a href="{{ route('admin.departure.create') }}" class="list-group-item list-group-item-action {{ Request::is('admin/departure/create') ? 'active' : '' }}">Tambah </a>
    <a href="{{ route('admin.departure.index') }}" class="list-group-item list-group-item-action {{ Request::is('admin/departure') ? 'active' : '' }}">Tabel</a>
  </div>

  <div class="list-group mb-3">
    <small class="text-secondary d-block mb-2">Penumpang</small>
    <a href="{{ route('admin.passanger.index') }}" class="list-group-item list-group-item-action {{ Request::is('admin/passanger') ? 'active' : '' }}">Tabel</a>
  </div>