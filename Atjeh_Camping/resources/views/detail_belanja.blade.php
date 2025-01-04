@extends('layouts.master')
@section('main-content')
<link rel="stylesheet" href="{{ asset('asset/style.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">

@if($item==null)
<div class="container mt-5">



    <h5 style="color:  #ffc107">LIST BARANG BELANJAAN</h5>
    <div class="row">
        <div class="col-12">
        <div class="rental-card d-flex align-items-center justify-content-between bg-danger">
            <div class="d-flex flex-column flex-md-row">
            <h6 class="my-2 me-3 " style="color:white  ">
                Tidak ada barang belanjaan
            </h6>
            </div>
        </div>
        </div>
    </div>
</div>
@else
@php
              $total_price = 0;
              @endphp
<div class="container mt-5">
  <h5 style="color:  #ffc107">LIST BARANG BELANJAAN</h5>
    <!-- Modal Error -->
    <div class="modal fade" style="background-color: rgba(0,0,0,0.5);" tabindex="-1" id="errorByStokModal">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header bg-danger text-white">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Error</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
  <div class="row">
    <!-- Cart Table -->
    <div class="col-md-8">
      <div class="table-responsive">
        <table class="table cart-table">
          <table class="table cart-table">
            <thead>
              <tr>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Stok</th> <!-- Kolom stok baru -->
                <th>Harga Unit</th>
                <th>Jumlah</th>
              </tr>
            </thead>
            <tbody>

              {{-- @foreach ($item as $item) --}}
              @php
              $total_price += $item->barang->harga * $item->stok_barang;
            //   @endphp
              <tr>
                <td><img src="{{ env('APP_ASSET') . $item->barang->image_url }}" class="img-thumbnail" alt="{{ $item['nama'] }}" width="50"></td>
                <td>{{ $item->barang->nama }}</td>
                <td>{{ $item['stok_barang'] }}</td> <!-- Tampilkan stok -->
                <td>Rp{{ number_format($item->barang->harga, 0, ',', '.') }}</td>
                <td>Rp{{ number_format($item->barang->harga * $item->stok_barang, 0, ',', '.') }}</td> <!-- Tampilkan jumlah barang -->
                <td>
                    <button class="btn btn-link text-danger p-0 btn-delete" id="btn-delete" data-id="{{ $item->id }}" onclick="handleDelete(this)">
                      <i class="fas fa-trash" style="color: #ff3d3d"></i>
                    </button>

                  </td>
              </tr>
            </tbody>
          </table>
        </table>
    </div>
</div>


