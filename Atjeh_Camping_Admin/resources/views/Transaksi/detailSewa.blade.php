@extends('layouts.admin')
<meta name="csrf-token" content="{{ csrf_token() }}">

@push('css')
<!-- Custom styles for this page -->
<link href="{{ url('') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

<style>
  .status-message {
    font-size: 14px;
    margin-top: 5px;
    color: white;
    opacity: 0;
    /* Awalnya tidak terlihat */
    transition: opacity 0.5s ease-in-out;
    /* Animasi transisi */
    background-color: green;
    position: fixed;
    padding: 10px;
    border-radius: 5px;
    right: 0;
    bottom: 0;
    margin-right: 20px;
    margin-bottom: 40px;
    z-index: 9999;
  }

  .status-message.show {
    opacity: 1;
    /* Terlihat sepenuhnya */
  }

</style>

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-0 text-gray-800 mb-4">Detail Transaksi Rent</h1>

<div class="row">
  <div class="col-12">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="font-weight-bold text-primary">Informasi Transaksi</h6>
        <button class="btn btn-danger float-right change-status-cancel mx-2" data-id="{{ $rent->id }}" data-status="terbayar" id="cancelKirim" style="display:{{ $rent->status == 'dikirim' ? 'block' : 'none' }}">
            <i class="fas ss" id="iconStatus"></i> Cancel Kirim
        </button>
        {{-- Button telah dikembalikan atau belum --}}
        @if(strtolower($rent->status) == 'dikembalikan')
        <button class="btn btn-success float-right change-status" data-id="{{ $rent->id }}" data-status="dikirim">
          <i class="fas fa-check" id="iconStatus"></i> Telah Dikembalikan
        </button>
        @elseif(strtolower($rent->status) == 'terbayar')
        <button class="btn btn-warning float-right change-status" data-id="{{ $rent->id }}" data-status="dikirim">
          <i class="fas fa-truck-fast" id="iconStatus"></i> Mengirim Barang
        </button>
        @elseif(strtolower($rent->status) == 'dikirim')

        <button class="btn btn-secondary float-right change-status" data-id="{{ $rent->id }}" data-status="dikembalikan">
            <i class="fas fa-share-from-square" id="iconStatus"></i> Dikembalikan
        </button>
        {{-- button cancel kirim --}}
        @endif

        <div id="status-message-{{ $rent->id }}" class="status-message"></div> <!-- Tempat untuk menampilkan pesan -->
      </div>
      <div class="card-body">
        @if($rent->details->count() > 0)
        <div class="row mb-3">
          <div class="col-md-6">
            <table class="table table-borderless">
              <tr>
                <td><strong>Nama Penyewa</strong></td>
                <td>: {{ $rent->user->name }}</td>
              </tr>
              <tr>
                <td><strong>Email</strong></td>
                <td>: {{ $rent->user->email }}</td>
              </tr>
              <tr>
                <td><strong>Nama Keranjang</strong></td>
                <td>: {{ $rent->nama_keranjang }}</td>
              </tr>
              <tr>
                <td><strong>Lokasi Pengambilan</strong></td>
                <td>: {{ $rent->lokasi_pengambilan }}</td>
              </tr>
              <tr>
                <td><strong>Tanggal Mulai</strong></td>
                <td>: {{ $rent->tanggal_mulai }}</td>
              </tr>
              <tr>
                <td><strong>Tanggal Selesai</strong></td>
                <td>: {{ $rent->tanggal_selesai }}</td>
              </tr>
              <tr>
              @php
              $date1 = \Carbon\Carbon::parse($rent->tanggal_mulai);
              $date2 = \Carbon\Carbon::parse($rent->tanggal_selesai);
              $diff = abs($date2->diffInDays($date1));
              @endphp
              <td><strong>Jumlah Hari</strong></td>
              <td>: {{ $diff }} hari</td>
              </tr>
              <tr>
            <tr>
              <tr>
                <td><strong>Status</strong></td>
                <td id="status">: {{ ucfirst($rent->status) }}</td>
              </tr>
            </table>
          </div>
          <div class="col-md-6">
            <h6 class="font-weight-bold text-primary">Tujuan Sewa</h6>
            <p>{{ $rent->tujuan_sewa }}</p>

            {{-- Bila ada ktp, maka tampilkan ktp --}}
            @if($rent->image_url != null)
            <h6 class="font-weight-bold text-primary">Bukti KTP</h6>
            <img src="{{url('uploads') ."/". $rent->image_url }}" alt="Bukti Transfer" class="img-fluid" style="max-width:400px">
            @endif

          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <h6 class="font-weight-bold text-primary">Daftar Barang yang Disewa</h6>
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead class="thead-light">
                  <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Deskripsi</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($rent->details as $detail)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $detail->barang->nama }}</td>
                    <td>{{ $detail->barang->deskripsi }}</td>
                    <td>Rp{{ number_format($detail->barang->harga, 0, ',', '.') }}</td>
                    <td>{{ $detail->stok_barang }}</td>
                    <td>Rp{{ number_format($detail->barang->harga * $detail->stok_barang, 0, ',', '.') }}</td>
                    @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="5" class="text-right">Total</th>
                    <th>
                      Rp{{ number_format($rent->details->sum(fn($d) => $d->barang->harga * $d->stok_barang), 0, ',', '.') }}
                    </th>
                  </tr>
                  <tr>
                    <th colspan="5" class="text-right">Jumlah Hari</th>
                    <th>
                      {{ $diff }} hari
                    </th>
                  </tr>
                  <tr>
                    <th colspan="5" class="text-right">Ongkos Kirim </th>
                    <th>
                      Rp. {{ number_format($rent->ongkir, 0,',','.') }}
                    </th>
                  </tr>
                    <tr>
                        <th colspan="5" class="text-right">Total Harga</th>
                        <th>
                        Rp{{ number_format($rent->harga_total* $diff + $rent->ongkir, 0, ',', '.') }}
                        </th>
                    </tr>
                </tfoot>
              </table>
            </div>
            @else
            <div class="alert alert-danger">
              Belum ada barang
            </div>
            @endif
          </div>
        </div>

        <div class="row mt-4">
          <div class="col-12 text-right">
            <a href="/transaksi/sewa" class="btn btn-secondary">
              <i class="fas fa-arrow-left"></i> Kembali
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

