<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="dist/assets/extensions/choices.js/public/assets/styles/choices.css">


    <link rel="stylesheet" href="dist/assets/css/main/app.css">
    <link rel="stylesheet" href="dist/assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="dist/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="dist/assets/images/logo/favicon.png" type="image/png">

    <style>
        .btn-edit {
            background-color: #008000;
            color: white;
        }
    </style>

    <link rel="stylesheet" href="dist/assets/css/shared/iconly.css">

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="adminhome.php">AdminHome.</a>
                        </div>
                        <div class="theme-toggle d-flex gap-2  align-items-center mt-2">

                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input  me-0" type="checkbox" id="toggle-dark">
                                <label class="form-check-label"></label>
                            </div>

                        </div>
                        <div class="sidebar-toggler  x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item active ">
                            <a href="adminhome.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Data user</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="datauser.php">User</a>
                                </li>

                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Data Genre</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="datagenre.php">Genre</a>
                                </li>

                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Data Film</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="datafilm.php">Film</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Data Aktor</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="dataaktor.php">Aktor</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-title">Sign-Out</li>

                        <div class="sidebar-item  has-sub"></div>
                        <a href="logout.php" class='sidebar-link'>
                            <i class="bi bi-hexagon-fill"></i>
                            <span>Logout</span>
                        </a>
                </div>
            </div>
        </div>
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
                                        <li class="breadcrumb-item"><a href="adminhome.php">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">DataFilm</li>
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
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <label>Nama Film:</label>
                                                    <div class="form-group">
                                                        <input type="text" name="" placeholder="" class="form-control">
                                                    </div>
                                                    <label>Kategori:</label>
                                                    <div class="form-group">
                                                        <select name="" class="form-control" required>
                                                            <option value="">Action</option>
                                                            <option value="">Drama</option>
                                                            <option value="">Comedy</option>
                                                        </select>
                                                    </div>
                                                    <label>Rilis:</label>
                                                    <div class="form-group">
                                                        <input type="date" name="" placeholder="" class="form-control">
                                                    </div>
                                                    <label>Deskripsi:</label>
                                                    <div class="form-group">
                                                        <textarea name="" placeholder="" class="form-control" required></textarea>
                                                    </div>
                                                    <label>Aktor:</label>
                                                    <div class="form-group">
                                                        <select class="choices form-select multiple-remove" multiple="multiple">
                                                            <option value="square">aktor 1</option>
                                                            <option value="rectangle" selected>aktor2</option>
                                                            <option value="rombo">aktor 3</option>
                                                            <option value="romboid">aktor 4</option>
                                                            <option value="trapeze">aktor 5</option>
                                                            <option value="traible" selected>aktor 6</option>
                                                            <option value="polygon">aktor 7</option>
                                                        </select>
                                                    </div>
                                                    <label>Unggah Gambar:</label>
                                                    <div class="form-group">
                                                        <input type="file" name="" class="form-control-file">
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
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editForm">Edit</button>
                                                    <a href=""><button class="btn btn-danger">Hapus</button></a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="modal fade text-left" id="editForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel33">Edit Film</h4>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Tutup">
                                            <i data-feather="x" class="d-block d-sm-none"></i>
                                        </button>
                                    </div>
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <label>Nama Film:</label>
                                            <div class="form-group">
                                                <input type="text" name="" placeholder="" class="form-control">
                                            </div>
                                            <label>Kategori</label>
                                            <div class="form-group">
                                                <input type="text" name="" placeholder="" class="form-control">
                                            </div>
                                            <label>Rilis:</label>
                                            <div class="form-group">
                                                <input type="date" name="" placeholder="" class="form-control">
                                            </div>
                                            <label>Deskripsi:</label>
                                            <div class="form-group">
                                                <textarea name="" placeholder="" class="form-control" required></textarea>
                                            </div>
                                            <label>Aktor:</label>
                                            <div class="form-group">
                                                <select class="choices form-select multiple-remove" multiple="multiple">
                                                    <option value="square">aktor 1</option>
                                                    <option value="rectangle" selected>aktor2</option>
                                                    <option value="rombo">aktor 3</option>
                                                    <option value="romboid">aktor 4</option>
                                                    <option value="trapeze">aktor 5</option>
                                                    <option value="traible" selected>aktor 6</option>
                                                    <option value="polygon">aktor 7</option>
                                                </select>
                                            </div>
                                            <label>Unggah Gambar:</label>
                                            <div class="form-group">
                                                <input type="file" name="" class="form-control-file">
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
                    </section>
                </div>
            </div>
        </div>
        <script src="dist/assets/js/bootstrap.js"></script>
        <script src="dist/assets/js/app.js"></script>


        <script src="dist/assets/extensions/choices.js/public/assets/scripts/choices.js"></script>
        <script src="dist/assets/js/pages/form-element-select.js"></script>
        <!-- Need: Apexcharts -->
        <script src="dist/assets/extensions/apexcharts/apexcharts.min.js"></script>
        <script src="dist/assets/js/pages/dashboard.js"></script>

</body>

</html>