@extends('layouts.admin') 
@push('css')
<!-- Custom styles for this page -->
<link href="{{ url('') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Merk</th>
                        <th>Deskripsi</th>
                        <th>Kategori</th>
                        <th>Kegunaan</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr >
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Merk</th>
                        <th>Deskripsi</th>
                        <th>Kategori</th>
                        <th>Kegunaan</th>
                          <th>Aksi</th>
                      </tr>
                  </tbody>
                  <tfoot></tfoot>
              </table>
          </div>
      </div>
</div>
</div>


<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="nama" class="control-label">Name</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="">
                </div>
                <div class="form-group">
                    <label for="deskripsi" class="control-label">Deskripsi Barang</label>
                    {{-- <input type="text" class="form-control" id="DeskripsiBarang" name="DeskripsiBarang" placeholder=""> --}}
                    <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="harga" class="control-label">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" placeholder="">
                </div>
                <div class="form-group">
                    <label for="stok_barang" class="control-label">StokBarang</label>
                    <input type="number" class="form-control" id="stok_barang" name="stok_barang" placeholder="">
                </div>
                <div class="form-group">
                    <label for="image_url" class="control-label">Gambar Barang</label>
                    <input type="file" class="form-control" id="image_url" name="image_url" placeholder="">
                </div>
               
                <div class="form-group">
                    <label for="merk" class="control-label">Merk</label>
                    <input type="text" class="form-control" id="merk" name="merk" placeholder="">
                </div>
                <div class="form-group">
                  <label for="kategori">Kategori Barang</label>
                  <select class="form-control" id="kategori" name="kategori" required>
                      <option value="">Pilih Kategori</option>
                      <option value="Alat Tidur">Alat Tidur</option>
                      <option value="Alat Penerangan">Alat Penerangan</option>
                      <option value="Alat Daki">Alat Daki</option>
                      <option value="Alat Memasak">Alat Memasak</option>
                      <option value="Alat Lainnya">Alat Lainnya</option>
                  </select>
              </div>
                <div class="form-group">
                  <label for="is_jual">Kegunaan</label>
                  <select class="form-control" id="is_jual" name="is_jual" required>
                      <option value="">Pilih Kegunaan</option>
                      <option value="Sewa">Sewa</option>
                      <option value="jual">Jual</option>
                  </select>
              </div>
               
            
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-x"></i></button>
                <button type="button" class="btn btn-primary" id="store"><i class="fa fa-send"></i></button>
            </div>

        </div>
    </div>
</div>





{{-- edit --}}


<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <input type="hidden" class="" id="barang_id" name="barang_id" placeholder="">
                <div class="form-group">
                    <label for="nama_edit" class="control-label">Name</label>
                    <input type="text" class="form-control" id="nama_edit" name="nama_edit" placeholder="">
                </div>
                <div class="form-group">
                    <label for="deskripsi_edit" class="control-label">Deskripsi Barang</label>
                    {{-- <input type="text" class="form-control" id="DeskripsiBarang" name="DeskripsiBarang" placeholder=""> --}}
                    <textarea class="form-control" name="deskripsi_edit" id="deskripsi_edit" cols="30" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="harga_edit" class="control-label">Harga</label>
                    <input type="number" class="form-control" id="harga_edit" name="harga_edit" placeholder="">
                </div>
                <div class="form-group">
                    <label for="stok_barang_edit" class="control-label">StokBarang</label>
                    <input type="number" class="form-control" id="stok_barang_edit" name="stok_barang_edit" placeholder="">
                </div>
                <img id="gambar-show" src="" style="width:150px" alt="">
                <input type="hidden" class="" id="old_image_url" name="old_image_url" placeholder="">
                <div class="form-group">
                    <label for="image_url_edit" class="control-label">Gambar Barang</label>
                    <input type="file" class="form-control" id="image_url_edit" name="image_url_edit" placeholder="">
                </div>
               
                <div class="form-group">
                    <label for="merk_edit" class="control-label">Merk</label>
                    <input type="text" class="form-control" id="merk_edit" name="merk_edit" placeholder="">
                </div>
                <div class="form-group">
                  <label for="kategori_edit">Kategori Barang</label>
                  <select class="form-control" id="kategori_edit" name="kategori_edit" required>
                      <option value="">Pilih Kategori</option>
                      <option value="Alat Tidur">Alat Tidur</option>
                      <option value="Alat Penerangan">Alat Penerangan</option>
                      <option value="Alat Daki">Alat Daki</option>
                      <option value="Alat Memasak">Alat Memasak</option>
                      <option value="Alat Lainnya">Alat Lainnya</option>
                  </select>
              </div>
              <div class="form-group">
                <label for="is_jual_edit">Kegunaan</label>
                <select class="form-control" id="is_jual_edit" name="is_jual_edit" required>
                    <option value="">Pilih Kegunaan</option>
                    <option value="Sewa">Sewa</option>
                    <option value="jual">Jual</option>
                </select>
            </div>
               
            
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-x"></i></button>
                <button type="button" class="btn btn-primary" id="update"><i class="fa fa-send"></i></button>
            </div>

        </div>
    </div>
