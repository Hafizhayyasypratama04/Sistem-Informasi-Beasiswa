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
    <!-- Content -->
    <div class="content">
        <h1>Detail Beasiswa</h1>
        <div class="row">
            <!-- Card Informasi Beasiswa -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Informasi Beasiswa</h5>
                        <?php
                        require_once('../../koneksi.php');

                        // Pastikan Id_beasiswa ada dan merupakan angka
                        if (isset($_GET['Id_beasiswa']) && is_numeric($_GET['Id_beasiswa'])) {
                            $Id_beasiswa = $_GET['Id_beasiswa'];

                            // Fetch beasiswa data
                            $sql_beasiswa = "SELECT * FROM beasiswa WHERE Id_beasiswa = $Id_beasiswa";
                            $result_beasiswa = $conn->query($sql_beasiswa);

                            if ($result_beasiswa) {
                                if ($result_beasiswa->num_rows > 0) {
                                    $row_beasiswa = $result_beasiswa->fetch_assoc();
                                    echo "<p><strong>ID Beasiswa: </strong>" . $row_beasiswa['Id_beasiswa'] . "</p>";
                                    echo "<p><strong>Nama Beasiswa: </strong>" . $row_beasiswa['Nama_beasiswa'] . "</p>";
                                    echo "<p><strong>Deskripsi: </strong>" . $row_beasiswa['deskripsi'] . "</p>";
                                    echo "<p><strong>Tanggal Buka: </strong>" . $row_beasiswa['open_date'] . "</p>";
                                    echo "<p><strong>Tanggal Tutup: </strong>" . $row_beasiswa['close_date'] . "</p>";
                                } else {
                                    echo "<p>Beasiswa not found.</p>";
                                }
                            } else {
                                echo "Error fetching beasiswa: " . $conn->error;
                            }
                        } else {
                            echo "<p>Invalid or missing Id_beasiswa parameter.</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!-- Card Daftar Pendaftar -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Pendaftar</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID Pendaftar</th>
                                        <th>Nama</th>
                                        <th>IPK</th>
                                        <th>Berkas</th>
                                        <th>Status</th>
                                        <th>Seleksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Pastikan Id_beasiswa ada dan merupakan angka
                                    if (isset($Id_beasiswa)) {
                                        $Id_beasiswa = $_GET['Id_beasiswa'];
                                        // Fetch pendaftar data
                                        $sql_pendaftar = "SELECT * FROM pendaftaran p INNER JOIN mahasiswa m ON p.NIM = m.NIM WHERE Id_beasiswa = '$Id_beasiswa' ORDER BY m.IPK DESC";
                                        $result_pendaftar = $conn->query($sql_pendaftar);

                                        if ($result_pendaftar) {
                                            if ($result_pendaftar->num_rows > 0) {
                                                while ($row_pendaftar = $result_pendaftar->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row_pendaftar['No_pendaftaran'] . "</td>";

                                                    // Retrieve mahasiswa's name
                                                    $nim = $row_pendaftar['NIM'];
                                                    $sql_mahasiswa = "SELECT Nama FROM mahasiswa WHERE NIM = '$nim'";
                                                    $result_mahasiswa = $conn->query($sql_mahasiswa);

                                                    if ($result_mahasiswa) {
                                                        if ($result_mahasiswa->num_rows > 0) {
                                                            $row_mahasiswa = $result_mahasiswa->fetch_assoc();
                                                            echo "<td>" . $row_mahasiswa['Nama'] . "</td>";
                                                        } else {
                                                            echo "<td>N/A</td>";
                                                        }
                                                    } else {
                                                        echo "<td>Error fetching mahasiswa</td>";
                                                    }

                                                    // Retrieve mahasiswa's gpa
                                                    $nim = $row_pendaftar['NIM'];
                                                    $sql_mahasiswa = "SELECT IPK FROM mahasiswa WHERE NIM = '$nim'";
                                                    $result_mahasiswa = $conn->query($sql_mahasiswa);

                                                    if ($result_mahasiswa) {
                                                        if ($result_mahasiswa->num_rows > 0) {
                                                            $row_mahasiswa = $result_mahasiswa->fetch_assoc();
                                                            echo "<td>" . $row_mahasiswa['IPK'] . "</td>";
                                                        } else {
                                                            echo "<td>N/A</td>";
                                                        }
                                                    } else {
                                                        echo "<td>Error fetching mahasiswa</td>";
                                                    }

                                                    echo "<td>" . $row_pendaftar['status'] . "</td>";
                                                    echo "<td>" . $row_pendaftar['status_penerimaan'] . "</td>";

                                                    // Validasi button
                                                    echo "<td>";
                                                    echo "<a href='validasi.php?status=valid&No_pendaftaran=".$row_pendaftar['No_pendaftaran']."&Id_beasiswa=".$Id_beasiswa."' class='btn btn-success ms-2'><i class='fas fa-check text-white'></i></a>";
                                                    echo "<a href='validasi.php?status=invalid&No_pendaftaran=".$row_pendaftar['No_pendaftaran']."&Id_beasiswa=".$Id_beasiswa."' class='btn btn-danger ms-2'><i class='fas fa-times text-white'></i></a>";
                                                    echo "</td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='5'>No pendaftar found</td></tr>";
                                            }
                                        } else {
                                            echo "Error fetching pendaftar: " . $conn->error;
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content end -->

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>