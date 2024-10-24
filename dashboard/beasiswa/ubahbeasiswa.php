<?php
    include '../../koneksi.php';
    $Id_beasiswa = $_GET['Id_beasiswa'];
    $beasiswa = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM beasiswa WHERE Id_beasiswa = '$Id_beasiswa'"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Beasiswa</title>
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

    <!-- Navbar & sidebar end-->

    <div class="content">
        <div class="container mt-4">
            <h2 class="mb-4">Ubah Beasiswa</h2>

            <form  action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama_beasiswa" class="form-label">Nama Beasiswa</label>
                    <input type="text" class="form-control" id="nama_beasiswa" name="nama_beasiswa" value="<?php echo htmlspecialchars($beasiswa['Nama_beasiswa']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="syarat" class="form-label">Syarat</label>
                    <textarea class="form-control" id="syarat" name="syarat" rows="3" required><?php echo htmlspecialchars($beasiswa['Syarat']); ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?php echo htmlspecialchars($beasiswa['deskripsi']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="open_date" class="form-label">Tanggal Buka</label>
                    <input type="date" class="form-control" id="open_date" name="open_date" value="<?php echo htmlspecialchars($beasiswa['open_date']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="close_date" class="form-label">Tanggal Tutup</label>
                    <input type="date" class="form-control" id="close_date" name="close_date" value="<?php echo htmlspecialchars($beasiswa['close_date']); ?>" required>
                </div>
                <input type="submit" name="proses" value="Simpan Perubahan" class="btn btn-primary">
                <a href="beasiswa.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
if (isset($_POST['proses'])){
    include '../../koneksi.php';

    $Id_beasiswa = $_GET['Id_beasiswa'];
    $nama_beasiswa = $_POST['nama_beasiswa'];
    $syarat = $_POST['syarat'];
    $deskripsi = $_POST['deskripsi'];
    $open_date = $_POST['open_date'];
    $close_date = $_POST['close_date'];
    
    mysqli_query($conn, "update beasiswa set Nama_beasiswa='$nama_beasiswa', Syarat='$syarat', deskripsi='$deskripsi', open_date='$open_date', close_date='$close_date' where Id_beasiswa='$id_beasiswa'");
    echo "<script>window.location.href = 'beasiswa.php';</script>";

}
?>