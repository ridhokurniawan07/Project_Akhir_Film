<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Data Aktor</h3>

                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="./adminhome.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">DataAktor</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-body">
                        <div class="buttons">
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#inlineForm">
                                Tambahkan Aktor
                            </button>
                        </div>

                        <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel33">Tambah Aktor</h4>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Tutup">
                                            <i data-feather="x" class="d-block d-sm-none"></i>
                                        </button>
                                    </div>
                                    <form action="./models/prosestambahaktor.php" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <label>Nama Aktor:</label>
                                            <div class="form-group">
                                                <input type="text" name="name_actor" placeholder="" class="form-control">
                                            </div>
                                            <label>Tanggal Lahir</label>
                                            <div class="form-group">
                                                <input type="date" name="birth_date" placeholder="" class="form-control">
                                            </div>
                                            <label>Negara:</label>
                                            <div class="form-group">
                                                <input type="text" name="country" placeholder="" class="form-control">
                                            </div>
                                            <label>Deskripsi:</label>
                                            <div class="form-group">
                                                <textarea id="deskripsi" name="actor_description" placeholder="" class="form-control"></textarea>
                                            </div>
                                            <label>Unggah Gambar:</label>
                                            <div class="form-group">
                                                <input type="file" name="gambar" class="form-control-file">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                <i class="bx bx-x d-inline d-sm-none"></i>
                                                <span class="d-inline d-sm-none">Tutup</span>
                                                <span class="d-none d-sm-inline">Tutup</span>
                                            </button>
                                            <button type="submit" name="submit" class="btn btn-primary ml-1">
                                                <i class="bx bx-check d-inline d-sm-none"></i>
                                                <span class="d-inline d-sm-none">Tambahkan</span>
                                                <span class="d-none d-sm-inline">Tambahkan</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Aktor</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Negara</th>
                                    <th>Deskripsi</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <tbody>
                            <tbody>
                            
                                <?php
                                $no = 1; 
                                while ($data = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $data['name_actor']; ?></td>
                                    <td><?php echo date_format(date_create($data['birth_date']), 'd/m/Y'); ?></td>
                                    <td><?php echo $data['country']; ?></td>
                                    <td><?php echo $data['actor_description']; ?></td>
                                    <td><a href="./images/aktor/<?php echo $data['foto'] ?>" target="_blank"> <img src="./images/aktor/<?php echo $data['foto'] ?> " width="50px"></td>
                                    <td></td>
                                    <td>
                                        <div class="d-flex gap-2">
                                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editForm<?= $data['actor_id'] ?>">Edit</button>
                                        <a href="./models/proseshapusaktor.php?actor_id=<?= $data['actor_id'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus aktor ini?')">
                                        <button class="btn btn-danger">Hapus</button>
                                        </div>
                                    </td>
                                </tr>
                                <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
                $query = mysqli_query($conn, "SELECT * FROM tb_actor");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                <div class="modal fade text-left" id="editForm<?= $data['actor_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel33">Edit Aktor</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Tutup">
                                    <i data-feather="x" class="d-block d-sm-none"></i>
                                </button>
                            </div>
                            <form action="./models/proseseditaktor.php" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">

                                    <label>Nama Aktor:</label>
                                    <div class="form-group">
                                    <input type="text" name="name_actor" placeholder="" class="form-control" value="<?= $data['name_actor'] ?>">
                                    </div>
                                    <label>Tanggal Lahir</label>
                                    <div class="form-group">
                                        <input type="date" name="birth_date" placeholder="" class="form-control" value="<?= $data['birth_date'] ?>">
                                    </div>
                                    <label>Negara:</label>
                                    <div class="form-group">
                                    <input type="text" name="country" placeholder="" class="form-control" value="<?= $data['country'] ?>">
                                    </div>
                                    <label>Deskripsi:</label>
                                    <div class="form-group">
                                    <textarea id="deskripsi" name="actor_description" placeholder="" class="form-control"><?= $data['actor_description'] ?></textarea>
                                    </div>
                                    <label>Unggah Gambar:</label>
                                    <div class="form-group">
                                    <img src="./images/aktor/<?php echo $data['foto']; ?>" width="70px">
                                    <input type="file" name="gambar" class="form-control-file">
                                    <input type="hidden" name="actor_id" value="<?= $data['actor_id']; ?>">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-inline d-sm-none"></i>
                                        <span class="d-inline d-sm-none">Tutup</span>
                                        <span class="d-none d-sm-inline">Tutup</span>
                                    </button>
                                    <button type="submit" name="submit" class="btn btn-primary ml-1">
                                        <i class="bx bx-check d-inline d-sm-none"></i>
                                        <span class="d-inline d-sm-none">Simpan Perubahan</span>
                                        <span class="d-none d-sm-inline">Simpan Perubahan</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </section>
        </div>
    </div>
</div>