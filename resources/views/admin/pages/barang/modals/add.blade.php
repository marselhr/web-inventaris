<div class="modal fade text-left" id="modalAdd" tabindex="-1" aria-labelledby="myModalLabel160" data-bs-backdrop="false"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title white" id="myModalLabel160">Tambah Barang Inventaris
                </h5>
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
                <form action="{{ route('admin.barang.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="cover">Sampul</label>
                                <input class="form-control" type="file" name="cover" id="cover"
                                    accept="image/png, image/gif, image/jpeg" />
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-12 col-md-6">

                                <div class="form-group">
                                    <label class="form-label" for="qty">Jumlah Barang</label>
                                    <input class="form-control" type="number" min="1" name="qty"
                                        id="qty">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">

                                <div class="form-group">
                                    <label class="form-label" for="buy_year">Tahun Pengadaan</label>
                                    <input class="form-control" type="number" min="1" name="buy_year"
                                        id="buy_year">
                                </div>
                            </div>
                        </div>
                        <div class="row">


                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="harga_sewa" class="form-label">Harga Sewa</label>
                                    <input type="number" min="1" class="form-control" id="harga_sewa"
                                        name="harga_sewa" />
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" name="status" id="basicSelect">
                                        <option value="b">Baik</option>
                                        <option value="kb">Kurang Baik</option>
                                        <option value="rb">Rusak Berat</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="kategori" class="form-label">Kategori</label>
                                    <select class="form-select" name="kategori" id="kategori">
                                        <option value="1">Bendera/Kain</option>
                                        <option value="2">Elektronik</option>
                                        <option value="3">Meja/Kursi</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-12 col-md-6">

                                <label for="email">Kode: </label>
                                <div class="form-group">
                                    <input id="name" name="kode" type="text" placeholder="Kode  Barang"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="email">Nama: </label>
                                <div class="form-group">
                                    <input id="name" name="name" type="text" placeholder="Nama  Barang"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                        <label for="description">Deskripsi </label>
                        <div class="form-group">
                            <textarea id="description" type="text" placeholder="Deskripsi Singkat Barang" class="form-control"
                                name="description"></textarea>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Batal</span>
                </button>
                <button type="submit" class="btn btn-primary ms-1">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Simpan</span>
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
