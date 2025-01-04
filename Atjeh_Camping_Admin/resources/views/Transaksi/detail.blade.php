@extends('layouts.admin')
<meta name="csrf-token" content="{{ csrf_token() }}">

@push('css')
<!-- Custom styles for this page -->
<link href="{{ url('') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

<style>
  .status-message {
    font-size: 14px;
    margin-top: 5px;
    color: white;
    opacity: 0;
    transition: opacity 0.5s ease-in-out;
    background-color: green;
    position: fixed;
    padding: 10px;
    border-radius: 5px;
    right: 0;
    bottom: 0;
    margin-right: 20px;
    margin-bottom: 40px;
    z-index: 9999;
  }

  .status-message.show {
    opacity: 1;
  }
</style>

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-0 text-gray-800 mb-4">Detail Transaksi Jual</h1>

<div class="row">
  <div class="col-12">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="font-weight-bold text-primary">Informasi Transaksi</h6>
        <div id="status-message-{{ $jual->id }}" class="status-message"></div>
      </div>
      <div class="card-body">
        <div class="row mb-3">
          <div class="col-md-6">
            <table class="table table-borderless">
              <tr>
                <td><strong>Nama Pembeli</strong></td>
                <td>: {{ $jual->user->name }}</td>
              </tr>
              <tr>
                <td><strong>Email</strong></td>
                <td>: {{ $jual->user->email }}</td>
              </tr>
              <tr>
                <td><strong>Tanggal Transaksi</strong></td>
                <td>: {{ $jual->created_at->format('d M Y, H:i') }}</td>
              </tr>
              <tr>
                <td>
                    <img src="{{ url('uploads') . '/' . $jual->barangs[0]->image_url }}" style="width:200px" alt="{{ $jual->barangs[0]->nama }}">
                </td>
              </tr>
            </table>
          </div>
          <div class="col-md-6">
            <table class="table table-borderless">
              <tr>
                <td><strong>Barang</strong></td>
                <td>: {{ $jual->barangs[0]->nama }}</td>
              </tr>
              <tr>
                <td><strong>Jumlah</strong></td>
                <td>: {{ $jual->stok_barang }}</td>
              </tr>
              <tr>
                  <td><strong>Harga Satuan</strong></td>
                  <td>: Rp{{ number_format($jual->barang->harga, 0, ',', '.') }}</td>
                </tr>
                <tr>
                  <td><strong>Lokasi Pengambilan</strong></td>
                  <td>: {{ $jual->lokasi_pengambilan }}</td>
                </tr>
                <tr>
                    <td><strong>Ongkir</strong></td>
                    <td>: Rp{{ number_format($jual->ongkir, 0, ',', '.') }}</td>

                </tr>
              <tr>
                <td><strong>Harga Total</strong></td>
                <td>: <strong>Rp{{ number_format($jual->harga_total  + $jual->ongkir, 0, ',', '.') }}</strong></td>
              </tr>
              <tr>
                <td><strong>Status</strong></td>
                <td>: <button class="btn btn-success">{{ ucfirst($jual->status) }}</button></td>
              </tr>

            </table>
          </div>
        </div>

        <div class="row mt-4">
          <div class="col-12 text-right">
            <a href="/transaksi/jual" class="btn btn-secondary">
              <i class="fas fa-arrow-left"></i> Kembali
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
