<?php
session_start();

// Periksa apakah session 'username' dan 'role' sudah ter-set dan role-nya adalah 'admin'
if (!isset($_SESSION['username']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    // Jika tidak, redirect ke halaman login
    header("Location: ../index.php");
    exit(); // Penting untuk menghentikan eksekusi script lebih lanjut
}

include("../koneksi.php");

$today = date("Y-m-d");
$akun = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) AS akun FROM mahasiswa"));
$aktif = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) AS aktif FROM beasiswa WHERE close_date >= '$today'"));
$done = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) AS done FROM beasiswa WHERE close_date < '$today'"));

$mhs = mysqli_query($conn, "SELECT * FROM mahasiswa");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard SIBEA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../src/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                <p class="mb-0 text-white"><?php echo $_SESSION['username']; ?></p>
            </div>

        </div>
    </nav>
    <!-- nav end -->
    <!-- sidebar -->
    <div class="sidebar">
        <div class="logo text-center">
            <img src="../dashboard/assets/logo.png" style="height: 150px; width:auto;" alt="Logo">
        </div>
        <div class="menu">
            <div class="menu-utama">
                <h3>Menu Utama</h3>
                <a href="#" class="btn">
                    <i class="fa-solid fa-gauge"></i>Dashboard
                </a>
            </div>
            <div class="menu-utama">
                <h3>Mengelola</h3>
                <a href="/beasiswa/dashboard/pendaftar/pendaftar.php" class="btn">
                    <i class="fas fa-user-plus"></i>Pendaftar
                </a>
                <a href="/beasiswa/dashboard/beasiswa/beasiswa.php" class="btn">
                    <i class="fas fa-graduation-cap"></i>Beasiswa
                </a>
                <!--
                <a href="/beasiswa/dashboard/mahasiswa/mahasiswa.php" class="btn">
                    <i class="fa-solid fa-user-tie"></i>Mahasiswa
                </a>
                -->
                <a href="/beasiswa/dashboard/laporan/laporan.php" class="btn">
                    <i class="fa-solid fa-book-open"></i></i>Laporan
                </a>
            </div>
        </div>
        <div class="logout">
            <a href="logout.php" class="btn">
                <i class="fas fa-sign-out-alt"></i> Log Out
            </a>
        </div>
    </div>
    <!-- sidebar end -->
    <!-- Navbar & sidebar end-->

    <div class="content">
        <!-- Cards Section -->
        <div class="container mt-4">
            <div class="row">
                <!-- Card 1: Akun Terdaftar -->
                <div class="col-md-4 mb-4">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <i class="fas fa-users fa-3x mb-3"></i>
                            <h5 class="card-title">Mahasiswa Terdaftar</h5>
                            <p class="card-text"><?php echo $akun['akun']; ?></p>
                        </div>
                    </div>
                </div>
                <!-- Card 2: Beasiswa Aktif -->
                <div class="col-md-4 mb-4">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <i class="fas fa-trophy fa-3x mb-3"></i>
                            <h5 class="card-title">Beasiswa Aktif</h5>
                            <p class="card-text"><?php echo $aktif['aktif']; ?></p>
                        </div>
                    </div>
                </div>
                <!-- Card 3: Beasiswa Selesai -->
                <div class="col-md-4 mb-4">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <i class="fas fa-check-circle fa-3x mb-3"></i>
                            <h5 class="card-title">Beasiswa Selesai</h5>
                            <p class="card-text"><?php echo $done['done']; ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chart Section -->
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Statistik Pendaftar</h5>
                        </div>
                        <div class="card-body">
                            <canvas id="statsChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Daftar Pendaftar Terbaru</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Nomor Telepon</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($data = mysqli_fetch_array($mhs)) {
                                    ?>
                                        <tr>
                                            <td></td>
                                            <td><?php echo $data['Nama']; ?></td>
                                            <td><?php echo $data['Email']; ?></td>
                                            <td><?php echo $data['No_Telp']; ?></td>
                                        </tr>
                                    <?php }
                                    ?>
                                    <!-- Add more rows as needed -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between">
                        <a href="beasiswa/tambahbeasiswa.php" class="btn btn-primary">Tambah Beasiswa</a>
                        <a href="laporan/laporan.php" class="btn btn-secondary">Lihat Laporan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Chart.js example
        const ctx = document.getElementById('statsChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'],
                datasets: [{
                    label: 'Jumlah Pendaftar',
                    data: [10, 20, 15, 25, 30, 20],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>