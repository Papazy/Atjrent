@extends('layouts.admin')
@push('css')
<!-- Custom styles for this page -->
<link href="{{ url('') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-0 text-gray-800 mb-4">Stok Barang</h1>

<div class="row">
  <div class="col-12">
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <div class="row">
                  <div class="col-6">
                      <h6 class="mt-2 font-weight-bold text-primary">Stok Barang</h6>
                  </div>
                  <div class="col-6">
                      <div class="text-right">
                        <button class="btn btn-primary" id="btn-create">
                            <i class="icon fas fa-plus pr-1"></i>Tambah Data</button>
                      </div>
                  </div>
                </div>
          </div>
          <div class="card-body">
              <table class="table table-bordered table-striped table_responsive" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr >
                        <th>Nama</th>
                        <th>No HP</th>
                        <th>Keranjang</th>
                        <th>Waktu Sewa</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                  </thead>
                    <tbody>
                        @foreach($rents as $data)
                        <tr>
                            <td>{{ $data->user->name }}</td>
                            <td>{{ $data->user->no_hp }}</td>
                            <td>{{ $data->nama_keranjang }}</td>
                            <td>{{  \Carbon\Carbon::parse($data->tanggal_mulai)->format('d M Y') . " - " . \Carbon\Carbon::parse($data->tanggal_selesai)->format('d M Y') }}</td>
                            <td>Rp {{ number_format($data->harga_total * abs(\Carbon\Carbon::parse($data->tanggal_mulai)->diffInDays(\Carbon\Carbon::parse($data->tanggal_selesai))), 0, ',', '.') }}</td>
                            {{-- Jumlah hari --}}



                            <td>
                                @if($data->status == 'pending' && $data->tanggal_mulai >=  \Carbon\Carbon::now())
                                <button class="btn btn-warning me-2">Pending</button>
                                @elseif($data->status == 'pending' && $data->tanggal_mulai < \Carbon\Carbon::now())
                                <button class="btn btn-danger me-2">Kedaluwarsa</button>
                                @elseif($data->status == 'terbayar')
                                <button class="btn btn-success me-2">Dibayar</button>
                                @elseif($data->status == 'dikembalikan')
                                <button class="btn btn-secondary me-2" style="font-size:14px">Dikembalikan</button>
                                @else
                                <button class="btn btn-warning me-2">Pending</button>
                                @endif
                            </td>
                            <td>
                                <a href={{ "sewa/".$data->id }} type="button" class="btn btn-info" >Detail</a>
                            </td>
                        </tr>
                        @endforeach

                  <tfoot>
                      <tr >
                        <th>Nama</th>
                        <th>No HP</th>
                        <th>Keranjang</th>
                        <th>Waktu Sewa</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                  </tfoot>
              </table>
          </div>
      </div>
</div>
</div>

@endsection @push('scripts')
