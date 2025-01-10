@extends('layouts.auth')
@section('main-content')

<style>
  .scroll-box {
    max-height: 200px;
    overflow-y: auto;
    border: 1px solid #ddd;
    /* padding: 5px; */
    border-radius: 5px;
    font-size: 0.800rem;
  }

</style>


<div class="header-text mb-4">
  <h1>Sign Up </h1>
  <p class="text-muted">Please login to continue your account.</p>
</div>

<!-- form    -->
@if ($errors->any())
<div class="alert alert-sm alert-danger border-left-danger" role="alert">
  <ul class="pl-4 my-2">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<form action="{{ route('register') }}" method="post" id="registerForm" class="mb-4">
  @csrf
  <div class="input-group mb-3">
    <input type="email" name="email" id="email" class="form-control form-control-lg bg-light fs-6" placeholder="Email">
  </div>
  <div class="input-group mb-3">
    <input type="text" name="name" id="name" class="form-control form-control-lg bg-light fs-6" placeholder="Name">
  </div>
  <div class="input-group mb-3">
    <input type="text" name="no_hp" id="no_hp" class="form-control form-control-lg bg-light fs-6" placeholder="Nomor Handphone">
  </div>
  <div class="input-group mb-3">
    <input type="text" name="alamat" id="alamat" class="form-control form-control-lg bg-light fs-6" placeholder="Alamat">
  </div>
  <div class="input-group mb-3">
    <input type="password" name="password" id="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password">
  </div>
  <div class="input-group mb-3">
    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-lg bg-light fs-6" placeholder="Confirm Password">
  </div>
  <div class="input-group mb-1">
    <button type="button" class="btn btn-lg btn-warning w-100 shadow fs-6" id="nextBtn" disabled>
      Next
    </button>
    <p style="text-align: center; color: black; width:100%; margin-top:10px">Already have an account? <a href="/login">Login</a></p>

  </div>
</form>

<div id="akadCard" class="container d-none d-flex justify-content-center align-items-center" style="position: absolute; top: 0; left: 0; width: 100%; height: 110vh; background-color:rgba(0,0,0,0.2);  z-index: 9999;">
  <div class="card shadow-sm">
    <div class="card-body" style="max-width: 500px;">
      <h5 class="card-title text-center">Syarat dan Ketentuan Akad Al-Ijarah</h5>
      <p class="text-muted" style="font-size: 0.800rem">Berikut adalah syarat dan ketentuan yang berlaku dalam akad sewa barang sesuai prinsip Al-Ijarah:</p>
      <div class="scroll-box">
        <ol>
          <li>
            <strong>Ketentuan Umum:</strong>
            <ul>
              <li><em>Akad Ijarah ('ala al-a'yan)</em>: Kesepakatan ini adalah akad sewa barang tanpa pemindahan hak milik.</li>
              <li><em>Mu’jir (Pemberi Sewa)</em>: Anda sebagai pemilik barang bertindak sebagai Mu’jir.</li>
              <li><em>Musta’jir (Penyewa)</em>: Pengguna yang menyewa barang adalah Musta’jir.</li>
            </ul>
          </li>
          <li>
            <strong>Ketentuan Barang Sewa:</strong>
            <ul>
              <li>Barang harus dalam kondisi layak, dapat digunakan, dan sesuai syariah.</li>
              <li>Barang harus diserahkan pada waktu yang telah disepakati.</li>
              <li>Spesifikasi barang, termasuk kondisi fisik dan cara penggunaan, harus dijelaskan secara jelas.</li>
            </ul>
          </li>
          <li>
            <strong>Ketentuan Sewa dan Waktu:</strong>
            <ul>
              <li>Durasi sewa harus disepakati dengan jelas.</li>
              <li>Penggunaan barang sesuai aturan yang disepakati, tanpa merusak atau melanggar ketentuan.</li>
              <li>Musta’jir tidak boleh menyewakan kembali barang tanpa izin tertulis dari Mu’jir.</li>
            </ul>
          </li>
          <li>
            <strong>Ketentuan Pembayaran:</strong>
            <ul>
              <li>Biaya sewa (Ujrah) harus disepakati secara transparan.</li>
              <li>Pembayaran dapat dilakukan tunai atau transfer sesuai kesepakatan.</li>
              <li>Kerusakan akibat kelalaian penyewa wajib diganti oleh penyewa.</li>
            </ul>
          </li>
          <li>
            <strong>Ketentuan Risiko dan Tanggung Jawab:</strong>
            <ul>
              <li>Penyewa bertanggung jawab atas kerusakan akibat kelalaian.</li>
              <li>Kerusakan bukan akibat kelalaian penyewa tidak menjadi tanggung jawab penyewa.</li>
            </ul>
          </li>
          <li>
            <strong>Ketentuan Tambahan dari Atjeh Camping:</strong>
            <ul>
              <li>Penyewa wajib menyertakan identitas yang masih berlaku sebagai jaminan.</li>
              <li>Booking barang disertai DP 50% dari total biaya sewa.</li>
              <li>Pengambilan dan pengembalian barang sesuai waktu yang telah ditentukan (06.00-21.00 WIB).</li>
              <li>Pengembalian barang lewat waktu dikenakan denda setara biaya sewa satu hari.</li>
              <li>Barang yang rusak/hilang akibat kelalaian penyewa wajib diganti sesuai harga yang ditetapkan.</li>
              <li>Dilarang melakukan perbuatan maksiat selama menyewa barang.</li>
            </ul>
          </li>
        </ol>
      </div>
      <div class="form-check mt-3">
        {{-- <input class="form-check-input" type="checkbox" id="agreeCheck"> --}}
        <label class="form-check-label" style="font-size: 0.800rem; color: rgba(189, 189, 189, 0.751); font-style:italic" for="agreeCheck">
          scroll sampai bawah untuk melanjutkan
        </label>
      </div>
      <button class="btn btn-warning w-100 mt-3" id="continueBtn" disabled>Daftar</button>
    </div>

  </div>
