<div class="modal fade text-left" id="editGenreModal<?= $genre['genre_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Edit Kategori</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Tutup">
                    <i data-feather="x" class="d-block d-sm-none"></i>
                </button>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <label>Nama Kategori:</label>
                    <div class="form-group">
                        <input type="text" name="genre_id" value="<?= $genre['genre_id']?>" hidden>
                        <input type="text" name="genre_name" value="<?= $genre['genre_name']?>" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-inline d-sm-none"></i>
                        <span class="d-inline d-sm-none">Tutup</span>
                        <span class="d-none d-sm-inline">Tutup</span>
                    </button>
                    <button type="submit" name="request-update-genre" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-inline d-sm-none"></i>
                        <span class="d-inline d-sm-none">Simpan Perubahan</span>
                        <span class="d-none d-sm-inline">Simpan Perubahan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>