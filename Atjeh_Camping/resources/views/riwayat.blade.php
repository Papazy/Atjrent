@extends('layouts.master')
@section('main-content')
<link rel="stylesheet" href="{{ asset('asset/style.css') }}">

<div class="container mt-5">

    <!-- Rental Cards -->
    <div class="row">
      <!-- Single Card -->
      <div class="col-12">
        <div
          class="rental-card d-flex align-items-center justify-content-between"
        >
          <div class="d-flex">
            <h6 class="my-2 me-3" style="color: #f4a261">
              Camp To Seulawah
            </h6>
            <div class="tanggal d-flex">
              <small class="text-muted me-3"
                >17 Mei 2025 - Mulai Sewa</small
              >
              <small class="text-muted me-3"
                >19 Mei 2025 - Akhir Sewa</small
              >
              <small class="price">200.000</small>
            </div>
          </div>
          <div class="d-flex align-items-center">
            <button class="btn btn-edit me-2">Ubah sewa</button>
            <button class="btn btn-custom">Pilih Keranjang</button>
            <i
              class="hapus fas fa-map-marker-alt mx-2"
              style="color: #e63946"
            ></i>
          </div>
        </div>
      </div>
    </div>
  </div>


    
  
@endsection