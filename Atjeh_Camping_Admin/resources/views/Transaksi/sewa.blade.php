@extends('layouts.admin')
@push('css')
<!-- Custom styles for this page -->
<link href="https://cdn.datatables.net/2.2.0/js/dataTables.bootstrap5.js" rel="stylesheet">
<!-- <link href="https://cdn.datatables.net/2.2.0/css/dataTables.dataTables.css" rel="stylesheet"> -->
<link href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css" rel="stylesheet">

<style>
    #btn-filter {
        background-color: #f8f9fc;
        border: none;
    }

    #btn-filter:hover {
        background-color: #f8f9fc;
        transform: scale(1.1);
    }

    #icon-filter {
        color: #21cd9a;
    }

    #btn-filter:hover #icon-filter {
        color: #007bff;
        /* Warna baru untuk ikon */
        transform: rotate(20deg);
        /* Contoh transformasi rotasi */
        transition: all 0.3s ease;
        /* Animasi halus */
    }

    /* Default state modal (tersembunyi) */
    #modal-filter {
        display: none;
        opacity: 0;
        transform: scale(0.9);
        transition: opacity 0.3s ease, transform 0.3s ease;
    }

    /* Saat modal aktif */
    #modal-filter.show {
        display: block;
        opacity: 1;
        transform: scale(1);
    }

    /* Animasi keluar */
    #modal-filter.hide {
        opacity: 0;
        transform: scale(0.9);
    }

    .form-check-input {
        width: 18px;
        height: 18px;
    }

    .form-check-label {
        font-size: 14px;
    }

    .form-check p {
        margin-top: 5px;
        font-size: 12px;
        color: #6c757d;
    }

    .btn-block {
        width: 100%;
    }
</style>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-0 text-gray-800 mb-4">Stok Barang</h1>

<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-6 d-flex justify-content-start align-items-center">
                        {{-- Menampilkan rentang waktu --}}
                        @if($waktu_mulai && $waktu_akhir)
                        <h6 class="mt-2 font-weight-bold">
                            {{ \Carbon\Carbon::parse($waktu_mulai)->format('d M Y') }} - {{ \Carbon\Carbon::parse($waktu_akhir)->format('d M Y') }}
                        </h6>
                        @endif

                        {{-- Modal filter --}}
                        <div class="wrapper relative ml-3">
                            <button class="icon-wrapper border p-1 rounded bg-light" id="btn-filter">
                                <i class="icon fas fa-filter" id="icon-filter"></i>
                            </button>

                            <div class="absolute bg-white border p-4 rounded shadow-sm" id="modal-filter" style="display: none; position: absolute; width: 300px;">
                                <form action="{{ url('/transaksi/sewa') }}" method="GET">
                                    <div class="form-group mb-3">
                                        <!-- Input Waktu Mulai -->
                                        <label for="waktu_mulai" class="font-weight-bold">Waktu Mulai</label>
                                        <input type="date" class="form-control" name="waktu_mulai" id="waktu_mulai"
                                            value="{{ old('waktu_mulai', $waktu_mulai) }}" required>

                                        <!-- Input Waktu Akhir -->
                                        <label for="waktu_akhir" class="font-weight-bold mt-3">Waktu Akhir</label>
                                        <input type="date" class="form-control" name="waktu_akhir" id="waktu_akhir"
                                            value="{{ old('waktu_akhir', $waktu_akhir) }}" required>

                                        <!-- Checkbox Filter -->
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" name="paid_only" id="paid_only" {{ $paid_only == 'on' ? 'checked' : '' }} />
                                            <label class="form-check-label font-weight-bold" for="paid_only">
                                                Hanya Tampilkan Transaksi Selesai
                                            </label>
                                            <p class="text-muted small mb-0">Filter data yang sudah <strong>Terbayar</strong>, <strong>Dikirim</strong>, atau <strong>Dikembalikan</strong>.</p>
                                        </div>

                                        <!-- Tombol Aksi -->
                                        <div class="mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Filter</button>
                                            <a href="{{ url('/transaksi/sewa') }}" class="btn btn-danger btn-block mt-2">Reset</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <button class="btn btn-primary" id="btn-create">
                                <i class="icon fas fa-plus pr-1"></i>Tambah Data</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table_responsive" id="dataTableWithPrint" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>No HP</th>
                            <th>Keranjang</th>
                            <th>Waktu Sewa</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rents as $data)
                        <tr>
                            <td>{{ $data->user->name }}</td>
                            <td>{{ $data->user->no_hp }}</td>
                            <td>{{ $data->nama_keranjang }}</td>
                            <td>{{ \Carbon\Carbon::parse($data->tanggal_mulai)->format('d M Y') . " - " . \Carbon\Carbon::parse($data->tanggal_selesai)->format('d M Y') }}</td>
                            <td>Rp {{ number_format($data->ongkir+$data->harga_total * (abs(\Carbon\Carbon::parse($data->tanggal_mulai)->diffInDays(\Carbon\Carbon::parse($data->tanggal_selesai)))), 0, ',', '.')  }}</td>
                            {{-- Jumlah hari --}}



                            <td>
                                @if($data->status == 'pending' && $data->tanggal_mulai >= \Carbon\Carbon::now())
                                <button class="btn btn-secondary me-2">Pending</button>
                                @elseif($data->status == 'pending' && $data->tanggal_mulai < \Carbon\Carbon::now())
                                    <button class="btn btn-danger me-2">Kedaluwarsa</button>
                                    @elseif($data->status == 'terbayar')
                                    <button class="btn btn-success me-2">Dibayar</button>
                                    @elseif($data->status == 'dikembalikan')
                                    <button class="btn btn-info me-2" style="font-size:14px">Dikembalikan</button>
                                    @elseif($data->status == 'dikirim')
                                    <button class="btn btn-warning me-2" style="font-size:14px">Dikirim</button>
                                    @else
                                    <button class="btn btn-warning me-2">Pending</button>
                                    @endif
                            </td>
                            <td>
                                <a href={{ "sewa/".$data->id }} type="button" class="btn btn-info">Detail</a>
                            </td>
                        </tr>
                        @endforeach

                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>No HP</th>
                            <th>Keranjang</th>
                            <th>Waktu Sewa</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection
 @push('scripts')


