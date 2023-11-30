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
                        <h3>Data Genre</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="adminhome.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">datakategori</li>
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
                                Tambahkan Genre
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Genre</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 0;
                                $genreList = $genreModel->requestGenreList();
                                if (isset($genreList)) {
                                    foreach ($genreList as $genre) {
                                        $no++;
                                        include './pages/admin/components/cell/genre_cell.php';
                                        include './pages/admin/components/modals/edit_genre_modal.php';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </section>
        </div>
    </div>
</div>
<?php include_once './pages/admin/components/modals/create_genre_modal.php';?>
        