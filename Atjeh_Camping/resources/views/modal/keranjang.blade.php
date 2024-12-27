<div class="modal fade" id="autoPopup" tabindex="-1" aria-labelledby="popupLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="popupLabel">Buat Keranjang</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Modal Form -->
          <form>
            <div class="mb-3">
              <label for="cartName" class="form-label">Nama Keranjang</label>
              <input type="text" class="form-control" id="cartName" placeholder="Nama Keranjang">
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="startDate" class="form-label">Mulai Sewa</label>
                <select id="startDate" class="form-select">
                  <option value="">Pilih Tanggal Mulai</option>
                  <!-- Tambahkan opsi tanggal -->
                </select>
              </div>
              <div class="col-md-6 mb-3">
                <label for="endDate" class="form-label">Akhir Sewa</label>
                <select id="endDate" class="form-select">
                  <option value="">Pilih Tanggal Akhir</option>
                  <!-- Tambahkan opsi tanggal -->
                </select>
              </div>
              <div class="mb-3">
                <label for="remarks" class="form-label">Keterangan</label>
                <input type="text" class="form-control" id="remarks" placeholder="Keterangan Sewa">
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="button" id="submitKeranjang" class="btn btn-warning" style="color: white">Simpan Keranjang</button>
        </div>
      </div>
    </div>
  </div>