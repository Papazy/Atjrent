@extends('layouts.master')
@section('main-content')
<!-- Konten Halaman -->

<div class="container filter mt-5">
  <div class="row">
    <div class="col-md-3 col-12">
      <div class="p-4 filter-content" style="position: sticky; top: 10px; background-color: #fff; z-index: 10; border: 1px solid #ddd; border-radius: 5px;">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <span class="filter-title">Pilih Kategori Anda Disini</span>
        </div>

        <!-- Category -->
        <div class="mb-4">
          <p class="mb-2">Category</p>
          <div class="filter-category d-flex flex-wrap gap-2">
            <button class="btn btn-outline-secondary active">Alat Tidur</button>
            <button class="btn btn-outline-secondary">Alat Penerangan</button>
            <button class="btn btn-outline-secondary">Alat Daki</button>
            <button class="btn btn-outline-secondary">Alat Memasak</button>
            <button class="btn btn-outline-secondary">Alat lainnnya</button>
          </div>
        </div>

    

        <!-- Price Range -->
        <div class="mb-4">
          <p class="mb-2">Price Range</p>
          <div class="row g-2">
            <div class="col">
              <input type="text" class="form-control" placeholder="Min Price">
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Max Price">
            </div>
          </div>
        </div>

        <!-- Apply Button -->
        <div class="text-center">
          <button class="btn apply-filter-btn w-100 py-2">Apply Filter</button>
        </div>
      </div>
    </div>


  {{-- isi halaman --}}


    <div class="col-md-9 col-12 mt-3">
      <!-- Content Section -->
      {{-- <div class="content-section">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
          @foreach($datajual as $item)
            <div class="col">
                <div class="card h-100 fixed-image-wrapper">
                    <!-- Gambar -->
                    <img src="{{ env('APP_ASSET').$item->image_url }}" class="card-img-top fixed-image" alt="{{ $item->nama }}" />
    
                    <!-- Detail Barang -->
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h6 class="card-title mb-1">{{ $item->nama }}</h6>
                        <div class="d-flex justify-content-between ">
                          <p class="text-muted small mb-2">Stok : {{ $item->stok_barang }}</p>
                          <p class="text-success mb-2" style="font-weight: bold">
                              Rp{{ number_format($item->harga, 0, ',', '.') }}
                          </p>
                        </div>
                    </div>
    
                    <!-- Merk dan Tombol Rent -->
                    <div class="d-flex justify-content-between px-3 mb-2">
                        <p class="text-warning small my-0">{{ $item->merk }}</p>
                        <button type="button" class="btn btn-warning ">Buy</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div> --}}
    <div class="content-section">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
          @foreach($datajual as $item)
          <div class="col">
              <div class="card h-100 fixed-image-wrapper">
                  <!-- Gambar -->
                  <img src="{{ env('APP_ASSET').$item->image_url }}" 
                       class="card-img-top fixed-image" 
                       alt="{{ $item->nama }}" />
  
                  <!-- Detail Barang -->
                  <div class="card-body d-flex flex-column justify-content-between">
                      <h6 class="card-title mb-1">{{ $item->nama }}</h6>
                      <div class="d-flex justify-content-between">
                          <p class="text-muted small mb-2">Stok: {{ $item->stok_barang }}</p>
                          <p class="text-success mb-2" style="font-weight: bold;">
                              Rp{{ number_format($item->harga, 0, ',', '.') }}
                          </p>
                      </div>
                  </div>
  
                  <!-- Merk dan Tombol Buy -->
                  <div class="d-flex justify-content-between align-items-center px-3 mb-2">
                      <p class="text-warning small my-0">{{ $item->merk }}</p>
                      <div class="d-flex gap-2">
                          <!-- Tombol Info -->
                          <button type="button" class="fas fa-info-circle btn btn-sm" 
                                  style="color: black; border: none; background: none;" 
                                  data-bs-toggle="modal" 
                                  data-bs-target="#productModal" 
                                  data-barangid="{{ $item->id }}">
                          </button>
  
                          <!-- Tombol Buy -->
                          <button type="button" class="btn btn-warning btn-sm buy-button" 
                                  data-id="{{ $item->id }}" 
                                  data-nama="{{ $item->nama }}" 
                                  data-harga="{{ $item->harga }}" 
                                  data-stok="{{ $item->stok_barang }}"
                                  data-image="{{ env('APP_ASSET').$item->image_url }}">
                              Buy
                          </button>
                      </div>
                  </div>
              </div>
          </div>
          @endforeach
      </div>
  </div>
  
  </div>
