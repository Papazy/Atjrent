@extends('layouts.master')
@section('main-content')
<link rel="stylesheet" href="{{ asset('asset/style.css') }}">


{{-- <div class="container mt-5">
<h5 style="color:  #ffc107">LIST KERANJANG</h5>
<div class="cart">
    @if(empty($cart) || count($cart) == 0)
        <p>Keranjang belanja kosong.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $item)
                <tr>
                    <td><img src="{{ $item['image'] }}" class="img-thumbnail" alt="{{ $item['nama'] }}" width="100"></td>
                    <td>{{ $item['nama'] }}</td>
                    <td>Rp{{ number_format($item['harga'], 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
</div> --}}

<div class="container mt-5">
    <h5 style="color:  #ffc107">LIST BARANG BELANJAAN</h5>
    <div class="row">
      <!-- Cart Table -->
      <div class="col-md-8">
        <div class="table-responsive">
            <table class="table cart-table">
                @if(empty($cart) || count($cart) == 0)
                    <p>Keranjang belanja kosong.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Nama</th>
                                <th>Stok</th> <!-- Kolom stok baru -->
                                <th>Harga Unit</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $item)
                            <tr>
                                <td><img src="{{ $item['image'] }}" class="img-thumbnail" alt="{{ $item['nama'] }}" width="100"></td>
                                <td>{{ $item['nama'] }}</td>
                                <td>{{ $item['stok_barang'] }}</td> <!-- Tampilkan stok -->
                                <td>Rp{{ number_format($item['harga'], 0, ',', '.') }}</td>
                                <td>{{ $item['jumlah'] }}</td> <!-- Tampilkan jumlah barang -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </table>
        </div>
    </div>


      <div class="col-md-4 col-12">
        <div class="card p-4">
          <div class="card-header">Camp To Seulawah</div>
          <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
              <span class="text-muted">Total Pesanan</span>
              <span>Rp420.000</span>
            </div>
            <hr />
            <div class="mb-3">
              <!-- Shipping Option: Ambil di Tempat -->
              <div class="mb-2">
                <label class="form-check-label radio-label">Ambil di tempat</label>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="shipping"
                    id="pickupOption"
                    value="pickup"
                    checked
                  />
                  <label for="pickupOption" class="form-check-label">
                    Basecamp Atjeh Camping
                  </label>
                </div>
              </div>

              <!-- Shipping Option: Kirim ke Alamat -->
              <div class="mb-2">
                <label for="deliveryOption" class="form-check-label">Kirim ke alamat dituju</label>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="shipping"
                    id="deliveryOption"
                    value="delivery"
                  />
                  <label for="deliveryOption" class="form-check-label">
                    Kirim Ke Alamat
                  </label>
                </div>
              </div>

              <!-- Dropdown Kabupaten (Hidden by Default) -->
              <div id="kabupatenDropdown" class="mt-3" style="display: none;">
                <label for="kabupaten" class="form-label">Pilih Kabupaten:</label>
                <select class="form-select" id="kabupaten" name="kabupaten">
                  <option value="" selected disabled>Pilih Kabupaten</option>
                  <option value="beureneun">Beureneun</option>
                    <option value="samalanga">Samalanga</option>
                    <option value="bireun">Bireun</option>
                    <option value="redelong">Redelong</option>
                    <option value="takengon">Takengon</option>
                    <option value="angkop">Angkop</option>
                    <option value="jagong jeget">Jagong Jeget</option>
                    <option value="blang kejeuren">Blang Kejeuren</option>
                    <option value="kutacane">Kutacane</option>
                    <option value="glumpang dua">Glumpang Dua</option>
                    <option value="krueng gekuh">Krueng Gekuh</option>
                    <option value="lhokseumawe">Lhokseumawe</option>
                    <option value="geudong">Geudong</option>
                    <option value="lhoksukon">Lhoksukon</option>
                    <option value="pantom labu">Pantom Labu</option>
                    <option value="idi">Idi</option>
                    <option value="Peureulak">Peureulak</option>
                    <option value="langsa">Langsa</option>
                    <option value="sp.upak">Sp.Upak</option>
                    <option value="kuala simpang">Kuala Simpang</option>
                    <option value="sungai liput">Sungai Liput</option>
                    <option value="langkat tamiang">Langkat Tamiang</option>
                    <option value="lamno">Lamno</option>
                    <option value="calang">Calang</option>
                    <option value="teunom">Teunom</option>
                    <option value="meulaboh">Meulaboh</option>
                    <option value="jeuram">Jeuram</option>
                    <option value="alue bilie">Alue Bilie</option>
                    <option value="kuala batee">Kuala Batee</option>
                    <option value="blang pidie">Blang Pidie</option>
                    <option value="labuhan haji">Labuhan Haji</option>
                    <option value="tapak tuan">Tapak Tuan</option>
                    <option value="kota fajar">Kota Fajar</option>
                    <option value="bakongan">Bakongan</option>
                    <option value="Subulussalam">Subulussalam</option>
                    <option value="singkil">Singkil</option>
                </select>
              </div>
            </div>
            <hr />
            <!-- Upload KTP Section -->
            <div class="mb-3">
              <label for="uploadKtp" class="form-label">Unggah Foto KTP:</label>
              <input
                type="file"
                class="form-control"
                id="uploadKtp"
                accept="image/*"
              />
              {{-- <small class="form-text text-muted">Unggah foto KTP Anda dalam format JPG, PNG, atau JPEG.</small> --}}
            </div>
            <hr />
            <div class="d-flex justify-content-between mb-3">
              <span class="total-payment">Total Pembayaran</span>
              <span class="total-payment">Rp430.000</span>
            </div>
            <div class="d-grid">
              <button
                class="btn btn-payment btn bg-warning"
                id="payButton"
                disabled
              >
                Bayar Sekarang
              </button>
            </div>
          </div>
        </div>
      </div>

  @endsection


