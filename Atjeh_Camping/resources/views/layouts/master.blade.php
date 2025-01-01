<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rental Tenda</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=tune"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
<link
rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
/>


    <!-- Fonts -->
    <script src="https://kit.fontawesome.com/b69e31cf66.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">





<style>


  .modal-backdrop.show {
    display: none;
    opacity: var(--bs-backdrop-opacity);
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
.navbar-toggler {
border: none;
font-size: 1.25rem;
}
.navbar-toggler:focus,
.btn-close {
box-shadow: none;
outline: none;
}
.nav-link {
margin-left: 10px;
font-size: 15px;
font-family: "Source Code Pro", Arial, Helvetica, sans-serif;
color: white;
position: relative;
}
.nav-link:hover,
.nav-link :active {
color: black;
}


/* Warna dan Font */
.card {
    background-color: #f9f9f9; /* Latar belakang card yang lembut */
    border: 1px solid #e0e0e0; /* Border halus untuk card */
    border-radius: 10px; /* Sudut membulat */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Bayangan lembut */
    transition: transform 0.2s; /* Animasi saat hover */
}

.card:hover {
    transform: translateY(-5px); /* Efek naik sedikit saat hover */
}



.card-title {
    font-family: "Source Code Pro", serif;
    font-size: 14px;
    font-weight: 600; /* Lebih tebal untuk judul */
    margin-bottom: 4px; /* Jarak kecil di bawah judul */
    color: #333333; /* Warna teks judul */
}

.card-body p {
    margin-bottom: 4px; /* Jarak antar teks dalam card lebih kecil */
    line-height: 1.3; /* Jarak baris lebih rapat */
    font-size: 13px; /* Ukuran teks lebih kecil */
}

.text-muted {
    color: #6c757d;
}

.text-success {
    color: #28a745; /* Hijau segar untuk harga */
    font-weight: bold;
}

.text-warning {
    color: #ffc107; /* Kuning untuk merk */
}

.fixed-image {
    width: 100%; /* Lebar penuh */
    height: 200px; /* Tinggi konsisten */
    object-fit: cover; /* Menyesuaikan gambar */
    border-radius: 8px 8px 0 0; /* Membulatkan sudut atas */
}

.fixed-image-wrapper {
    padding: 10px; /* Padding di sekitar card */
}

.btn-warning {
    background-color: #ffc107; /* Kuning cerah */
    border: none;
    font-size: 13px;
    padding: 5px 10px;
    font-weight: bold;
    color: #fff;
    border-radius: 5px;
}

.btn-warning:hover {
    background-color: #e0a800; /* Warna lebih gelap saat hover */
}

/* Responsivitas */
@media (max-width: 768px) {
    .fixed-image {
        height: 150px; /* Tinggi lebih kecil pada layar medium */
    }
}

@media (max-width: 576px) {
    .fixed-image {
        height: 120px; /* Tinggi lebih kecil pada layar kecil */
    }

    .card-body p {
        font-size: 12px; /* Teks lebih kecil */
    }

    .btn-warning {
        font-size: 12px; /* Ukuran tombol lebih kecil */
        padding: 4px 8px; /* Padding tombol lebih kecil */
    }
}





.card-title {
    font-family: "Source Code Pro", serif;
    font-size: 18px;

}

.fixed-image {
    width: 100%; /* Memastikan gambar mengikuti lebar container */
    height: 200px; /* Mengatur tinggi otomatis untuk responsivitas */
    object-fit: cover; /* Memastikan gambar tidak terdistorsi */
    border-radius: 8px;
    padding: 10px; /* Opsional: untuk tampilan sudut membulat */
}

/* Responsivitas khusus */
@media (max-width: 768px) {
    .fixed-image {
        height: 150px; /* Sesuaikan tinggi untuk layar kecil */
    }
}

@media (max-width: 576px) {
    .fixed-image {
        height: 120px; /* Sesuaikan tinggi untuk layar sangat kecil */
    }
}

.search-input {
background-color: #ffffff00;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
.offcanvas{
background-color: white;
}
@media (min-width: 769px) and (max-width: 1200px) {
    .navbar-brand img {
        height: 65px !important;
    }
}
@media (max-width: 900px) {
  .search-box input {
    width: 100%; /* Input mengambil seluruh lebar */
  }
  .search-box a {
    margin-bottom: 10px; /* Jarak bawah antara ikon dan input */
  }
}
@media (min-width: 991px) {
  .nav-link::before {
    content: "";
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 0;
    height: 2px;
    background-color: black;
    visibility: hidden;
    transition: 0.3s ease-in-out;
  }
  .nav-link:hover::before,
  .nav-link.active::before {
    width: 100%;
    visibility: visible;
  }
}

.material-symbols-outlined {
  font-variation-settings: "FILL" 0, "wght" 400, "GRAD" 0, "opsz" 24;
}

.filter {
  position: fixed;
  top: 100px;
  bottom: 0;
  left: 50px;
  z-index: 1000;
  overflow-y: hidden;
}

.filter-content{
  /* position: fixed;
  width: 300px;
  height: 500px;
  top: 100px;
  bottom: 0;
  left: 100px;
  z-index: 1000;
  overflow-y: auto; */
  background-color: white;
  border-radius: 25px;
  border: 1px solid gray ;

}
.filter-category .btn,
.filter-sort .btn {
border-radius: 20px;
}
.filter-category .btn.active,
.filter-sort .btn.active {
background-color: #FFA726;
color: white;
}
.apply-filter-btn {
background-color: #FFA726;
color: white;
border-radius: 8px;
font-weight: bold;
}

/* keranjang */

.dropdown-toggle {
    cursor: pointer;
    transition: transform 0.3s ease;
  }

  .dropdown-toggle:hover {
    transform: scale(1.1); /* Efek hover pada ikon */
  }

  /* Custom Dropdown Menu */
  .custom-dropdown {
    background-color: #333; /* Warna latar belakang dropdown */
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    padding: 10px 0;
    min-width: 200px;
  }

  .custom-dropdown-item {
    color: #fff; /* Warna teks item */
    padding: 10px 20px;
    font-size: 14px;
    transition: background-color 0.3s ease;
  }

  /* Efek hover pada item */
  .custom-dropdown-item:hover {
    background-color: #f8c146; /* Warna hover untuk item */
    color: white;
    border-radius: 5px;
  }



  /* Ikon keranjang styling */
  .keranjang {
    display: flex;
    align-items: center;
    padding: 10px;
    border-radius: 50%;
    transition: background-color 0.3s ease;
  }

body {
  padding-top: 100px; /* Sesuaikan dengan tinggi navbar */
}

@media (max-width: 768px) {
  .filter {
    /* position: fixed;
    top: 100px;
    bottom: 0;
    left: 100px;
    z-index: 1000;
    overflow-y: auto; */
    position: unset;
  }
  }


  /* modal detail */
  .modal-content {
    background: #ffffff;
  }
  .nav-link img {
    transition: transform 0.3s ease-in-out;
  }
  .nav-link:hover img {
    transform: scale(1.1);
  }
  .table th {
    color: #6c757d;
    font-weight: 600;
  }

  /* profil */
  .btn-danger {
    background-color: #f8c146;
    border: none;
    transition: all 0.3s ease-in-out;
  }

  .btn-danger:hover {
    background-color: #f8c146;
    transform: translateY(-3px);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
  }

  .btn-danger:focus {
    outline: none;
    box-shadow: 0 0 0 0.25rem rgba(230, 57, 70, 0.5);
  }

  .btn i {
    font-size: 1.2rem;
  }

/* checkout */
.rental-card {
    background-color: #f8f9fa; Warna latar untuk membedakan card
    border: 1px solid #dee2e6; /* Border ringan */
    border-radius: 8px;
    padding: 15px 20px;
    margin-bottom: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Efek bayangan */
  }

  .rental-card h6 {
    font-size: 16px;
    font-weight: bold;
    margin: 0;
  }

  .tanggal {
    display: flex;
    align-items: center;
    gap: 10px; /* Jarak antar elemen tanggal dan harga */
  }

  .tanggal small {
    font-size: 14px;
    color: #6c757d; /* Warna teks abu-abu */
    margin: 0;
  }

  .price {
    font-weight: bold;
    color: #333; /* Warna harga lebih mencolok */
  }

  .btn-edit {
    background-color: #ffc107;
    /* color: #fff; */
    border: none;
    border-radius: 4px;
    padding: 5px 10px;
    font-size: 14px;
    cursor: pointer;
  }

  .btn-edit:hover {
    background-color: #e0a800;
  }

  .btn-danger {
    background-color: #dc3545;
    color: #fff;
    border: none;
    border-radius: 4px;
    padding: 5px 10px;
    font-size: 14px;
    cursor: pointer;
  }

  .btn-danger:hover {
    background-color: #c82333;
  }


.avatar {
    background: #4e73df;
    border-radius: 50%;
    color: #fff;
    display: inline-block;
    font-size: 16px;
    font-weight: 300;
    margin: 0;
    position: relative;
    vertical-align: middle;
    line-height: 1.28;
    height: 45px;
    width: 45px
}

.avatar.avatar-xs {
    font-size: 6px;
    height: 15px;
    width: 15px
}

.avatar.avatar-sm {
    font-size: 12px;
    height: 30px;
    width: 30px
}

.avatar.avatar-lg {
    font-size: 23px;
    height: 60px;
    width: 60px
}

.avatar.avatar-xl {
    font-size: 30px;
    height: 75px;
    width: 75px
}

.avatar img {
    border-radius: 50%;
    height: 100%;
    position: relative;
    width: 100%;
    z-index: 1
}

.avatar .avatar-icon {
    background: #fff;
    bottom: 14.64%;
    height: 50%;
    padding: .1rem;
    position: absolute;
    right: 14.64%;
    transform: translate(50%, 50%);
    width: 50%;
    z-index: 2
}

.avatar .avatar-presence {
    bottom: 14.64%;
    padding: .1rem;
    position: absolute;
    right: 14.64%;
    transform: translate(50%, 50%);
    z-index: 2;
    background: #bcc3ce;
    border-radius: 50%;
    box-shadow: 0 0 0 .1rem #fff;
    height: .5em;
    width: .5em
}

.avatar .avatar-presence.online {
    background: #1cc88a
}

.avatar .avatar-presence.busy {
    background: #e74a3b
}

.avatar .avatar-presence.away {
    background: #f6c23e
}

.avatar[data-initial]::before {
    color: currentColor;
    content: attr(data-initial);
    left: 50%;
    position: absolute;
    top: 50%;
    transform: translate(-50%, -50%);
    z-index: 1
}

</style>


  </head>

  <body style="font-family: 'Poppins', sans-serif;">
    <!-- Navbar -->
    <nav
      class="navbar navbar-expand-lg navbar-light bg-warning fixed-top shadow-sm"
      style="padding: 10px 20px; transition: background-color 0.3s ease;"
    >
      <div class="container">
        <!-- Logo -->
        <a class="navbar-brand me-auto" href="#">
          <div class="logo-container">
            <img
              src="{{ url('') }}/asset/img/logo atjeh camp.png"
              alt="Logo Atjeh Camp"
              height="65"
              class="d-inline-block align-text-top"
              style="transition: transform 0.3s;"
              onmouseover="this.style.transform='scale(1.1)'"
              onmouseout="this.style.transform='scale(1)'"
            />
          </div>
        </a>

        <!-- Offcanvas -->
        <div
          class="offcanvas offcanvas-end"
          tabindex="-1"
          id="offcanvasNavbar"
          aria-labelledby="offcanvasNavbarLabel"
        >
          <!-- Offcanvas Header -->
          <div class="offcanvas-header">
            <img
            src="{{ url('') }}/asset/img/logo atjeh camp.png"
            alt="Logo Atjeh Camp"
            height="65"
            class="d-inline-block align-text-top"
            style="transition: transform 0.3s;"
            onmouseover="this.style.transform='scale(1.1)'"
            onmouseout="this.style.transform='scale(1)'"
          />
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="offcanvas"
              aria-label="Close"
            ></button>
          </div>

          <!-- Search Bar -->
          <div class="container my-3">
            <div class="row justify-content-center">
              <div class="col-md-6">
                <div
                  class="search-container"
                  style="position: relative; display: flex; align-items: center;"
                >
                  <input
                    type="text"
                    class="form-control search-input"
                    placeholder="Cari Disini"
                    style="border-radius: 50px; padding-left: 15px;"
                  />
                  <i
                    class="fas fa-search"
                    style="position: absolute; right: 15px; color: #aaa;"
                  ></i>
                </div>
              </div>
            </div>
          </div>

          <!-- Offcanvas Body -->
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
              <!-- Navigation Links -->
              <li class="nav-item">
                <a
                  class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                  href="{{ url('/') }}"
                  style="transition: color 0.3s ease;"
                  onmouseover="this.style.color='#333'"
                  onmouseout="this.style.color='inherit'"
                  >Beranda</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-link {{ request()->is('rent') ? 'active' : '' }}"
                  href="{{ url('/rent') }}"
                  style="transition: color 0.3s ease;"
                  onmouseover="this.style.color='#333'"
                  onmouseout="this.style.color='inherit'"
                  >Sewa</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-link {{ request()->is('sale') ? 'active' : '' }}"
                  href="{{ url('/sale') }}"
                  style="transition: color 0.3s ease;"
                  onmouseover="this.style.color='#333'"
                  onmouseout="this.style.color='inherit'"
                  >Belanja</a
                >
              </li>
            </ul>
          </div>
        </div>

        <!-- Keranjang dan Profil -->
        <div class="d-flex align-items-center">
          <!-- Dropdown Keranjang -->
          <div class="dropdown">
            <a
              href="javascript:void(0);"
              class="keranjang dropdown-toggle"
              style="color: white; transition: transform 0.3s;"
              data-bs-toggle="dropdown"
              aria-expanded="false"
              onmouseover="this.style.transform='scale(1.1)'"
              onmouseout="this.style.transform='scale(1)'"
            >
              <i class="fas fa-shopping-cart fa-lg"></i>
            </a>
            <ul
              class="dropdown-menu custom-dropdown shadow"
              style="border-radius: 8px;"
            >
              <li>
                <a
                  class="dropdown-item custom-dropdown-item"
                  href="{{ url('/rent/keranjang') }}"
                  >Keranjang Sewa</a
                >
              </li>
              <li>
                <a
                  class="dropdown-item custom-dropdown-item"
                  href="{{ url('/detail_belanja') }}"
                  >Detail Belanja</a
                >
              </li>

            </ul>
          </div>

          <!-- Profil Button -->
          <a
            href="{{ url('profil') }}"
            class="login-button ms-3"
            style="transition: transform 0.3s;"
            onmouseover="this.style.transform='scale(1.1)'"
            onmouseout="this.style.transform='scale(1)'"
          >
            <i class="fas fa-user-circle "></i>
          </a>

          <!-- Navbar Toggler -->
          <button
            class="navbar-toggler ms-3"
            type="button"
            data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar"
            aria-label="Toggle navigation"
            style="border-radius: 4px; transition: background-color 0.3s;"
            onmouseover="this.style.backgroundColor='#f9c851'"
            onmouseout="this.style.backgroundColor='transparent'"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </nav>

    <!-- Main Content -->
    @yield('main-content')

    <!-- Scripts -->
    <script src="{{ url('js/sb-admin-2.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    @include('modal.keranjang')
    @stack('scripts')
  </body>

</html>
