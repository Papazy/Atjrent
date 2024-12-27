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

<div class="container">
    <div class="card shadow-sm">
      <div class="card-body">
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

  <script>
    document.getElementById('agreeCheck').addEventListener('change', function() {
      document.getElementById('continueBtn').disabled = !this.checked;
    });
  </script>

@endsection