<script>
  // JavaScript untuk menangani tombol status sewa

document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('.change-status');
    const buttonCancelKirim = document.getElementById('cancelKirim');

    buttonCancelKirim.addEventListener('click', async ()=>{
        const rentId = buttonCancelKirim.dataset.id;
        const newStatus = 'terbayar';
        const statusElement = document.getElementById('status');
        const statusMessage = document.getElementById(`status-message-${rentId}`);

        try {
            // Kirim permintaan ke server untuk memperbarui status
            const response = await fetch(`/transaksi/sewa/${rentId}/status/${newStatus}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ status: newStatus })
            });

            const result = await response.json();

            if (response.ok) {
                // Perbarui pesan status
                statusMessage.textContent = `Status berhasil diperbarui menjadi ${newStatus}`;
                statusMessage.classList.add('show');

                setTimeout(() => {
                    statusMessage.classList.remove('show');
                }, 3000);

                // Perbarui UI tombol berdasarkan status baru
                // mendapatkan button change sekarang
                const button = document.querySelector(`.change-status`);

                updateButtonUI(button, newStatus);
                updateCancelKirimVisibility(newStatus);

                // Perbarui teks status di elemen
                if (statusElement) {
                    statusElement.textContent = `: ${capitalizeFirstLetter(newStatus)}`;
                }
            } else {
                throw new Error(result.message || 'Terjadi kesalahan');
            }
        } catch (error) {
            alert(`Gagal memperbarui status: ${error.message}`);
        }
    })

    buttons.forEach(button => {
        button.addEventListener('click', async () => {
            const rentId = button.dataset.id;
            const newStatus = button.dataset.status;
            const statusElement = document.getElementById('status');
            const statusMessage = document.getElementById(`status-message-${rentId}`);

            try {
                // Kirim permintaan ke server untuk memperbarui status
                const response = await fetch(`/transaksi/sewa/${rentId}/status/${newStatus}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ status: newStatus })
                });

                const result = await response.json();

                if (response.ok) {
                    // Perbarui pesan status
                    statusMessage.textContent = `Status berhasil diperbarui menjadi ${newStatus}`;
                    statusMessage.classList.add('show');

                    setTimeout(() => {
                        statusMessage.classList.remove('show');
                    }, 3000);

                    // Perbarui UI tombol berdasarkan status baru
                    updateButtonUI(button, newStatus);
                    updateCancelKirimVisibility(newStatus);

                    // Perbarui teks status di elemen
                    if (statusElement) {
                        statusElement.textContent = `: ${capitalizeFirstLetter(newStatus)}`;
                    }
                } else {
                    throw new Error(result.message || 'Terjadi kesalahan');
                }
            } catch (error) {
                alert(`Gagal memperbarui status: ${error.message}`);
            }
        });
    });

    // Fungsi untuk memperbarui visibilitas tombol cancel kirim
    function updateCancelKirimVisibility(status) {
        if (buttonCancelKirim) {
            buttonCancelKirim.style.display = (status === 'dikirim') ? 'block' : 'none';
        }
    }

    function capitalizeFirstLetter(val){
        return String(val).charAt(0).toUpperCase() + String(val).slice(1);
    }

    // Fungsi untuk memperbarui tampilan tombol berdasarkan status baru
    function updateButtonUI(button, status) {
        updateCancelKirimVisibility(status);
        switch (status) {
            case 'terbayar':
                button.innerHTML = '<i class="fas fa-truck-fast"></i> Mengirim Barang';
                button.classList.remove('btn-success', 'btn-secondary');
                button.classList.add('btn-warning');
                button.dataset.status = 'dikirim';
                break;

            case 'dikirim':
                buttonCancelKirim.style.display = 'block';
                button.innerHTML = '<i class="fas fa-share-from-square"></i> Dikembalikan';
                button.classList.remove('btn-warning', 'btn-success');
                button.classList.add('btn-secondary');
                button.dataset.status = 'dikembalikan';
                break;

            case 'dikembalikan':
                button.innerHTML = '<i class="fas fa-check"></i> Telah Dikembalikan';
                button.classList.remove('btn-secondary', 'btn-warning');
                button.classList.add('btn-success');
                button.dataset.status = 'dikirim';
                break;
        }
    }

    // Atur visibilitas awal tombol cancel kirim berdasarkan status
    if (buttonCancelKirim) {
        updateCancelKirimVisibility(button.dataset.status);
    }
});


</script>
