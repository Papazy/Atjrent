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
    <select class="form-select" id="kota" name="kota">
      <option value="" selected disabled>Pilih Kota</option>
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
  </div>
</form>

<div id="akadCard" class="container d-none d-flex justify-content-center align-items-center" style="position: absolute; top: 0; left: 0; width: 100%; height: 110vh; background-color:rgba(0,0,0,0.2);  z-index: 9999;">
  <div class="card shadow-sm">
    <div class="card-body" style="max-width: 500px;">
      <h5 class="card-title text-center">Akad Al-Ijarah</h5>
      <p class="text-muted" style="font-size: 0.800rem">Kesepakatan sewa-menyewa dianggap sah apabila memenuhi beberapa persyaratan berikut:</p>
      <div class="scroll-box">
        <ol>
          <li>
            Syarat terjadinya akad (<em>al-In'aqād</em>) berkaitan dengan pelaku akad, objek akad, dan tempat akad. Pelaku akad haruslah orang yang sudah mumayyiz (dapat membedakan), bukan anak-anak, berakal sehat, dan baligh (dewasa).
          </li>
          <li>
            Syarat pelaksanaan (<em>an-nafāz</em>) dalam sewa-menyewa mengharuskan barang atau objek sewa menjadi milik sah dari pihak yang menyewakan (‘aqid). Selain itu, aqid harus memiliki wewenang penuh atau hak ahliyah untuk melaksanakan akad sewa-menyewa. Jika aqid tidak memenuhi...
          </li>
        </ol>
      </div>
      <div class="form-check mt-3">
        <input class="form-check-input" type="checkbox" id="agreeCheck">
        <label class="form-check-label" style="font-size: 0.800rem" for="agreeCheck">
          Saya Menyetujui
        </label>
      </div>
      <button class="btn btn-warning w-100 mt-3" id="continueBtn" disabled>Daftar</button>
    </div>
  </div>
</div>

<!-- Script -->
<script>
  // Function to enable/disable the "Next" button
  function checkFormCompletion() {
    const email = document.getElementById('email');
    const name = document.getElementById('name');
    const kota = document.getElementById('kota');
    const alamat = document.getElementById('alamat');
    const password = document.getElementById('password');
    const passwordConfirmation = document.getElementById('password_confirmation');

    // Check if all fields are filled
    if (email.value && name.value && kota.value && alamat.value && password.value && passwordConfirmation.value) {
      document.getElementById('nextBtn').disabled = false;
    } else {
      document.getElementById('nextBtn').disabled = true;
    }
  }

  // Add event listeners to inputs
  document.getElementById('email').addEventListener('input', checkFormCompletion);
  document.getElementById('name').addEventListener('input', checkFormCompletion);
  document.getElementById('kota').addEventListener('change', checkFormCompletion);
  document.getElementById('alamat').addEventListener('input', checkFormCompletion);
  document.getElementById('password').addEventListener('input', checkFormCompletion);
  document.getElementById('password_confirmation').addEventListener('input', checkFormCompletion);

  // Tampilkan Card Akad
  document.getElementById('nextBtn').addEventListener('click', function() {
    document.getElementById('akadCard').classList.remove('d-none');
    // document.getElementById('registerForm').classList.add('d-none');
  });

  // Validasi Checkbox untuk Melanjutkan
  document.getElementById('agreeCheck').addEventListener('change', function() {
    document.getElementById('continueBtn').disabled = !this.checked;
  });

  // Submit Form
  document.getElementById('continueBtn').addEventListener('click', function() {
    document.getElementById('registerForm').submit();
  });

</script>


@endsection
