@extends('layouts.auth')
@section('main-content')
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
<form action="{{ route('register') }}" method="post">
    @csrf
    <div class="input-group mb-3">
        <input type="email" name="email"
               class="form-control form-control-lg bg-light fs-6"
               placeholder="Email">

   </div>
   <div class="input-group mb-3">
        <input type="text" name="name"
               class="form-control form-control-lg bg-light fs-6"
               placeholder="Name">
   </div>
   <div class="input-group mb-3">
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
   <div class="input-group mb-3">
        <input type="text" name="alamat"
               class="form-control form-control-lg bg-light fs-6"
               placeholder="Alamat">
   </div>
   <div class="input-group mb-3">
        <input type="password" name="password"
               class="form-control form-control-lg bg-light fs-6"
               placeholder="Password">
   </div>
   <div class="input-group mb-3">
        <input type="password" name="password_confirmation"
               class="form-control form-control-lg bg-light fs-6"
               placeholder="confirm Password">
   </div>
   {{-- <div class="input-group mb-1 ">
    <button class="btn btn-lg btn-warning w-100 shadow fs-6">Next</button>
</div> --}}
<div class="input-group mb-1">
    <button onclick="showAkad()" class="btn btn-lg btn-warning w-100 shadow fs-6">
      Next
    </button>
  </div>

</form>

<!-- Script -->
<script>
    // Tampilkan Card Akad
    document.getElementById('nextBtn').addEventListener('click', function() {
        document.getElementById('akadCard').classList.remove('d-none');
        document.getElementById('registerForm').classList.add('d-none');
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
