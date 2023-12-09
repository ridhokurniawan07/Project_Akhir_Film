<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Review</h3>

                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="adminhome.php">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">DataReview</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <?php
        include "./koneksi.php";
        $result = mysqli_query($conn, "select * from tb_review");
        ?>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th style="width: 5%;">No</th>
                                <th>Film ID</th>
                                <th>Review Title</th>
                                <th>Review</th>
                                <th>Rating</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($data = mysqli_fetch_array($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $data['film_id']; ?></td>
                                    <td><?php echo $data['review_title']; ?></td>
                                    <td><?php echo $data['review']; ?></td>
                                    <td><?php echo $data['rating']; ?></td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="./models/proseshapusreview.php ?id=<?php echo $data['review_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus review ini?');">Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>