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
                        <h3>Data Film</h3>

                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../../adminhome.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">DataFilm</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <?php
            include "./koneksi.php";
            $tb_film = mysqli_query($conn, "select * from tb_film");
            $tb_actor = mysqli_query($conn, "select * from tb_actor");
            $tb_genre = mysqli_query($conn, "select * from tb_genre");
            ?>
            <section class="section">
                <div class="card">
                    <div class="card-body">
                        <div class="buttons">
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#inlineForm">
                                Tambahkan Film
                            </button>
                        </div>

                        <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel33">Tambah Film</h4>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Tutup">
                                            <i data-feather="x" class="d-block d-sm-none"></i>
                                        </button>
                                    </div>
                                    <form action="./models/prosestambahfilm.php" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <label>Nama Film:</label>
                                            <div class="form-group">
                                                <input type="text" name="film_name" placeholder="" class="form-control">
                                            </div>
                                            <label>Kategori:</label>
                                            <div class="form-group">
                                                <select name="genre_id" class="form-control" required>
                                                    <?php foreach ($tb_genre as $data) { ?>
                                                        <option value="<?php echo $data['genre_id'] ?>"><?php echo $data['genre_id'] . ' - ' . $data['genre_name'] ?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <label>Rilis:</label>
                                            <div class="form-group">
                                                <input type="date" name="film_release" placeholder="" class="form-control">
                                            </div>
                                            <label>Deskripsi:</label>
                                            <div class="form-group">
                                                <textarea name="film_description" placeholder="" class="form-control" required></textarea>
                                            </div>
                                            <label>Aktor:</label>
                                            <div class="form-group">
                                                <select name="actor_id[]" class="choices form-select multiple-remove" multiple="multiple">
                                                    <?php foreach ($tb_actor as $data) { ?>
                                                        <option value="<?php echo $data['actor_id'] ?>"><?php echo $data['actor_id'] . ' - ' . $data['name_actor'] ?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <label>Unggah Gambar:</label>
                                            <div class="form-group">
                                                <input type="file" name="film_image" class="form-control-file">
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



                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Film</th>
                                        <th>Kategori</th>
                                        <th>Rilis</th>
                                        <th>Deskripsi</th>
                                        <th>Aktor</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include "./koneksi.php";

                                    $query = "SELECT tb_film.film_id, tb_film.film_name, tb_genre.genre_name, tb_film.film_release, tb_film.film_description, GROUP_CONCAT(tb_actor.name_actor) 
                                    AS actors, tb_film.film_image
                                    FROM tb_film
                                    LEFT JOIN tb_genre ON tb_film.genre_id = tb_genre.genre_id
                                    LEFT JOIN tb_film_actor ON tb_film.film_id = tb_film_actor.film_id
                                    LEFT JOIN tb_actor ON tb_film_actor.actor_id = tb_actor.actor_id
                                    GROUP BY tb_film.film_id";
                                    $result = mysqli_query($conn, $query);
                                    $no = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>

                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row['film_name']; ?></td>
                                            <td><?php echo $row['genre_name']; ?></td>
                                            <td><?php echo date_format(date_create($row["film_release"]), 'd/m/Y'); ?></td>
                                            <td><?php echo $row["film_description"]; ?></td>
                                            <td><?php echo $row["actors"]; ?></td>
                                            <td> <img src='images/<?php echo $row["film_image"]; ?>' alt='Film Image' style='width: 50px; height: auto;'></td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editForm<?php echo $row['film_id']; ?>">Edit</button>
                                                    <a href="./models/prosesdeletefilm.php ?id=<?php echo $row['film_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('delete?');">Hapus</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php  } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM tb_film");
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <div class="modal fade text-left" id="editForm<?php echo $row['film_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel33">Edit Film</h4>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Tutup">
                                            <i data-feather="x" class="d-block d-sm-none"></i>
                                        </button>
                                    </div>
                                    <form action="./models/proseseditfilm.php" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <input type="hidden" name="film_id" value="<?php echo $row['film_id']; ?>">
                                            <label>Nama Film:</label>
                                            <div class="form-group">
                                                <input type="text" name="film_name" value="<?php echo $row['film_name']; ?>" class="form-control">
                                            </div>
                                            <label>Kategori:</label>
                                            <div class="form-group">
                                                <select name="genre_id" class="form-select">
                                                    <?php
                                                    $queryGenre = mysqli_query($conn, "SELECT * FROM tb_genre");
                                                    while ($rowGenre = mysqli_fetch_assoc($queryGenre)) {
                                                        $selected = ($row['genre_id'] == $rowGenre['genre_id']) ? "selected" : "";
                                                        echo "<option value='{$rowGenre['genre_id']}' $selected>{$rowGenre['genre_name']}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <label>Rilis:</label>
                                            <div class="form-group">
                                                <input type="date" name="film_release" value="<?php echo $row['film_release']; ?>" class="form-control">
                                            </div>
                                            <label>Deskripsi:</label>
                                            <div class="form-group">
                                                <textarea name="film_description" class="form-control" required><?php echo $row['film_description']; ?></textarea>
                                            </div>
                                            <label>Aktor:</label>
                                            <div class="form-group">
                                                <select class="choices form-select multiple-remove" name="actors[]" multiple="multiple">
                                                    <?php
                                                    $selectedActors = array();
                                                    $film_id = $row['film_id'];
                                                    $queryActorsForFilm = mysqli_query($conn, "SELECT tb_actor.name_actor FROM tb_film_actor 
                                                    INNER JOIN tb_actor ON tb_film_actor.actor_id = tb_actor.actor_id
                                                    WHERE tb_film_actor.film_id = $film_id");
                                                    while ($rowActor = mysqli_fetch_assoc($queryActorsForFilm)) {
                                                        $selected = (in_array($rowActor['name_actor'], $selectedActors)) ? "selected" : "";
                                                        echo "<option value='{$rowActor['name_actor']}' $selected>{$rowActor['name_actor']}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <label>Unggah Gambar:</label>
                                            <div class="form-group">
                                                <input type="file" name="film_image" class="form-control-file">
                                                <?php
                                                $gambarFilm = $row['film_image']; // Ganti dengan kolom yang sesuai pada tabel film
                                                echo "<img src='images/{$gambarFilm}' alt='Gambar Film' class='mt-1' style='max-width: 50px;'>";
                                                ?>
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