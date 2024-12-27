@extends('layouts.admin')

@push('css')
<!-- Custom styles for this page -->
<link href="{{ url('') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-0 text-gray-800 mb-4">Detail Transaksi Rent</h1>

<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="font-weight-bold text-primary">Informasi Transaksi</h6>
            </div>
            <div class="card-body">
                @if($rent->barangs->count() > 0)
                <div class="row mb-3">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Nama Penyewa</strong></td>
                                <td>: {{ $rent->user->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Email</strong></td>
                                <td>: {{ $rent->user->email }}</td>
                            </tr>
                            <tr>
                                <td><strong>Nama Keranjang</strong></td>
                                <td>: {{ $rent->nama_keranjang }}</td>
                            </tr>
                            <tr>
                                <td><strong>Tanggal Mulai</strong></td>
                                <td>: {{ $rent->tanggal_mulai }}</td>
                            </tr>
                            <tr>
                                <td><strong>Tanggal Selesai</strong></td>
                                <td>: {{ $rent->tanggal_selesai }}</td>
                            </tr>
                            <tr>
                                <td><strong>Total Harga</strong></td>
                                <td>: Rp{{ number_format($rent->harga_total, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Status</strong></td>
                                <td>: {{ ucfirst($rent->status) }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6 class="font-weight-bold text-primary">Tujuan Sewa</h6>
                        <p>{{ $rent->tujuan_sewa }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <h6 class="font-weight-bold text-primary">Daftar Barang yang Disewa</h6>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Deskripsi</th>
                                        <th>Harga Satuan</th>
                                        <th>Jumlah</th>
                                        <th>Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rent->barangs as $barang)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $barang->nama }}</td>
                                        <td>{{ $barang->deskripsi }}</td>
                                        <td>Rp{{ number_format($barang->harga, 0, ',', '.') }}</td>
                                        <td>{{ $barang->stok_barang }}</td>
                                        <td>Rp{{ number_format($barang->harga * $barang->stok_barang, 0, ',', '.') }}</td>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5" class="text-right">Grand Total</th>
                                        <th>
                                            Rp{{ number_format($rent->barangs->sum(fn($d) => $d->harga * $d->stok_barang), 0, ',', '.') }}
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        @else
                        <div class="alert alert-danger">
                            Belum ada barang
                        </div>
                        @endif
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12 text-right">
                        <a href="/transaksi/sewa" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
