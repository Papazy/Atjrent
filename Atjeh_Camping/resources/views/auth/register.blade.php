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