</div>
  {{-- <footer class="bg-dark text-light py-4 ">
    <div class="container">
      <div class="row">
        <!-- About Section -->
        <div class="col-md-3 mb-3">
          <h5 class="fw-bold">ATJRENT</h5>
          <p><i class="fas fa-map-marker-alt me-2"></i>Alamat: Peunyeurat, Kec. Banda Raya, Banda Aceh, Indonesia 23238</p>
          <p><i class="fas fa-phone-alt me-2"></i>Telepon: +62 853-7315-6514</p>
          <p><i class="fas fa-envelope me-2"></i>Email: AtjehCamping@gmail.com</p>
        </div>
  
        <!-- Google Maps Embed -->
        <div class="col-md-4 mb-3 offset-md-1">
          <h5 class="fw-bold">Lokasi Kami</h5>
          <div style="width: 100%; border-radius: 8px; overflow: hidden;">
            <iframe
              width="100%"
              height="200"
              frameborder="0"
              scrolling="no"
              marginheight="0"
              marginwidth="0"
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.2339382827895!2d95.32007377503241!3d5.53227619444794!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304039700534ac73%3A0x9eefe454edbf24eb!2sAtjeh%20Camping!5e0!3m2!1sid!2sid!4v1732959605226!5m2!1sid!2sid"
              style="border: 0;"
            ></iframe>
          </div>
        </div>

  
        <!-- Visit Us Section -->
        <div class="col-md-3 mb-3 offset-md-1">
          <h5 class="fw-bold">Visit Us</h5>
          <p><i class="fas fa-building me-2"></i>ATJEH CAMPING</p>
          <div class="mt-3">
            <h6 class="fw-bold">Follow Us:</h6>
            <a href="#" class="text-light me-3"><i class="fab fa-facebook fa-lg"></i></a>
            <a href="#" class="text-light me-3"><i class="fab fa-instagram fa-lg"></i></a>
            <a href="#" class="text-light me-3"><i class="fab fa-twitter fa-lg"></i></a>
                      </div>
        </div>
      </div>
    </div>
</footer> --}}

</div>

{{-- <div class="container mt-1">
  <div class="row">
    <div class="col-md-3 col-12"></div>
    <div class="col-md-9 col-12 mt-5">
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        @foreach($datajual as $item)
        <div class="col">
          <div class="card h-100">
            <!-- Gambar -->
            <img src="{{ env('APP_ASSET').$item->image_url }}" class="card-img-top fixed-image " alt="{{ $item->namabarang }}" />


            <!-- Detail Barang -->
            <div class="card-body d-flex justify-content-between">
              <h6 class="card-title">
                {{ $item->nama }} <br />
                <p class="text-muted large">{{ $item->deskripsi }}</p>
              </h6>
              <p class="text-success mb-1" style="font-weight: bold">
                {{ number_format($item->harga, 0, ',', '.') }}
              </p>
            </div>

            <!-- Merk dan Tombol Rent -->
            <div class="d-flex justify-content-between px-3">
              <h6 class="card-title">
                <p class="text-warning small">{{ $item->merk }}</p>
              </h6>
              <p class="btn bg-warning mb-2">Rent</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div> --}}
  
@endsection

@push('scripts')