<div class="col-md-4 col-12">
    <div class="card p-4">
        <div class="card-header">Camp To Seulawah</div>
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <span class="text-muted">Total Pesanan</span>
                <span id="total-payment-only">Rp{{ number_format($total_price, 0, ',', '.') }}</span>
            </div>
            <hr />
            <div class="mb-3">
                <!-- Shipping Option: Ambil di Tempat -->
            <div class="mb-2">
              <label class="form-check-label radio-label">Ambil di tempat</label>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="shipping" id="pickupOption" value="pickup" checked />
                  <label for="pickupOption" class="form-check-label">
                      Basecamp Atjeh Camping
                    </label>
                </div>
            </div>

            <!-- Shipping Option: Kirim ke Alamat -->
            <div class="mb-2">
                <label for="deliveryOption" class="form-check-label">Kirim ke alamat dituju</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="shipping" id="deliveryOption" value="delivery" />
                    <label for="deliveryOption" class="form-check-label">
                        Kirim Ke Alamat
                    </label>
                </div>
            </div>

            <!-- Dropdown Kabupaten (Hidden by Default) -->
            <div id="kabupatenDropdown" class="mt-3" style="display: none;">
              <label for="kabupaten" class="form-label">Pilih Kabupaten:</label>
              <select class="form-select" id="kabupaten" name="kabupaten">
                  <option value="" selected disabled>Pilih Kabupaten</option>
                  <option id="1" value="beureneun" data-amount="38752">Beureneun</option>
                  <option id="2" value="samalanga" data-amount="21942">Samalanga</option>
                  <option id="3" value="bireun" data-amount="25539">Bireun</option>
                  <option id="4" value="redelong" data-amount="40192">Redelong</option>
                  <option id="5" value="takengon" data-amount="27244">Takengon</option>
                  <option id="6" value="angkop" data-amount="15460">Angkop</option>
                  <option id="7" value="jagong jeget" data-amount="13283">Jagong Jeget</option>
                  <option id="8" value="blang kejeuren" data-amount="48924">Blang Kejeuren</option>
                  <option id="9" value="kutacane" data-amount="37950">Kutacane</option>
                  <option id="10" value="glumpang dua" data-amount="45025">Glumpang Dua</option>
                  <option id="11" value="krueng gekuh" data-amount="31340">Krueng Gekuh</option>
                  <option id="12" value="lhokseumawe" data-amount="38522">Lhokseumawe</option>
                  <option id="13" value="geudong" data-amount="22457">Geudong</option>
                  <option id="14" value="lhoksukon" data-amount="48921">Lhoksukon</option>
                  <option id="15" value="pantom labu" data-amount="12974">Pantom Labu</option>
                  <option id="16" value="idi" data-amount="28968">Idi</option>
                  <option id="17" value="Peureulak" data-amount="25093">Peureulak</option>
                  <option id="18" value="langsa" data-amount="35428">Langsa</option>
                  <option id="19" value="sp.upak" data-amount="28950">Sp.Upak</option>
                  <option id="20" value="kuala simpang" data-amount="41237">Kuala Simpang</option>
                  <option id="21" value="sungai liput" data-amount="17743">Sungai Liput</option>
                  <option id="22" value="langkat tamiang" data-amount="26162">Langkat Tamiang</option>
                  <option id="23" value="lamno" data-amount="33872">Lamno</option>
                  <option id="24" value="calang" data-amount="41792">Calang</option>
                  <option id="25" value="teunom" data-amount="28815">Teunom</option>
                  <option id="26" value="meulaboh" data-amount="32379">Meulaboh</option>
                  <option id="27" value="jeuram" data-amount="39547">Jeuram</option>
                  <option id="28" value="alue bilie" data-amount="48729">Alue Bilie</option>
                  <option id="29" value="kuala batee" data-amount="20234">Kuala Batee</option>
                  <option id="30" value="blang pidie" data-amount="26947">Blang Pidie</option>
                  <option id="31" value="labuhan haji" data-amount="35210">Labuhan Haji</option>
                  <option id="32" value="tapak tuan" data-amount="28537">Tapak Tuan</option>
                  <option id="33" value="kota fajar" data-amount="30261">Kota Fajar</option>
                  <option id="34" value="bakongan" data-amount="23645">Bakongan</option>
                  <option id="35" value="Subulussalam" data-amount="15974">Subulussalam</option>
                  <option id="36" value="singkil" data-amount="21768">Singkil</option>

              </select>
            </div>
        </div>
        <div class="d-flex justify-content-between mt-3">
            <span class="text-muted">Ongkos Kirim</span>
            <div>
                Rp.
                <span id="ongkir">0</span>
            </div>
        </div>
    </div>
    <hr />

    <hr />
    <div class="d-flex justify-content-between mb-3">
        <span class="total-payment">Total Pembayaran</span>
        <span id="total-payment">Rp{{ number_format($total_price, 0, ',', '.') }}</span>
    </div>
    <div class="d-grid">
        <button class="btn btn-payment btn bg-warning" id="payButton">
            Bayar Sekarang
        </button>
    </div>
</div>
      </div>
    </div>
  </div>
</div>


