<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pendaftar Beasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="/dashboard/assets/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f0f0f0;
        }

        .navbar {
            background-color: #66b3ff;
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #66b3ff;
            color: #000;
            padding: 15px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .sidebar .logo img {
            width: 100%;
            height: auto;
        }

        .sidebar .menu {
            margin-top: 50px;
        }

        .sidebar .menu a {
            text-decoration: none;
            color: white;
            display: flex;
            align-items: center;
            padding: 10px;
            margin: 5px 0;
            border-radius: 4px;
        }

        .sidebar .menu i {
            margin-right: 10px;
        }

        .menu-utama {
            padding: 10px;
            margin: 5px 0;
            color: white;
        }

        .menu-utama a:hover {
            background-color: royalblue;
        }

        .sidebar .menu a:hover {
            background-color: rgba(0, 0, 0, 0.1);
        }

        .sidebar .logout {
            margin-top: auto;
            text-align: right;
        }

        .sidebar .logout a {
            text-decoration: none;
            color: white;
            display: flex;
            align-items: center;
            padding: 10px;
            border-radius: 4px;
        }

        .sidebar .logout a:hover {
            background-color: royalblue;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .navbar .form-inline {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .navbar .form-inline .form-control {
            max-width: 600px;
        }

        .navbar .form-inline .btn {
            border: none;
            background: transparent;
            color: white;
            font-size: 18px;
        }

        .navbar .form-inline .btn:hover {
            color: #d3d3d3;
        }

        .navbar .d-flex.align-items-center {
            color: white;
        }

        .navbar .d-flex.align-items-center .fa-user-circle {
            font-size: 24px;
            margin-right: 8px;
        }

        .card {
            margin-bottom: 20px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 20px;
            font-weight: bold;
        }

        .card-text {
            margin-top: 10px;
            color: #333;
        }

        .action-buttons {
            display: flex;
            justify-content: flex-end;
            margin-top: 10px;
        }

        .action-buttons a {
            margin-left: 10px;
            color: #fff;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 4px;
        }

        .action-buttons .btn-success {
            background-color: #28a745;
        }

        .action-buttons .btn-danger {
            background-color: #dc3545;
        }

        .action-buttons a:hover {
            opacity: 0.8;
        }

        .table {
            width: 100%;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .table th,
        .table td {
            padding: 12px;
            text-align: center;
        }

        .table th {
            background-color: #66b3ff;
            color: white;
        }

        .table tbody tr:hover {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <!-- Navbar & sidebar -->
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
                    <i class="fa-solid fa-gauge"></i> Dashboard
                </a>
            </div>
            <div class="menu-utama">
                <h3>Mengelola</h3>
                <a href="../pendaftar/pendaftar.php" class="btn">
                    <i class="fas fa-user-plus"></i> Pendaftar
                </a>
                <a href="../beasiswa/beasiswa.php" class="btn">
                    <i class="fas fa-graduation-cap"></i> Beasiswa
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
        <h1>Detail Pendaftar Beasiswa</h1>
        <div class="row">
            <!-- Card Beasiswa -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Informasi Beasiswa</h5>
                        <?php
                        require_once('../../koneksi.php');

                        // Get beasiswa ID from URL parameter
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
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Status Berkas</th>
                                        <th>Berkas</th>
                                        <th>Validasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Fetch pendaftar data
                                    $sql_pendaftar = "SELECT * FROM pendaftaran WHERE Id_beasiswa = $Id_beasiswa";
                                    $result_pendaftar = $conn->query($sql_pendaftar);

                                    if ($result_pendaftar) {
                                        if ($result_pendaftar->num_rows > 0) {
                                            while ($row_pendaftar = $result_pendaftar->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row_pendaftar['NIM'] . "</td>";

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

                                                echo "<td>" . $row_pendaftar['status'] . "</td>";

                                                // Fetch berkas data
                                                /*
                                                $no_pendaftaran = $row_pendaftar['No_pendaftaran'];
                                                $sql_berkas = "SELECT Nama_file FROM berkas_daftar WHERE No_pendaftaran = $no_pendaftaran";
                                                $result_berkas = $conn->query($sql_berkas);
*/
                                                echo "<td>";
                                                    if ($row_pendaftar['berkas']) {
                                                        echo "<a class='text-decoration-none' href='../../menumahasiswa/beasiswa/berkas/" . $row_pendaftar['berkas'] . "'>" . $row_pendaftar['berkas'] . "</a>";                        
                                                    } else {
                                                        echo "<p>No files uploaded</p>";
                                                    }
                                                echo "</td>";
                                                
                                                echo "<td>";
                                                echo "<div class='action-buttons'>";
                                                echo "<a href='ubahstatus.php?status=valid&No_pendaftaran=".$row_pendaftar['No_pendaftaran']."&Id_beasiswa=".$Id_beasiswa."' class='btn btn-success'><i class='fas fa-check text-white'></i></a>";
                                                echo "<a href='ubahstatus.php?status=invalid&No_pendaftaran=".$row_pendaftar['No_pendaftaran']."&Id_beasiswa=".$Id_beasiswa."' class='btn btn-danger'><i class='fas fa-times text-white'></i></a>";
                                                echo "</div>";
                                                echo "</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='4'>No pendaftar found</td></tr>";
                                        }
                                    } else {
                                        echo "Error fetching pendaftar: " . $conn->error;
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