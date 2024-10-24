<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Beasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../src/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <!-- Navbar & sidebar -->
    <!-- nav -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <!-- Empty space to center search bar -->
            <div class="d-flex justify-content-between w-100">
                <div></div> <!-- Empty div for left spacing -->

                <!-- Search Bar -->
                <form class="d-flex form-inline">
                    <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>

                <div></div> <!-- Empty div for right spacing -->
            </div>

            <!-- Profile Info -->
            <div class="d-flex align-items-center text-center" style="margin-right: 25px;">
                <i class="fas fa-user-circle" style="font-size: 24px; color: white; margin-right: 8px;"></i>
                <p class="mb-0 text-white">User</p>
            </div>
        </div>
    </nav>
    <!-- nav end -->
    <!-- sidebar -->
    <div class="sidebar">
        <div class="logo text-center">
            <img src="../assets/logo.png" style="height: 150px; width:auto;" alt="Logo">
        </div>
        <div class="menu">
            <div class="menu-utama">
                <h3>Menu Utama</h3>
                <a href="../dashboard.php" class="btn">
                    <i class="fa-solid fa-gauge"></i>Dashboard
                </a>
            </div>
            <div class="menu-utama">
                <h3>Mengelola</h3>
                <a href="../pendaftar/pendaftar.php" class="btn">
                    <i class="fas fa-user-plus"></i>Pendaftar
                </a>
                <a href="../beasiswa/beasiswa.php" class="btn">
                    <i class="fas fa-graduation-cap"></i>Beasiswa
                </a>
                <a href="/beasiswa/dashboard/laporan/laporan.php" class="btn">
                    <i class="fa-solid fa-book-open"></i></i>Laporan
                </a>
            </div>
        </div>
        <div class="logout">
            <a href="../logout.php" class="btn">
                <i class="fas fa-sign-out-alt"></i> Log Out
            </a>
        </div>
    </div>
    <!-- sidebar end -->
    <!-- Navbar & sidebar end-->

    <!-- Burger menu for mobile -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light d-lg-none">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../dashboard.php"><i class="fa-solid fa-gauge"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pendaftar/pendaftar.php"><i class="fas fa-user-plus"></i> Pendaftar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../beasiswa/beasiswa.php"><i class="fas fa-graduation-cap"></i> Beasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../mahasiswa/mahasiswa.php"><i class="fa-solid fa-user-tie"></i> Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content text-center">
        <div class="container mt-4">
            <h2 class="mb-4 text-center">Daftar Beasiswa</h2>

            <!-- Button Tambah Beasiswa -->
            <div class="text-end mb-3">
                <a href="tambahbeasiswa.php" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i> Tambah Beasiswa
                </a>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID Beasiswa</th>
                        <th>Nama Beasiswa</th>
                        <th>Thumbnail</th>
                        <th>Syarat</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Buka</th>
                        <th>Tanggal Tutup</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Contoh Baris Data -->
                    <?php
                    include("../../koneksi.php");
                    $bea = mysqli_query($conn, "SELECT * FROM beasiswa");
                    while ($data = mysqli_fetch_array($bea)) {
                    ?>
                        <tr>
                            <td><?php echo $data['Id_beasiswa']; ?></td>
                            <td><?php echo $data['Nama_beasiswa']; ?></td>
                            <td><img src="thumbnail/<?php echo $data['thumbnail']; ?>" alt="Thumbnail" style="height: 50px; width: auto;"></td>
                            <td><?php echo $data['Syarat']; ?></td>
                            <td><?php echo $data['deskripsi']; ?></td>
                            <td><?php echo $data['open_date']; ?></td>
                            <td><?php echo $data['close_date']; ?></td>
                            <td>
                                <a href="ubahbeasiswa.php?Id_beasiswa=<?php echo $data['Id_beasiswa'] ?>" class="btn btn-info btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="hapusbeasiswa.php?Id_beasiswa=<?php echo $data['Id_beasiswa'] ?>" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                <a href="detailbeasiswa.php?Id_beasiswa=<?php echo $data['Id_beasiswa'] ?>" class="btn btn-info btn-sm">
                                    <i class="fa-solid fa-id-card"></i>
                                </a>
                            </td>
                        </tr>
                    <?php }
                    ?>
                    <!-- Baris data lainnya dapat ditambahkan di sini -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>