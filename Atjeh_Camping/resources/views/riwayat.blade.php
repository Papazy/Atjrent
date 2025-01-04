@extends('layouts.master')
@section('main-content')
<link rel="stylesheet" href="{{ asset('asset/style.css') }}">

<div class="container mt-5">

  {{-- Menampilkan history pembelian dalam table --}}
    <div class="row">
        <h5 style="color:  #ffc107">RIWAYAT PEMBELIAN</h5>
        <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Jumlah Barang</th>
            <th scope="col">Status</th>
            <th scope="col">Lokasi Pengambilan</th>
            <th scope="col">Total Harga</th>
            <th scope="col">Tanggal Pembelian</th>
            </tr>
        </thead>
        <tbody>
            @php
            use Carbon\Carbon;
            @endphp
            @foreach ($items as $item)
            <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $item->barang->nama }}</td>
            <td>{{ $item->stok_barang }}</td>
            <td>
                <button class="btn btn-success me-2 " style="font-size:14px">Terbayar</button>
            </td>
            <td>{{ $item->lokasi_pengambilan }}</td>
            <td>{{ $item->harga_total + $item->ongkir }}</td>
            <td>{{ date('d F Y', strtotime($item->created_at)) }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
        <div class=""></div>
</div>



@endsection
