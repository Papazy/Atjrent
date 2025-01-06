@extends('layouts.admin')
@push('css')
<!-- Custom styles for this page -->
<link href="{{ url('') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
<h1 class="h3 mb-0 text-gray-800 mb-4">Jual</h1>


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
                              <form action="{{ url('/transaksi/jual') }}" method="GET">
                                  <div class="form-group mb-3">
                                      <!-- Input Waktu Mulai -->
                                      <label for="waktu_mulai" class="font-weight-bold">Waktu Mulai</label>
                                      <input type="date" class="form-control" name="waktu_mulai" id="waktu_mulai"
                                          value="{{ old('waktu_mulai', $waktu_mulai) }}" required>

                                      <!-- Input Waktu Akhir -->
                                      <label for="waktu_akhir" class="font-weight-bold mt-3">Waktu Akhir</label>
                                      <input type="date" class="form-control" name="waktu_akhir" id="waktu_akhir"
                                          value="{{ old('waktu_akhir', $waktu_akhir) }}" required>

                                      <!-- Tombol Aksi -->
                                      <div class="mt-4">
                                          <button type="submit" class="btn btn-primary btn-block">Filter</button>
                                          <a href="{{ url('/transaksi/jual') }}" class="btn btn-danger btn-block mt-2">Reset</a>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
                  <div class="col-6">
                      <div class="text-right">
                        <button class="btn btn-success" id="btn-create">
                            <i class="icon fas fa-plus pr-1"></i> Tambah Data
                        </button>
                      </div>
                  </div>
                </div>
          </div>
          <div class="card-body">
              <table class="table table-bordered table-striped table_responsive" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr >
                        <th>No</th>
                        <th>Pembeli</th>
                        <th>Barang</th>
                        <th>Stok Barang</th>
                        <th>Harga</th>
                        <th>Waktu</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                            $i = 1;
                            @endphp
                        @foreach($all_data as $data)
                        <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $data->user->name }}</td>
                                <td>{{ $data->barangs[0]->nama }}</td>
                                <td>{{ $data->stok_barang }}</td>
                                <td>Rp. {{ number_format($data->harga_total + $data->ongkir,0,',','.') }}</td>
                                <td>{{ $data->updated_at->format('d M Y, H:i') }}</td>
                                <td><a href={{ "jual/".$data->id }} type="button" class="btn btn-info" >Detail</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr >
                                <th>No</th>
                                <th>Pembeli</th>
                                <th>Barang</th>
                                <th>Stok Barang</th>
                                <th>Harga</th>
                                <th>Waktu</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
      </div>oo
</div>
</div>


<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="name" class="control-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="">
                </div>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="name" class="control-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="">
                </div>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="name" class="control-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-x"></i></button>
                <button type="button" class="btn btn-primary" id="store"><i class="fa fa-send"></i></button>
            </div>

        </div>
    </div>
</div>


@endsection

@push('scripts')

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


<script>
    $('body').on('click', '#btn-create', function () {
       //open modal
       console.log('ok');
       $('#modal-create').modal('show');
   });


//    Store Modal
$('#store').click(function (e) {
        e.preventDefault();
        let name   = $('#name').val();
        let token   = $("meta[name='csrf-token']").attr("content");

        $.ajax({
            url: `{{ route('transaksi/jual.post_store') }}`,
            type: "POST",
            cache: false,
            data: {
                'name': name,
                '_token': token,
            },
            success: function (response) {
                swal.fire({
                    icon: `${response.icon}`,
                    title: `${response.title}`,
                    text: `${response.text}`,
                    showConfirmButton: false,
                    timer: 3000
                });

                //clear form
                $('#name').val('');

                //close modal
                $('#modal-create').modal('hide');
                $('#dataTable').DataTable().ajax.reload();
            },
            error: function (error) {
              console.log(error);

              if (error.responseJSON.name?.[0]) {
                toastr.error(error.responseJSON.name[0]);
              }
            }
        });
    });


</script>

@endpush