</div>

<!-- Script -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.scroll-box').addEventListener('scroll', function () {
        const scrollBox = this;
        const bawah =  Math.floor(scrollBox.scrollHeight - scrollBox.scrollTop)
        const isScrolledToBottom = bawah == scrollBox.clientHeight;
        // console.log(bawah, scrollBox.clientHeight, isScrolledToBottom);

        // Jika sudah discroll sampai bawah, aktifkan tombol "continueBtn"
        if (isScrolledToBottom === true) {
            document.getElementById('continueBtn').disabled = false;
        }
        });



    function checkFormCompletion() {
      const email = document.getElementById('email');
      const name = document.getElementById('name');
      const no_hp = document.getElementById('no_hp');
      const alamat = document.getElementById('alamat');
      const password = document.getElementById('password');
      const passwordConfirmation = document.getElementById('password_confirmation');

      // Check if all fields are filled
      if (email.value && name.value && no_hp.value && alamat.value && password.value && passwordConfirmation.value) {
        document.getElementById('nextBtn').disabled = false;
      } else {
        document.getElementById('nextBtn').disabled = true;
      }
    }

    // Add event listeners to inputs
    document.getElementById('email').addEventListener('input', checkFormCompletion);
    document.getElementById('name').addEventListener('input', checkFormCompletion);
    document.getElementById('no_hp').addEventListener('change', checkFormCompletion);
    document.getElementById('alamat').addEventListener('input', checkFormCompletion);
    document.getElementById('password').addEventListener('input', checkFormCompletion);
    document.getElementById('password_confirmation').addEventListener('input', checkFormCompletion);

    // Tampilkan Card Akad
    document.getElementById('nextBtn').addEventListener('click', function() {
      document.getElementById('akadCard').classList.remove('d-none');
      // document.getElementById('registerForm').classList.add('d-none');
    });


    // document.querySelector('.scroll-box').addEventListener('scroll', function() {
    //   // Submit Form
    //   document.getElementById('continueBtn').addEventListener('click', function() {
    //     document.getElementById('registerForm').submit();
    //   });
    // });

  });

</script>



@endsection
