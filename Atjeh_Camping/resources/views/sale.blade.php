@extends('layouts.master')
@section('main-content')
{{-- <link rel="stylesheet" href="{{ asset('asset/style.css') }}"> --}}

<!-- Pop-up Pertama -->

<!-- Konten Halaman -->

<div class="container mt-5">
  <div class="row">
    <div class="col-md-3 col-12 ">
      <div class="p-4 filter-content" style="position: sticky; top: 150px; background-color: #fff; z-index: 10; border: 1px solid #ddd; border-radius: 5px;">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <span class="filter-title">Pilih Kategori Anda Disini</span>
        </div>

        <!-- Category -->
        <div class="mb-4">
          <p class="mb-2">Category</p>
          <div class="filter-category d-flex flex-wrap gap-2">
            <button class="btn btn-outline-secondary active category-filter" data-category="all">All</button>
            <button class="btn btn-outline-secondary category-filter" data-category="Alat Tidur">Alat Tidur</button>
            <button class="btn btn-outline-secondary category-filter" data-category="Alat Penerangan">Alat Penerangan</button>
            <button class="btn btn-outline-secondary category-filter" data-category="Alat Daki">Alat Daki</button>
            <button class="btn btn-outline-secondary category-filter" data-category="Alat Memasak">Alat Memasak</button>
            <button class="btn btn-outline-secondary category-filter" data-category="Alat lainnya">Alat lainnya</button>
          </div>
        </div>



        <!-- Price Range -->
        <div class="mb-4">
          <p class="mb-2">Price Range</p>
          <div class="row g-2">
            <div class="col">
              <input type="number" id="minPrice" class="form-control" placeholder="Min Price">
            </div>
            <div class="col">
              <input type="number" id="maxPrice" class="form-control" placeholder="Max Price">
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
      <div class="content-section">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
          @foreach($data as $item)
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
              <div class="d-flex justify-content-between align-items-center px-3 mb-2">
                <p class="text-warning small my-0">{{ $item->merk }}</p>
                <div class="d-flex gap-2">
                  <button type="button" class="fas fa-info-circle" style="color: black; border: none; background: none;" data-bs-toggle="modal" data-bs-target="#productModal" data-nama="{{ $item->nama }}" data-harga="{{ number_format($item->harga, 0, ',', '.') }}" data-merk="{{ $item->merk }}" data-image="{{ env('APP_ASSET').$item->image_url }}" data-stok="{{ $item->stok_barang }}" data-fungsi="{{ $item->deskripsi }}">
                  </button>
                  {{-- <button type="button" class="fas fa-info-circle" style="color: #63E6BE; border: none; background: none;" id="" data-barangid="{{ $item->id }}"></button> --}}
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
  <footer class="bg-dark text-light py-4 ">
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
            <iframe width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.2339382827895!2d95.32007377503241!3d5.53227619444794!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304039700534ac73%3A0x9eefe454edbf24eb!2sAtjeh%20Camping!5e0!3m2!1sid!2sid!4v1732959605226!5m2!1sid!2sid" style="border: 0;"></iframe>
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
  </footer>
</div>



@endsection


@push('scripts')

{{-- modal1 --}}
<div class="modal fade" id="popupKeranjang" tabindex="-1" aria-labelledby="popupLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="popupLabel">Buat Keranjang!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Anda Harus Memiliki Keranjang Terlebih Dulu Sebelum Melakukan Sewa Barang!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light border border-gray" data-bs-dismiss="modal">Nanti</button>
        <button type="button" id="openFormModal" class="btn btn-warning" style="color: white">Buat Keranjang</button>
      </div>
    </div>
  </div>
</div>

{{-- modal2 --}}
<div class="modal fade" id="formKeranjang" tabindex="-1" aria-labelledby="formPopupLabel" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formPopupLabel">Buat Keranjang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-content p-4">
        <!-- Tambahkan method POST dan action ke route keranjang.store -->
        <form id="buatKeranjangForm">
          @csrf
          <!-- Laravel CSRF Token -->
          <div class="mb-3">
            <label for="namakeranjang" class="form-label">Nama Keranjang</label>
            <input type="text" class="form-control" id="namakeranjang" name="nama_keranjang" placeholder="Camp too...." required>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="startDate" class="form-label">Mulai Sewa</label>
              <input type="date" id="startDate" name="tanggal_mulai" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="endDate" class="form-label">Akhir Sewa</label>
              <input type="date" id="endDate" name="tanggal_selesai" class="form-control" required>
            </div>
          </div>
          <div class="mb-3">
            <label for="tujuankeranjang" class="form-label">Tujuan Sewa</label>
            <textarea class="form-control" id="tujuankeranjang" name="tujuan_sewa" rows="3" placeholder="Masukkan tujuan sewa" required></textarea>
          </div>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" form="buatKeranjangForm" class="btn btn-warning" style="height: 37px">Simpan Keranjang</button>
      </div>
    </div>
  </div>
</div>

