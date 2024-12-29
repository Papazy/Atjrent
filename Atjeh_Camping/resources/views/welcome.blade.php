<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Beranda</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&family=Teko:wght@300..700&display=swap" rel="stylesheet">

  <style>
    /* Custom CSS untuk meniru tampilan visual */

    .banner {
      font-family: "Black Ops One", serif;
      color: white;
      /* Warna teks utama (warna warning) */
      text-align: start;
      padding: 20px;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6),
        -1px -1px 2px rgba(255, 255, 255, 0.3);
      /* Shadow lebih keren */
    }


    .nav-link:hover,
    .nav-link :active {
      color: black;
    }


    .card-img-top {
      /* block-size: 200px; Sesuaikan tinggi gambar */
      object-fit: cover;
    }

    .carousel-inner {
      display: flex;
      /* Membuat elemen di dalamnya berjajar horizontal */
      overflow: hidden;
    }

    .carousel-item {
      flex: 0 0 100%;
      /* Setiap item mengambil 100% dari lebar carousel */
      display: flex;
      /* Agar konten di dalam carousel-item bisa diatur dengan flexbox */
      justify-content: center;
      /* Mengatur elemen di tengah secara horizontal */
      align-items: center;
      /* Mengatur elemen di tengah secara vertikal */
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
      background-color: black;
      /* Warna hitam */
      background-size: 100%;
      /* Sesuaikan ukuran ikon */
      border-radius: 50%;
      /* Opsional, untuk membuat lingkaran */
    }

    /* Opsional: Tambahkan efek hover untuk tombol */
    .carousel-control-prev-icon:hover,
    .carousel-control-next-icon:hover {
      background-color: #333;
    }

    /* Warna saat hover */

    .cards-wrapper {
      display: flex;
      /* Untuk membuat kartu di dalam wrapper berjajar horizontal */
      gap: 15px;
      /* Memberikan jarak antar kartu */
    }

    .card {
      /* flex: 1; Membuat kartu mengambil ruang yang sama */
      /* max-inline-size: calc(100% / 3); Batasan maksimal 3 kartu per baris */
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      /* margin-right: 20px; */
    }

    .card-text {
      font-size: 35px;
      font-family: "Courier New", Courier, monospace;
      font-weight: bold;
      color: #004f44;
    }

    .box {
      inline-size: 500px;
    }

    .box .search-box {
      position: relative;
      block-size: 50px;
      inline-size: 90%;
      max-inline-size: 50px;
      margin: auto;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.25);
      border-radius: 25px;
      transition: all 0.3s ease;
    }

    #check:checked~.search-box {
      max-inline-size: 1000px;
    }

    .search-box input {
      position: right;
      block-size: 100%;
      inline-size: 100%;
      border-radius: 25px;
      background: #fff;
      outline: none;
      border: black;
      padding-inline-start: 20px;
      font-size: 18px;
    }

    .search-box .icon {
      position: absolute;
      inset-inline-end: -2px;
      inset-block-start: 0;
      inline-size: 50px;
      background: #fff;
      block-size: 100%;
      text-align: center;
      line-height: 50px;
      color: black;
      font-size: 20px;
      border-radius: 25px;
    }

    .box-image {
      padding: 5px;
      block-size: 90%;
      box-shadow: 4px 7px 7px 0px #00000402;
      border-radius: 25px;
      transition: 400ms;
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
    }

    .box-image2 {
      padding: 10px;
      block-size: 45%;
      box-shadow: 4px 7px 7px 0px #00000402;
      border-radius: 25px;
      transition: 400ms;
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
    }

    .box-image img,
    .box-image2 img {
      block-size: 100%;
      inline-size: 100%;
      border-radius: 30px !important;
    }

    #check:checked~.search-box .icon {
      background: #f2a01c;
      color: #fff;
      inline-size: 60px;
      border-radius: 0 25px 25px 0;
    }

    #check {
      display: none;
    }


    /* for rent and sale */
    /* Gambar */
    .fixed-image {
      width: 100%;
      height: 300px;
      /* Konsistensi tinggi gambar */
      object-fit: cover;
      /* Pastikan gambar tidak terdistorsi */
      border-radius: 8px 8px 0 0;
      padding: 10px;
    }

    /* Card */
    .card {
      border: 1px solid #e0e0e0;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .card-title {
      font-size: 14px;
      font-weight: bold;
      color: #333;
      margin-bottom: 5px;
    }

    .card-body p {
      font-size: 13px;
      line-height: 1.5;
      color: #666;
    }

    .text-success {
      font-size: 14px;
      font-weight: bold;
      color: #28a745;
    }

    .text-warning {
      font-size: 12px;
      color: #ffc107;
    }

    /* Tombol */
    .btn-warning {
      background-color: #ffc107;
      border: none;
      color: #fff;
      padding: 5px 10px;
      font-size: 12px;
      font-weight: bold;
      border-radius: 5px;
    }

    .btn-warning:hover {
      background-color: #e0a800;
    }

    /* Spacing */
    .card-body {
      padding: 15px;
    }

    .card-footer {
      padding: 10px 15px;
      background-color: #f8f9fa;
      border-top: 1px solid #e0e0e0;
    }

    .login-button {
      padding: 8px 20px;
      border-radius: 50px;
      font-size: 25px;
      color: white;
      text-decoration: none;
      transition: 0, 3s;
    }

    .login-button :hover {
      color: black;
    }

  </style>
