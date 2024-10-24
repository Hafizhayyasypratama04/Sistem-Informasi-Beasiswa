<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pendaftar</title>
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
                <a href="../mahasiswa/mahasiswa.php" class="btn">
                    <i class="fa-solid fa-user-tie"></i>Mahasiswa
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

 <div class="container mt-4 text-center" style="margin-left: 235px;">
        <h2>Daftar Mahasiswa</h2><br>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>No. Telp</th>
                        <th>Email</th>
                        <th>Prodi</th>
                        <th>Semester</th>
                        <th>IPK</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Include your database connection file
                    include '../../koneksi.php';

                    // Query to fetch mahasiswa data
                    $sql = "SELECT * FROM mahasiswa";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['NIM'] . "</td>";
                            echo "<td>" . $row['Nama'] . "</td>";
                            echo "<td>" . $row['Tanggal_Lahir'] . "</td>";
                            echo "<td>" . $row['Alamat'] . "</td>";
                            echo "<td>" . $row['No_Telp'] . "</td>";
                            echo "<td>" . $row['Email'] . "</td>";
                            echo "<td>" . $row['Prodi'] . "</td>";
                            echo "<td>" . $row['Semester'] . "</td>";
                            echo "<td>" . $row['IPK'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9'>Tidak ada data mahasiswa</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>