{{-- modal tambah barang --}}
<div class="modal fade" id="modalbarangtokeranjang" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formModalLabel">Form Tambah Barang</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="buyForm">
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
          <button type="submit" form="buyForm" class="btn btn-warning" style="height: 35px" id="">Submit</button>
        </div>
      </div>
    </div>
  </div>
{{-- modal detail --}}
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content shadow-lg border-0 rounded-4">
      <!-- Modal Header -->
      <div class="modal-header bg-warning text-white rounded-top-4">
        <h5 class="modal-title" id="productModalLabel">Detail Produk</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body p-4">
        <div class="container">
          <div class="row">
            <!-- Gallery Thumbnails -->
            <div class="col-md-7">
              <div class="row mb-3">

                <!-- Main Image -->
                <div class="col-9 d-flex justify-content-center align-items-center">
                  <div class="tab-content" id="gallery-tabContent">
                    <div class="tab-pane fade show active" id="produk-1" role="tabpanel" aria-labelledby="produk-1-tab">
                      <img id="thumbnail-1" src="" alt="Gambar Utama 1" class="img-fluid rounded shadow">
                    </div>
                    <!-- Add other images as necessary -->
                  </div>
                </div>
              </div>
            </div>

            <!-- Product Details -->
            <div class="col-md-5">
              <h3 id="productName" class="fw-bold text-uppercase mb-4 text-center"></h3>
              <table class="table table-borderless">
                <tbody>
                  <tr>
                    <th scope="row">Merk</th>
                    <td id="productMerk">: </td>
                  </tr>
                  <tr>
                    <th scope="row">Kapasitas</th>
                    <td id="productKapasitas">: </td>
                  </tr>
                  <tr>
                    <th scope="row">Fungsi</th>
                    <td id="productFungsi">: </td>
                  </tr>
                  <tr>
                    <th scope="row">Stok</th>
                    <td id="productStok">: </td>
                  </tr>
                  <tr>
                    <th scope="row">Harga</th>
                    <td id="productHarga">: </td>
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

{{-- mengirim filter --}}
<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Ambil parameter dari URL
    const urlParams = new URLSearchParams(window.location.search);
    const selectedCategory = urlParams.get('category') || 'all'; // Default ke 'all' jika kosong
    const minPrice = urlParams.get('min_price') || '';
    const maxPrice = urlParams.get('max_price') || '';

    // Aktifkan tombol kategori sesuai pilihan di URL
    document.querySelectorAll('.category-filter').forEach(button => {
      button.classList.remove('active'); // Reset semua tombol
      if (button.getAttribute('data-category') === selectedCategory) {
        button.classList.add('active'); // Tambahkan active pada kategori yang sesuai
      }
    });

    // Isi input harga jika ada di URL
    document.getElementById('minPrice').value = minPrice;
    document.getElementById('maxPrice').value = maxPrice;

    // Event listener untuk tombol kategori
    document.querySelectorAll('.category-filter').forEach(button => {
      button.addEventListener('click', function() {
        // Hapus status aktif dari semua tombol
        document.querySelectorAll('.category-filter').forEach(btn => btn.classList.remove('active'));
        this.classList.add('active'); // Set tombol yang dipilih sebagai aktif

        // Update URL saat tombol kategori diklik
        const category = this.getAttribute('data-category');
        const url = new URL(window.location.href);
        url.searchParams.set('category', category);
        window.location.href = url.toString(); // Refresh halaman
      });
    });

    // Event listener untuk tombol apply filter
    document.querySelector('.apply-filter-btn').addEventListener('click', function() {
      const minPrice = document.getElementById('minPrice').value;
      const maxPrice = document.getElementById('maxPrice').value;

      const url = new URL(window.location.href);
      url.searchParams.set('min_price', minPrice);
      url.searchParams.set('max_price', maxPrice);
      window.location.href = url.toString(); // Refresh halaman dengan filter harga
    });
  });

</script>

<script>
  // Update modal content when an info button is clicked
  const infoButtons = document.querySelectorAll('.fa-info-circle');

  infoButtons.forEach(button => {
    button.addEventListener('click', function() {
      // Get data attributes from the button
      const nama = this.getAttribute('data-nama');
      const harga = this.getAttribute('data-harga');
      const merk = this.getAttribute('data-merk');
      const image = this.getAttribute('data-image');
      const stok = this.getAttribute('data-stok');
      const fungsi = this.getAttribute('data-fungsi');

      // Update modal content
      document.getElementById('productName').textContent = nama;
      document.getElementById('productMerk').textContent = merk;
      document.getElementById('productKapasitas').textContent = stok; // Replace with actual capacity if needed
      document.getElementById('productFungsi').textContent = fungsi;
      document.getElementById('productStok').textContent = stok;
      document.getElementById('productHarga').textContent = 'Rp' + harga;

      // Update images in the modal
      document.getElementById('thumbnail-1').src = image;
      document.getElementById('mainImage').src = image;
    });
  });

</script>




<!-- JavaScript untuk Memunculkan Modal -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  $(document).on('click', '.buy-button', function () {

    console.log('masuk buy modal')
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

  $('#buyForm').on('submit', function (e) {
    e.preventDefault();
    console.log("masuk")
    // Ambil data dari modal
    const barangId = $('#id_barang').val();
    const jumlahBarang = $('#stok_barang').val();

    if (!jumlahBarang || jumlahBarang <= 0) {
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Jumlah barang harus diisi dengan benar.',
        });
        console.log('ada yang salah')
        return;
    }

    // Kirim data menggunakan AJAX
    $.ajax({
        type: "POST",
        url: `{{ route('add.to.buy') }}`, // Sesuaikan dengan route Anda
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        data: {
            id: barangId,
            jumlah: jumlahBarang,
        },
        success: function (response) {
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Barang berhasil ditambahkan ke keranjang.',
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
        error: function () {
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
