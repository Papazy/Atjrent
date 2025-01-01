@extends('layouts.admin')

@section('main-content')
<div class="card p-3" style="width:100%">

    <div class="row">
        <!-- Card: Jumlah Barang -->
        <div class="col-md-4">
          <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5 class="card-title">Jenis Barang</h5>
                <h6 class="card-subtitle mb-1">Total:</h6>
                <p class="card-text" style="font-size: 36px">{{$totalBarang }}</p>
                <hr>
                <div >
                    <div class="row">
                        <div class="col-6">
                            <h6 class="card-subtitle mb-2">untuk Sewa:</h6>
                            <p class="card-text" style="font-size: 20px">{{ $totalBarangSewa }}</p>
                        </div>
                        <div class="col-6">
                            <h6 class="card-subtitle mb-2">untuk Jual:</h6>
                            <p class="card-text" style="font-size: 20px">{{ $totalBarangJual }}</p>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>

        <!-- Card: Jumlah Transaksi Hari Ini -->
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
              <div class="card-body">
                <h5 class="card-title">Transaksi Berhasil</h5>
                <h6 class="card-subtitle mb-1">Total:</h6>
                <p class="card-text" style="font-size: 36px">{{ $totalRent + $totalJual }}</p>
                <hr>
                <div >
                    <div class="row">
                        <div class="col-6">
                            <h6 class="card-subtitle mb-2">Sewa:</h6>
                            <p class="card-text" style="font-size: 20px">{{ $totalRent }}</p>
                        </div>
                        <div class="col-6">
                            <h6 class="card-subtitle mb-2">Terjual:</h6>
                            <p class="card-text" style="font-size: 20px">{{ $totalJual }}</p>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>


        <!-- Card: Lainnya -->
        <div class="col-md-4">
          <div class="card text-white bg-info mb-3">
            <div class="card-body">
              <h5 class="card-title">Jumlah Pengguna</h5>
              <h6 class="card-subtitle mb-2">Total:</h6>
              <p class="card-text display-4">{{ $totalUser }}</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <!-- Table Kiri -->
        <div class="col-md-6">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row">
                <div class="col-6">
                  <h6 class="mt-2 font-weight-bold text-primary">Stok Barang</h6>
                </div>
                <div class="col-6">
                </div>
              </div>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped table_responsive" id="dataTableLeft" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Stok</th>
                    <th>Tipe</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Data dinamis untuk tabel kiri -->
                  @foreach($barangs as $barang)
                    <tr>
                        <td>{{ $barang->nama }}</td>
                        <td>{{ $barang->stok_barang }}</td>
                        <td>{{ strtolower($barang->is_jual) }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Nama</th>
                    <th>Stok</th>
                    <th>Tipe</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>

        <!-- Table Kanan -->
        <div class="col-md-6">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row">
                <div class="col-6">
                  <h6 class="mt-2 font-weight-bold text-primary">Daftar Transaksi</h6>
                </div>
                <div class="col-6">
                </div>
              </div>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped table_responsive" id="dataTableRight" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Tanggal</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Data dinamis untuk tabel kanan -->
                  @foreach($transaksi as $data)
                    <tr>
                        <td>{{ $data->user->name }}</td>
                        <td>{{ $data->created_at }}</td>
                        {{-- Jika ada atribut nama keranjang, maka tampilan "sewa" jika tidak maka "beli" --}}
                        <td>{{ $data->nama_keranjang ? "Beli" : "Sewa" }}</td>

                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Nama</th>
                    <th>Tanggal</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>

</div>






@endsection