</head>

<body>
  <div class="container-fluid bg-warning">
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
      <div class="container py-4">
        <a class="navbar-brand" href="#">
          <img src="{{ url('') }}/asset/img/logo atjeh camp.png" width="50" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/rent') }}">Sewa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/sale') }}">Belanja</a>
            </li>
            @if (!Auth::user())
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/login') }}">Login/Daftar</a>
            </li>
            @endif

          </ul>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <div class="box">
                <input type="checkbox" id="check" />
                <div class="search-box">
                  <input type="text" placeholder="Type here..." style="color: black" />
                  <label for="check" class="icon">
                    <i class="fas fa-search"></i>
                  </label>
                </div>
              </div>
            </li>

        </ul>
        @if(Auth::user())
          <!-- Profil Button -->
          <a href="{{ url('profil') }}" class="login-button ms-3" style="transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
            <i class="fas fa-user-circle "></i>
          </a>
        @endif
        </div>

      </div>
    </nav>

    <!-- Gambar pada header1 -->
    <div class="container">
      <div class="row d-flex align-items-stretch">
        <div class="col-md-4 bg-warning">
          <section class="banner">
            <h1 style="font-size: 80px !important">
              EXPLORE <br />
              YOUR NATURE
            </h1>


          </section>
          <button class="btn btn-lg bg-light mb-3" style="font-family: Poppins serif">Shop Now</button>
        </div>
        <div class="col bg-warning">
          <div class="box-image">
            <img style="" src="{{ url('') }}/asset/img/tas.jpeg" />
          </div>
        </div>
        <div class="col bg-warning">
          <div class="box-image2 ">
            <img style="" src="{{ url('') }}/asset/img/Nesting.jpeg" class="img-fluid rounded mb-4" />
          </div>
          <div class="box-image2 ">
            <img style="" src="{{ url('') }}/asset/img/Senter.jpeg" class="img-fluid rounded mb-5" />
          </div>
        </div>
        <div class="col">
          <div class="box-image">
            <img style="" src="{{ url('') }}/asset/img/tenda ukuran 6.jpeg" />
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- section for rent -->
  <section>
    <div class="container my-5">
      <h2>For Rent</h2>
      <div class="row">
        <div class="owl-carousel owl-theme">
          @foreach($barangSewa as $item)
          <div class="item mb-4">
            <div class="card h-100 fixed-image-wrapper">
              <!-- Gambar -->
              <img src="{{ env('APP_ASSET') . $item->image_url }}" class="card-img-top fixed-image" alt="{{ $item->image_url }}" />

              <!-- Detail Barang -->
              <div class="card-body d-flex flex-column justify-content-between">
                <h6 class="card-title mb-1">{{ $item->nama }}</h6>
                <p class="text-muted small mb-2">{{ $item->deskripsi }}</p>
                <p class="text-success mb-2" style="font-weight: bold">
                  Rp{{ number_format($item->harga, 0, ',', '.') }}
                </p>
              </div>

              <!-- Merk dan Tombol -->
              <div class="d-flex justify-content-between px-3 mb-2">
                <p class="text-warning small my-0">{{ $item->merk }}</p>
                <a href="{{ url('/checkout', ['id' => $item->id]) }}" class="btn btn-warning btn-sm">Rent</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>

  {{-- section for sale --}}
  <section>
    <div class="container my-5">
      <h2>For Sale</h2>
      <div class="row">
        <div class="owl-carousel owl-theme">
          @foreach($barangJual as $item)
          <div class="item mb-4">
            <div class="card h-100 fixed-image-wrapper">
              <!-- Gambar -->
              <img src="{{ env('APP_ASSET') . $item->image_url }}" class="card-img-top fixed-image" alt="{{ $item->image_url }}" />

              <!-- Detail Barang -->
              <div class="card-body d-flex flex-column justify-content-between">
                <h6 class="card-title mb-1">{{ $item->nama }}</h6>
                <p class="text-muted small mb-2">{{ $item->deskripsi }}</p>
                <p class="text-success mb-2" style="font-weight: bold">
                  Rp{{ number_format($item->harga, 0, ',', '.') }}
                </p>
              </div>

              <!-- Merk dan Tombol -->
              <div class="d-flex justify-content-between px-3 mb-2">
                <p class="text-warning small my-0">{{ $item->merk }}</p>
                <a href="{{ url('/checkout', ['id' => $item->id]) }}" class="btn btn-warning btn-sm">Rent</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>


    </div>


    </div>
  </section>

  <footer class="bg-dark text-light py-4 ">
    <div class="container">
      <div class="row">
        <!-- About Section -->
        <div class="col-md-3 mb-3">
          <h5 class="fw-bold" style="color: #ffc107">ATJEH CAMPING</h5>
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

            <a href="https://www.instagram.com/atjehcamping/" class="text-light me-3"><i class="fab fa-instagram fa-lg"></i></a>

          </div>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $('.owl-carousel').owlCarousel({
      loop: false
      , margin: 10
      , nav: true
      , responsive: {
        0: {
          items: 1
        }
        , 600: {
          items: 3
        }
        , 1000: {
          items: 4
        }
      }
    })

  </script>


</body>
</html>
