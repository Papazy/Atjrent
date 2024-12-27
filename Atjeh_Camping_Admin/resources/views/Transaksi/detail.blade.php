@extends('layouts.admin')

@push('css')
<!-- Custom styles for this page -->
<link href="{{ url('') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-0 text-gray-800 mb-4">Detail Transaksi Jual</h1>

<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="font-weight-bold text-primary">Informasi Transaksi</h6>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-5">
                        <table>
                            <tr>
                                <td class="pb-2"><strong>Nama Pembeli </strong></td>
                                <td class="pb-2">: {{ $jual->user->name }}</td>
                            </tr>
                            {{-- <tr>
                                <td class="pb-2"><strong>Alamat:</strong></td>
                                <td class="pb-2">{{ $jual->user->alamat }}</td>
                            </tr> --}}
                            <tr>
                                <td class="pb-2"><strong>Email</strong></td>
                                <td class="pb-2">: {{ $jual->user->email }}</td>
                            </tr>
                            <tr>
                                <td class="pb-2"><strong>Tanggal Transaksi</strong></td>
                                <td class="pb-2">: {{ $jual->created_at->format('d M Y, H:i') }}</td>
                            </tr>

                        </table>
                    </div>
                    <div class="col-md-3">
                        <table>
                        <tr>
                            <td class="pb-2"><strong>Barang </strong></td>
                            <td class="pb-2">: {{ $jual->barangs[0]->nama }}</td>
                        </tr>
                        <tr>
                            <td class="pb-2"><strong>Jumlah</strong></td>
                            <td class="pb-2">: {{ $jual->stok_barang }}</td>
                        </tr>
                        <tr>
                            <td class="pb-2"><strong>Harga</strong></td>
                            <td class="pb-2">: Rp{{ number_format($jual->harga_total, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td class="pb-2"><strong>Harga Total</strong></td>
                            <td class="pb-2">:<strong> Rp{{ number_format($jual->harga_total*$jual->stok_barang, 0, ',', '.') }}</strong></td>
                        </tr>
                        <tr>
                            <td class="pb-2"><strong>Status</strong></td>
                            <td class="pb-2">:<strong> </strong></td>
                        </tr>

                    </table>
                    </div>
                    <div class="col-md-3">
                        <img  class="pt-0 mt-0" src={{ url('uploads') ."/". $jual->barangs[0]->image_url }} style="width:200px" alt={{ $jual->barangs[0]->nama }}>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ "/transaksi/jual" }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