</div>


@endsection

@push('scripts')


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
    { data: 'nama', name: 'nama' },
    { data: 'harga', name: 'harga' },
    { data: 'stok_barang', name: 'stok_barang' },
    { data: 'merk', name: 'merk' },
    { data: 'deskripsi', name: 'deskripsi' },
    { data: 'kategori', name: 'kategori' }, 
    { data: 'is_jual', name: 'is_jual' }, 
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
                $('#nama_edit').val(response.barang.nama);
                $('#deskripsi_edit').val(response.barang.deskripsi);
                $('#harga_edit').val(response.barang.harga);
                $('#stok_barang_edit').val(response.barang.stok_barang);
                var image_url = `{{ url('uploads') }}/${response.barang.image_url}`; 
                $('#gambar-show').attr('src',image_url)
                $('#old_image_url').val(response.barang.image_url);
                $('#merk_edit').val(response.barang.merk);
                $('#kategori_edit').val(response.barang.kategori);
                $('#is_jual_edit').val(response.barang.is_jual);
            },
        });
        

       
       $('#modal-edit').modal('show');
   });


   
//    Store Modal
$('#store').click(function (e) { 
        e.preventDefault();
        let nama   = $('#nama').val();
        let deskripsi  = $('#deskripsi').val();
        let harga  = $('#harga').val();
        let stok_barang = $('#stok_barang').val();
        let image_url = $('#image_url')[0].files?.[0] == undefined ? '' : $('#image_url')[0].files?.[0] ;
        let merk   = $('#merk').val();
        let kategori   = $('#kategori').val();
        let is_jual   = $('#is_jual').val();
        let token   = $("meta[name='csrf-token']").attr("content");

        var form = new FormData();

        form.append('nama', nama);
        form.append('deskripsi', deskripsi);
        form.append('harga', harga);
        form.append('stok_barang', stok_barang);
        form.append('image_url', image_url);
        form.append('merk', merk);
        form.append('kategori', kategori);
        form.append('kategori', kategori);
        form.append('is_jual', is_jual);
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
                $('#nama').val('');
                $('#merk').val('');
                $('#harga').val('');
                $('#deskripsi').val('');
                $('#stok_barang').val('');
                $('#kategori').val('');
                $('#is_jual').val('');
  
                //close modal
                $('#modal-create').modal('hide');
                $('#dataTable').DataTable().ajax.reload();
            },
            error: function (error) {
              console.log(error);
              if (error.responseJSON.is_jual?.[0]) { 
                toastr.error(error.responseJSON.is_jual[0]);
              }
              if (error.responseJSON.kategori?.[0]) { 
                toastr.error(error.responseJSON.kategori[0]);
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
              if (error.responseJSON.deskripsi?.[0]) { 
                toastr.error(error.responseJSON.deskripsi[0]);
              }
              
              if (error.responseJSON.nama?.[0]) { 
                toastr.error(error.responseJSON.nama[0]);
              }
            }
        });
    });



$('#update').click(function (e) { 
        e.preventDefault();
        let nama   = $('#nama_edit').val();
        let deskripsi  = $('#deskripsi_edit').val();
        let harga  = $('#harga_edit').val();
        let stok_barang = $('#stok_barang_edit').val();
        let image_url = $('#image_url_edit')[0].files?.[0] == undefined ? '' : $('#image_url_edit')[0].files?.[0] ;
        let old_image_url = $('#old_image_url').val();
        let merk   = $('#merk_edit').val();
        let kategori =$('#kategori_edit').val();
        let is_jual   = $('#is_jual_edit').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        let barang_id = $('#barang_id').val();

        var form = new FormData();

        form.append('nama', nama);
        form.append('deskripsi', deskripsi);
        form.append('harga', harga);
        form.append('stok_barang', stok_barang);
        form.append('image_url', image_url);
        form.append('old_image_url', old_image_url);
        form.append('merk', merk);
        form.append('kategori', kategori);
        form.append('is_jual', is_jual);
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
                $('#nama').val('');
                $('#merk').val('');
                $('#harga').val('');
                $('#deskripsi').val('');
  
                //close modal
                $('#modal-edit').modal('hide');
                $('#dataTable').DataTable().ajax.reload();
            },
            error: function (error) {
              console.log(error);
              
              
              if (error.responseJSON.is_jual?.[0]) { 
                toastr.error(error.responseJSON.is_jual[0]);
              }
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


</script>

@endpush

