<div class="modal fade text-left" id="modal-action" tabindex="-1" aria-labelledby="myModalLabel4" data-bs-backdrop="false"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel4">Unggah Surat Pengantar</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('ajukan-pinjam') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <input type="hidden" id="inputKodeBarang" value="" name="kode_barang">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" id="name" class="form-control" name="name"
                                        placeholder="Nama Peminjam/Penanggung Jawab">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="no_hp" class="form-label">Nomor HP/WA</label>
                                    <input type="text" id="no_hp" class="form-control" name="no_hp"
                                        placeholder="Nomor HP/WA">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="surat_peminjaman" class="form-label">Surat Peminjaman</label>
                            <input type="file" id="surat_peminjaman" class="form-control" name="surat_peminjaman">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <div class="col-12 d-flex justify-content-end">
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Batal</button>
                    <button type="submit" class="btn btn-primary me-1 mb-1">Kirim</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