<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // JavaScript to toggle visibility of kabupaten dropdown
    document.addEventListener('DOMContentLoaded', function() {


        // Handle change total price
        let lokasi_pengambilan = "Basecamp Atjeh Camping";
        const sumTotal = document.getElementById('total-payment-only').textContent.replaceAll('.', '').replaceAll('Rp', '');
        localStorage.setItem('totalPayment', sumTotal);
        const kabupatenSelect = document.getElementById('kabupaten');
        const ongkirValue = document.getElementById('ongkir');
        kabupatenSelect.addEventListener('change', function() {
            const selectedOption = kabupatenSelect.options[kabupatenSelect.selectedIndex];
            if (selectedOption) {
                let totalPesanan = document.getElementById('total-payment-only').textContent.replaceAll('.', '').replaceAll('Rp', '');
                ongkirValue.innerHTML =parseInt(selectedOption.getAttribute('data-amount')).toLocaleString('id-ID');
                const sumTotal = parseInt(selectedOption.getAttribute('data-amount')) + parseInt(totalPesanan);
                document.getElementById('total-payment').innerHTML = sumTotal.toLocaleString('id-ID')
                lokasi_pengambilan = selectedOption.value;
                localStorage.setItem('totalPayment', sumTotal);
            }
        });

        const errorByStokModal = new bootstrap.Modal(document.getElementById('errorByStokModal'));
        // Handle FETCH Midtrans
        const payButton = document.getElementById("payButton");
        payButton.addEventListener('click', function() {
            // const totalPayment = document.getElementById('total-payment').textContent.replaceAll('.','');
            const totalPayment = localStorage.getItem('totalPayment')
            fetch('/payment/jual/' + totalPayment, {
                method: 'POST'
                , headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    , 'Content-Type': 'application/json'
                    , }
                    , body: JSON.stringify({
                        amount: totalPayment,
                        lokasi_pengambilan: lokasi_pengambilan,
                        ongkir: parseInt(ongkirValue.textContent.replace('Rp. ', '').replace(/\./g, ''), 10),
              rent_id: {{ $item->id }}
            , })
          })
          .then(response => response.json())
          .then(data => {
                    if(data.error){
                        const modalBody = document.querySelector('#errorByStokModal .modal-body');
                        modalBody.innerHTML = '<h5>Barang tidak cukup</h5>';

                        const listBarang = document.createElement('ul');
                        listBarang.classList.add('list-group');

                        if(data.barangTidakCukup && data.barangTidakCukup.length > 0){
                            data.barangTidakCukup.forEach(barang => {
                                const listItem = document.createElement('li');
                                listItem.classList.add('list-group-item');
                                listItem.textContent = `${barang.nama}: Dibutuhkan ${barang.stok_dibutuhkan}, Tersedia ${barang.stok_tersedia} unit`;
                                listBarang.appendChild(listItem);
                            })
                            modalBody.appendChild(listBarang);
                            // beri note agar menghapus barang yang tidak cukup dan pilih kembali dengan stok yang ada
                            modalBody.innerHTML += '<p style="font-size:10px; margin-top:6px;">*Harap hapus barang yang tidak cukup dan pilih kembali dengan stok yang ada</p>';

                        }else{
                            modalBody.textContent = data.error;
                        }

                        errorByStokModal.show();
                    }else{
                        snap.pay(data.snap_token, {
                            // jika succes arah kan ke /history_belanja
                            onSuccess: function(result){

                                fetch('/payment/confirm/jual/'+{{ $item->id }}, {
                            method: "POST",
                            headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}",  'Content-Type': 'application/json' },
                            body: JSON.stringify({
                                amount: totalPayment,
                                lokasi_pengambilan: lokasi_pengambilan,
                                ongkir: parseInt(ongkirValue.textContent.replace('Rp. ', '').replace(/\./g, ''), 10),
                                rent_id: {{ $item->id }},
                                snap_token: data.snap_token,
                            }),
                        })
                            .then((response) => response.json())
                            .then((dataa) => {console.log(dataa); window.location.href = '/history_belanja';});
                            },
                        });
                    }
                  });
        })



        // Handle on change Alamat

        const pickupOption = document.getElementById('pickupOption');
        const deliveryOption = document.getElementById('deliveryOption');
        const kabupatenDropdown = document.getElementById('kabupatenDropdown');

        pickupOption.addEventListener('change', function() {
            console.log('pickupOption');
            if (this.checked) {
                kabupatenDropdown.style.display = 'none';
                let totalHarga = {{ $total_price }}
                ongkirValue.innerHTML = 0;
                lokasi_pengambilan = "Basecamp Atjeh Camping";
                document.getElementById('total-payment').innerHTML = totalHarga.toLocaleString('id-ID');
            } else {
                kabupatenDropdown.style.display = 'block';
            }
        });
        deliveryOption.addEventListener('change', function() {
            console.log('deliverOption');
        if (this.checked) {
          kabupatenDropdown.style.display = 'block';
        } else {
          kabupatenDropdown.style.display = 'none';
          let totalHarga = {{ $total_price }}
          document.getElementById('total-payment').innerHTML = totalHarga.toLocaleString('id-ID');
        }
    });
});


// delete

function handleDelete(button) {
    let dataId = $(button).data('id'); // Ambil ID data dari atribut tombol
    let keranjangId = $(button).data('cart-id'); // Ambil ID data dari atribut tombol
    console.log(dataId);
    // return ;
    let token = $('meta[name="csrf-token"]').attr('content');
    // console.log(ok);

    Swal.fire({
        icon: 'warning'
        , title: 'Apakah Kamu Yakin?'
        , text: "Ingin menghapus data ini!"
        , showCancelButton: true
        , cancelButtonText: 'TIDAK'
        , confirmButtonText: 'YA, HAPUS!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/detail_belanja/destroy/${dataId}`, // Sesuaikan URL dengan route
                type: "DELETE",
                data: {
                    _token:token, // Kirimkan CSRF token
                    id : dataId
                }
                , success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success'
                  , title: 'Berhasil!'
                  , text: response.message
                  , showConfirmButton: false
                  , timer: 3000
                });

                // Hapus baris dari tabel
                $(`button[data-id="${dataId}"]`).closest('tr').remove();

                // merefresh halaman
                location.reload();


            } else {
                console.log(response);
                Swal.fire({
                    icon: 'error'
                    , title: 'Gagal!'
                    , text: response.message
                    , showConfirmButton: false
                    , timer: 3000
                });
            }
        }
        , error: function(xhresponse) {
            console.log(xhresponse.responseText);
            Swal.fire({
                icon: 'error'
                , title: 'Error!'
                , text: 'Terjadi kesalahan saat menghapus data!'
                , showConfirmButton: false
                , timer: 3000
            });
            }
        });
    }
});
}

</script>
@endif




@endsection


