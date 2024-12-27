@extends('layouts.admin') 
@push('css')
<!-- Custom styles for this page -->
<link href="{{ url('') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush 

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-0 text-gray-800 mb-4">Keranjang Sewa</h1>


<div class="row">
  <div class="col-12">
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <div class="row">
                  <div class="col-6">
                      <h6 class="mt-2 font-weight-bold text-primary">Stok Barang</h6>
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
                        <th>Nama keranjang</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Tujuan Sewa</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr >
                        <th>Nama keranjang</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Tujuan Sewa</th>
                          <th>Aksi</th>
                      </tr>
                  </tbody>
                  <tfoot></tfoot>
              </table>
          </div>
      </div>
</div>
</div>
@endsection



{{-- @push('scripts')


<!-- Page level plugins -->
<script src="{{ url('') }}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script>
  //Call the dataTables jQuery plugin
  $(document).ready(function() {
    $('#dataTable').DataTable({
  processing: true,
  serverSide: true,
  ajax: {
    url: "{{ route('master/barang.get_datatable') }}",
    type: 'GET', // Jika diperlukan
  },
  columns: [
    { data: 'image_url', name: 'image_url' },
    { data: 'namabarang', name: 'namabarang' },
    { data: 'harga', name: 'harga' },
    { data: 'stok_barang', name: 'stok_barang' },
    { data: 'merk', name: 'merk' },
    { data: 'deskripsi_barang', name: 'deskripsi_barang' },
    { data: 'kategori_barang', name: 'kategori_barang' }, 
    { data: 'action', name: 'action', orderable: false, searchable: false },
  ],
  order: [[0, 'asc']],
});

    
  });
</script>


<script>
    $('body').on('click', '#btn-create', function () {
       //open modal
       console.log('ok');
       
       $('#modal-create').modal('show');
   });
    $('body').on('click', '#btn-edit', function () {
       //open modal
       console.log('ok');

        var data_id = $(this).data('id');
        console.log(data_id);
        $.ajax({
            url: `{{ url('master/barang/show/${data_id}') }}`,
            type: "GET",
            cache: false,
            success: function (response) {
                console.log(response);
                $('#barang_id').val(response.barang.id)
                $('#namabarang_edit').val(response.barang.namabarang);
                $('#deskripsi_barang_edit').val(response.barang.deskripsi_barang);
                $('#harga_edit').val(response.barang.harga);
                $('#stok_barang_edit').val(response.barang.stok_barang);

                var image_url = `{{ url('uploads') }}/${response.barang.image_url}`; 
                $('#gambar-show').attr('src',image_url)

                $('#old_image_url').val(response.barang.image_url);
                $('#merk_edit').val(response.barang.merk);
                $('#kategori_barang_edit').val(response.barang.kategori_barang);
            },
        });
        

       
       $('#modal-edit').modal('show');
   });


   
//    Store Modal
$('#store').click(function (e) { 
        e.preventDefault();
        let namabarang   = $('#namabarang').val();
        let deskripsi_barang  = $('#deskripsi_barang').val();
        let harga  = $('#harga').val();
        let stok_barang = $('#stok_barang').val();
        let image_url = $('#image_url')[0].files?.[0] == undefined ? '' : $('#image_url')[0].files?.[0] ;
        let merk   = $('#merk').val();
        let kategori_barang   = $('#kategori_barang').val();
        let token   = $("meta[name='csrf-token']").attr("content");

        var form = new FormData();

        form.append('namabarang', namabarang);
        form.append('deskripsi_barang', deskripsi_barang);
        form.append('harga', harga);
        form.append('stok_barang', stok_barang);
        form.append('image_url', image_url);
        form.append('merk', merk);
        form.append('kategori_barang', kategori_barang);
        form.append('_token', token);
  
        $.ajax({
            url: `{{ route('master/barang.post_store') }}`,
            type: "POST",
            cache: false,
            processData: false,
            contentType: false,

            data: form,
            success: function (response) {
                swal.fire({
                    icon: `${response.icon}`,
                    title: `${response.title}`,
                    text: `${response.text}`,
                    showConfirmButton: false,
                    timer: 3000
                });
  
                //clear form
                $('#image_url').val('');
                $('#namabarang').val('');
                $('#merk').val('');
                $('#harga').val('');
                $('#deskripsi_barang').val('');
  
                //close modal
                $('#modal-create').modal('hide');
                $('#dataTable').DataTable().ajax.reload();
            },
            error: function (error) {
              console.log(error);
              if (error.responseJSON.kategori_barang?.[0]) { 
                toastr.error(error.responseJSON.kategori_barang[0]);
              }
              if (error.responseJSON.merk?.[0]) { 
                toastr.error(error.responseJSON.merk[0]);
              }
              if (error.responseJSON.image_url?.[0]) { 
                toastr.error(error.responseJSON.image_url[0]);
              }
              if (error.responseJSON.stok_barang?.[0]) { 
                toastr.error(error.responseJSON.stok_barang[0]);
              }
              if (error.responseJSON.harga?.[0]) { 
                toastr.error(error.responseJSON.harga[0]);
              }
              if (error.responseJSON.deskripsi_barang?.[0]) { 
                toastr.error(error.responseJSON.deskripsi_barang[0]);
              }
              
              if (error.responseJSON.namabarang?.[0]) { 
                toastr.error(error.responseJSON.namabarang[0]);
              }
            }
        });
    });



$('#update').click(function (e) { 
        e.preventDefault();
        let namabarang   = $('#namabarang_edit').val();
        let deskripsi_barang  = $('#deskripsi_barang_edit').val();
        let harga  = $('#harga_edit').val();
        let stok_barang = $('#stok_barang_edit').val();
        let image_url = $('#image_url_edit')[0].files?.[0] == undefined ? '' : $('#image_url_edit')[0].files?.[0] ;
        let old_image_url = $('#old_image_url').val();
        let merk   = $('#merk_edit').val();
        let kategori_barang   = $('#kategori_barang_edit').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        let barang_id = $('#barang_id').val();

        var form = new FormData();

        form.append('namabarang', namabarang);
        form.append('deskripsi_barang', deskripsi_barang);
        form.append('harga', harga);
        form.append('stok_barang', stok_barang);
        form.append('image_url', image_url);
        form.append('old_image_url', old_image_url);
        form.append('merk', merk);
        form.append('kategori_barang', kategori_barang);
        form.append('_token', token);
  
        $.ajax({
            url: `{{ url('master/barang/update/${barang_id}') }}`,
            type: "POST",
            cache: false,
            processData: false,
            contentType: false,

            data: form,
            success: function (response) {
                swal.fire({
                    icon: `${response.icon}`,
                    title: `${response.title}`,
                    text: `${response.text}`,
                    showConfirmButton: false,
                    timer: 3000
                });
  
                //clear form
                $('#image_url').val('');
                $('#namabarang').val('');
                $('#merk').val('');
                $('#harga').val('');
                $('#deskripsi_barang').val('');
  
                //close modal
                $('#modal-create').modal('hide');
                $('#dataTable').DataTable().ajax.reload();
            },
            error: function (error) {
              console.log(error);
              if (error.responseJSON.kategori_barang?.[0]) { 
                toastr.error(error.responseJSON.kategori_barang[0]);
              }
              if (error.responseJSON.merk?.[0]) { 
                toastr.error(error.responseJSON.merk[0]);
              }
              if (error.responseJSON.image_url?.[0]) { 
                toastr.error(error.responseJSON.image_url[0]);
              }
              if (error.responseJSON.stok_barang?.[0]) { 
                toastr.error(error.responseJSON.stok_barang[0]);
              }
              if (error.responseJSON.harga?.[0]) { 
                toastr.error(error.responseJSON.harga[0]);
              }
              if (error.responseJSON.deskripsi_barang?.[0]) { 
                toastr.error(error.responseJSON.deskripsi_barang[0]);
              }
              
              if (error.responseJSON.namabarang?.[0]) { 
                toastr.error(error.responseJSON.namabarang[0]);
              }
            }
        });
    });


    // hapus


    $('body').on('click', '#btn-delete', function () {
    let data_id = $(this).data('id');
    let token   = $("meta[name='csrf-token']").attr("content");
    Swal.fire({
      icon: 'warning',
      title: 'Apakah Kamu Yakin?',
      text: "ingin menghapus data ini!",
      showCancelButton: true,
      cancelButtonText: 'TIDAK',
      confirmButtonText: 'YA, HAPUS!'
    }).then((result) => {
      if (result.isConfirmed) {
        console.log('test');
        //fetch to delete data
        $.ajax({
          url: `{{ url('master/barang/destroy/${data_id}') }}`,
          type: "DELETE",
          cache: false,
          data: {
            "_token": token
          },
          success:function(response){ 
            //show success message
            swal.fire({
              icon: `${response.icon}`,
              title: `${response.title}`,
              text: `${response.text}`,
              showConfirmButton: false,
              timer: 3000
            });
            //remove post on table
            $('#dataTable').DataTable().ajax.reload();
          },
          error: function (error) { 
            console.log(error);
            swal.fire({
              icon: `error`,
              title: `Menu`,
              text: `Data Belum Bisa Dihapus!`,
              showConfirmButton: false,
              timer: 3000
            });
          }
        });          
      }
    })

    });


</script> --}}

@endpush