{{-- modal tambah barang --}}
<div class="modal fade" id="modalbarangtokeranjang" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Form Tambah Barang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="torentdetail">
          @csrf
          <div class="mb-3">
            <label for="namabarang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="namabarang" name="namabarang" placeholder="Masukkan nama barang" readonly>
            <input type="hidden" name="id_barang" id="id_barang">
          </div>
          <div class="mb-3">
            <label for="stok_barang" class="form-label">Jumlah Stok</label>
            <input type="number" class="form-control" id="stok_barang" name="stok_barang" placeholder="Masukkan jumlah stok" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" form="torentdetail" class="btn btn-warning" style="height: 35px">Submit</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content shadow-lg border-0 rounded-4">
      <!-- Modal Header -->
      <div class="modal-header bg-warning text-white rounded-top-4">
        <h5 class="modal-title " id="productModalLabel">Detail Produk</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <!-- Modal Body -->
      <div class="modal-body p-4">
        <div class="container">
          <div class="row">
            <!-- Gallery Thumbnails -->
            <div class="col-md-7">
              <div class="row mb-3">
                <div class="col-3 overflow-auto">
                  <div class="nav flex-column nav-pills" id="gallery-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active mb-2 p-1 shadow-sm" id="produk-1-tab" data-bs-toggle="pill" data-bs-target="#produk-1" type="button" role="tab" aria-controls="produk-1" aria-selected="true">
                      <img src="asset/img/tenda ukuran 10 orang.jpg" alt="Thumbnail 1" class="img-fluid rounded">
                    </button>
                    <button class="nav-link mb-2 p-1 shadow-sm" id="produk-2-tab" data-bs-toggle="pill" data-bs-target="#produk-2" type="button" role="tab" aria-controls="produk-2" aria-selected="false">
                      <img src="asset/img/tenda ukuran 10 orang.jpg" alt="Thumbnail 2" class="img-fluid rounded">
                    </button>
                    <button class="nav-link mb-2 p-1 shadow-sm" id="produk-3-tab" data-bs-toggle="pill" data-bs-target="#produk-3" type="button" role="tab" aria-controls="produk-3" aria-selected="false">
                      <img src="asset/img/tenda ukuran 10 orang.jpg" alt="Thumbnail 3" class="img-fluid rounded">
                    </button>
                    <button class="nav-link mb-2 p-1 shadow-sm" id="produk-4-tab" data-bs-toggle="pill" data-bs-target="#produk-4" type="button" role="tab" aria-controls="produk-4" aria-selected="false">
                      <img src="asset/img/tenda ukuran 10 orang.jpg" alt="Thumbnail 4" class="img-fluid rounded">
                    </button>
                  </div>
                </div>
                <!-- Main Image -->
                <div class="col-9 d-flex justify-content-center align-items-center">
                  <div class="tab-content" id="gallery-tabContent">
                    <div class="tab-pane fade show active" id="produk-1" role="tabpanel" aria-labelledby="produk-1-tab">
                      <img src="asset/img/tenda ukuran 10 orang.jpg" alt="Gambar Utama 1" class="img-fluid rounded shadow">
                    </div>
                    <div class="tab-pane fade" id="produk-2" role="tabpanel" aria-labelledby="produk-2-tab">
                      <img src="asset/img/tenda ukuran 10 orang.jpg" alt="Gambar Utama 2" class="img-fluid rounded shadow">
                    </div>
                    <div class="tab-pane fade" id="produk-3" role="tabpanel" aria-labelledby="produk-3-tab">
                      <img src="asset/img/tenda ukuran 10 orang.jpg" alt="Gambar Utama 3" class="img-fluid rounded shadow">
                    </div>
                    <div class="tab-pane fade" id="produk-4" role="tabpanel" aria-labelledby="produk-4-tab">
                      <img src="asset/img/tenda ukuran 10 orang.jpg" alt="Gambar Utama 4" class="img-fluid rounded shadow">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Product Details -->
            <div class="col-md-5">
              <h3 class="fw-bold text-uppercase mb-4 text-center">Tenda Camping</h3>
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
                    <td>: Camping, Outdoor, Hiking</td>
                  </tr>
                </tbody>
              </table>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  $(document).on('click', '.buy-button', function () {
    // Ambil data dari tombol
    const barangId = $(this).data('id');
    const namaBarang = $(this).data('nama');
    const hargaBarang = $(this).data('harga');
    const stokBarang = $(this).data('stok');
    const imageBarang = $(this).data('image');
  
    // Isi data modal
    $('#namabarang').val(namaBarang);
    $('#id_barang').val(barangId);
    $('#jumlahbarang').attr('max', stokBarang);
    $('#harga_barang').text(hargaBarang);
    $('#image_barang').attr('src', imageBarang);
  
    // Tampilkan modal
    $('#modalbarangtokeranjang').modal('show');
  });
  
  // Proses submit dari modal
  $('#submitModalButton').on('click', function (e) {
    e.preventDefault();
  
    const barangId = $('#id_barang').val();
    const jumlahBarang = $('#jumlahbarang').val();
    const rentsId = $('#rents_id').val();
  
    if (!jumlahBarang || !rentsId) {
      Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: 'Silakan lengkapi semua data sebelum menambahkan.',
      });
      return;
    }
  
    // Kirim data menggunakan AJAX
    $.ajax({
      type: "POST",
      url: `{{ route('add.to.cart') }}`, // Sesuaikan dengan route Anda
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}',
      },
      data: {
        id: barangId,
        jumlah: jumlahBarang,
        rents_id: rentsId,
      },
      success: function (response) {
        if (response.success) {
          Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Barang berhasil ditambahkan.',
            showConfirmButton: false,
            timer: 1500
          });
          $('#modalbarangtokeranjang').modal('hide'); // Tutup modal
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: response.message || 'Terjadi kesalahan.',
          });
        }
      },
      error: function (xhr, status, error) {
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Terjadi kesalahan pada server.',
        });
      }
    });
  });
  </script>
  
@endpush