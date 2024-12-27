@extends('layouts.master')
@section('main-content')
<link rel="stylesheet" href="{{ asset('asset/style.css') }}">


<div class="container my-5">
    <div class="row">
        <div class="col-md-7">
            <div class="row mb-3">
                <!-- Gallery Thumbnails -->
                <div class="col-3 col-3 overflow-kain">
                    <div class="nav flex-column nav-pills product-gallery" id="gallery-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="produk-1-tab" data-bs-toggle="pill" data-bs-target="#produk-1" type="button" role="tab" aria-controls="produk-1" aria-selected="true">
                            <img src="asset/img/tenda ukuran 10 orang.jpg" alt="Thumbnail 1" class="img-fluid">
                        </button>
                        <button class="nav-link" id="produk-2-tab" data-bs-toggle="pill" data-bs-target="#produk-2" type="button" role="tab" aria-controls="produk-2" aria-selected="false">
                            <img src="asset/img/tenda ukuran 10 orang.jpg" alt="Thumbnail 2" class="img-fluid">
                        </button>
                        <button class="nav-link" id="produk-3-tab" data-bs-toggle="pill" data-bs-target="#produk-3" type="button" role="tab" aria-controls="produk-3" aria-selected="false">
                            <img src="asset/img/tenda ukuran 10 orang.jpg" alt="Thumbnail 3" class="img-fluid">
                        </button>
                        <button class="nav-link" id="produk-4-tab" data-bs-toggle="pill" data-bs-target="#produk-4" type="button" role="tab" aria-controls="produk-4" aria-selected="false">
                            <img src="asset/img/tenda ukuran 10 orang.jpg" alt="Thumbnail 4" class="img-fluid">
                        </button>
                    </div>
                </div>
                <!-- Main Image -->
                <div class="col-9 d-flex justify-content-center align-items-center product-img-bungkus">
                    <div class="tab-content product-main-image" id="gallery-tabContent">
                        <div class="tab-pane fade show active" id="produk-1" role="tabpanel" aria-labelledby="produk-1-tab">
                            <img src="asset/img/tenda ukuran 10 orang.jpg" alt="Gamis Hitam" class="img-fluid">
                         
                        </div>
                        <div class="tab-pane fade" id="produk-2" role="tabpanel" aria-labelledby="produk-2-tab">
                            <img src="asset/img/tenda ukuran 10 orang.jpg"  class="img-fluid">
                        </div>
                        <div class="tab-pane fade" id="produk-3" role="tabpanel" aria-labelledby="produk-3-tab">
                            <img src="asset/img/tenda ukuran 10 orang.jpg"  class="img-fluid">
                        </div>
                        <div class="tab-pane fade" id="produk-4" role="tabpanel" aria-labelledby="produk-4-tab">
                            <img src="asset/img/tenda ukuran 10 orang.jpg"  class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-5 product-details">
            <h2 class="fw-bold">TENDA CAMPING SIZE 4 ORANG 200CM X 200CM</h2>
        
            <table class="table table-borderless">
                <tbody>
                  <tr>
                    <th scope="row">Merk</th>
                    <td>: Eiger</td>
                  </tr>
                  <tr>
                    <th scope="row">Kapasitas</th>
                    <td>: 4 orang</td>
                  </tr>
                  <tr>
                    <th scope="row">Fungsi</th>
                    <td>: Camping, Outdoor, hiking.</td>
                  </tr>
                </tbody>
              </table>
        </div>
    </div>
</div>


@endsection