<!-- Page level plugins -->

<!-- https://code.jquery.com/jquery-3.7.1.js -->


<!-- Page level plugins -->

<!-- https://cdn.datatables.net/2.2.0/js/jquery.dataTables.min.js -->
<!-- https://cdn.datatables.net/2.2.0/js/dataTables.bootstrap5.min.js -->

<!-- https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.min.js -->
<!-- https://cdn.datatables.net/buttons/3.2.0/js/buttons.print.min.js -->

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.2.0/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.0/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.print.min.js"></script>

<!-- datatableWithPrint -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        $('#dataTableWithPrint').DataTable({
            dom: 'Bfrtip', // Menambahkan tombol di atas tabel
            searching: false,
            buttons: [
                {
                    extend: 'print',
                    customize: function(win) {
                        // Menampilkan tanggal mulai dan selesai saat cetak
                        $(win.document.body).prepend('<h4 class="text-center">{{ $waktu_mulai ? \Carbon\Carbon::parse($waktu_mulai)->format("d M Y") : "Semua Waktu" }} - {{ $waktu_akhir ? \Carbon\Carbon::parse($waktu_akhir)->format("d M Y") : "Semua Waktu" }}</h4>');
                        $(win.document.body).prepend('<h1 class="text-center">Daftar Transaksi Penjualan</h1>');
                        $(win.document.body).prepend('<h1 class="text-center"><strong>Atjeh Camping</strong></h1>');
                    },
                    exportOptions: {
                        columns: [0, 1, 2, 3,4]
                    },
                    title:'',
                    footer: false,
                }
            ]
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const buttonFilter = document.getElementById('btn-filter');
        const modalFilter = document.getElementById('modal-filter');

        // Fungsi untuk menampilkan modal dengan animasi
        const showModal = () => {
            modalFilter.classList.add('show');
            modalFilter.classList.remove('hide');
        };


        const hideModal = () => {
            modalFilter.classList.add('hide');
            modalFilter.classList.remove('show');
            setTimeout(() => {
                modalFilter.style.display = 'none';
            }, 300);
        };

        // Toggle modal visibility on button click
        buttonFilter.addEventListener('click', function(event) {
            if (modalFilter.style.display === 'none' || !modalFilter.classList.contains('show')) {
                modalFilter.style.display = 'block';
                showModal();
            } else {
                hideModal();
            }
            event.stopPropagation(); // Mencegah event klik menyebar
        });

        // Deteksi klik di luar modal untuk menutupnya
        document.addEventListener('click', function(event) {
            if (!modalFilter.contains(event.target) && event.target !== buttonFilter) {
                hideModal();
            }
        });

        // Tampilkan modal jika ada error pada filter
        @if($errors -> any())
        modalFilter.style.display = 'block';
        showModal();
        @endif
    });
</script>
@endpush
