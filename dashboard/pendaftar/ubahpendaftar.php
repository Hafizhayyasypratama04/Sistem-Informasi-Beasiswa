<?php
    include '../../koneksi.php';
    $No_pendaftaran = $_GET['No_pendaftaran'];
    $pndftr = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM pendaftaran WHERE No_pendaftaran = '$No_pendaftaran'"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Pendaftar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../src/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- Navbar & sidebar -->
    <?php include('../assets/navbar.php') ?>
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
                <a href="../pendaftar/pendaftar.php"" class="btn">
                    <i class="fas fa-user-plus"></i>pendaftar
                <a href="#beasiswa" class="btn">
                    <i class="fas fa-graduation-cap"></i> Beasiswa
                </a>
                <a href="/beasiswa/dashboard/laporan/laporan.php" class="btn">
                    <i class="fa-solid fa-book-open"></i></i>Laporan
                </a>
            </div>
            <!-- Add more menu items here if needed -->
        </div>
        <div class="logout">
            <a href="#logout" class="btn">
                <i class="fas fa-sign-out-alt"></i> Log Out
            </a>
        </div>
    </div>

    <!-- Navbar & sidebar end-->

    <div class="content">
        <div class="container mt-4">
            <h2 class="mb-4">Ubah Data Pendaftar</h2>

            <!-- Formulir Ubah Data Pendaftar -->
            <form action="proses_ubah_pendaftar.php" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nim_utama" class="form-label">NIM Utama</label>
                            <input type="text" class="form-control" id="nim_utama" name="nim_utama" value="1234567890" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="John Doe" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="2000-01-01" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3">Jl. Contoh No. 1</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="no_telp" class="form-label">No Telp</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp" value="08123456789" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="john.doe@example.com" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="prodi" class="form-label">Prodi</label>
                            <input type="text" class="form-control" id="prodi" name="prodi" value="Teknik Informatika" required>
                        </div>
                        <div class="mb-3">
                            <label for="semester" class="form-label">Semester</label>
                            <input type="number" class="form-control" id="semester" name="semester" value="4" required>
                        </div>
                        <div class="mb-3">
                            <label for="ipk" class="form-label">IPK</label>
                            <input type="number" step="0.01" class="form-control" id="ipk" name="ipk" value="3.75" required>
                        </div>
                        <div class="mb-3">
                            <label for="username_indeks" class="form-label">Username Indeks</label>
                            <input type="text" class="form-control" id="username_indeks" name="username_indeks" value="john_doe" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="********" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="pendaftar.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
