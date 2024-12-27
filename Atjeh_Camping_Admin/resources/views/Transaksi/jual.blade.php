@extends('layouts.admin')
@push('css')
<!-- Custom styles for this page -->
<link href="{{ url('') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                  <div class="col-6">
                      <h6 class="mt-2 font-weight-bold text-primary">Daftar Pesanan jual</h6>
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
                                <td>{{ $data->harga_total }}</td>
                                <td>{{ $data->created_at->format('d M Y, H:i') }}</td>
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
