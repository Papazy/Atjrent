@extends('layouts.master')
@section('main-content')
<link rel="stylesheet" href="{{ asset('asset/style.css') }}">

<div class="container mt-5">

  <!-- Rental Cards -->
  <div class="row">
    <h5 style="color:  #ffc107">LIST KERANJANG</h5>
    <!-- Single Card -->
    @php
        use Carbon\Carbon;
        @endphp
    @foreach ($keranjang as $item)
    <div class="col-12">
      <div class="rental-card d-flex align-items-center justify-content-between">
        <!-- Informasi Item -->
        <div class="d-flex flex-column flex-md-row">
          <h6 class="my-2 me-3" style="color:black">
            {{ $item->nama_keranjang }}
          </h6>
          <div class="tanggal d-flex">
            <small class="text-muted">{{ date('d F Y', strtotime($item->tanggal_mulai)) }}</small>
            <small class="text-muted">{{ date('d F Y', strtotime($item->tanggal_selesai)) }}</small>
          </div>
        </div>

        <!-- Aksi -->

        <div class="d-flex align-items-center">
            @if($item->status == 'pending' && $item->tanggal_mulai >=  Carbon::now())
          <a href="{{ url('/rent/keranjang-detail/'.$item->id) }}" class="btn btn-edit me-2">Bayar</a>
          <button class="btn btn-secondary me-2">Pending</button>
          @elseif($item->status == 'pending' && $item->tanggal_mulai < Carbon::now())
          <a href="{{ url('/rent/keranjang-detail/'.$item->id) }}" class="btn btn-edit me-2">Detail</a>
          <button class="btn btn-danger me-2">kedaluwarsa</button>
          @elseif($item->status == 'terbayar')
          <a href="{{ url('/rent/keranjang-detail/'.$item->id) }}" class="btn btn-edit me-2">Detail</a>
            <button class="btn btn-success me-2">Dibayar</button>
          @elseif($item->status == 'dikembalikan')
          <a href="{{ url('/rent/keranjang-detail/'.$item->id) }}" class="btn btn-edit me-2">Detail</a>
          <button class="btn btn-info me-2" style="font-size:14px; color:white">Dikembalikan</button>
          @elseif($item->status == 'dikirim')
            <a href="{{ url('/rent/keranjang-detail/'.$item->id) }}" class="btn btn-edit me-2">Detail</a>
            <button class="btn btn-warning me-2" style="font-size:14px">Dikirim</button>
          @endif
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>




@endsection
