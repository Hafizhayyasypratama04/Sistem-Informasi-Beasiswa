<?php
session_start();
require_once('../../koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard SIBEA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../src/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="src/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background-color: #ffffff;
            margin: 0;
            padding: 0;
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

        .sidebar .logout i {
            margin-right: 10px;
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
    </style>
</head>

<body>
    <!-- nav -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <div class="d-flex justify-content-between w-100">
                <div></div>
                <div></div>
            </div>
            <div class="d-flex align-items-center text-center" style="margin-right: 40px; padding:20px;">
                <i class="fas fa-user-circle" style="font-size: 35px; color: white; margin-right: 8px;"></i>
                <p class="mb-0 text-white" style="font-size: 25px;"><?php echo $_SESSION['username']; ?></p>
            </div>
        </div>
    </nav>
    <!-- nav end -->

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo text-center">
            <img src="../../src/img/logo.png" style="height: 150px; width:auto;" alt="Logo">
        </div>
        <div class="menu">
            <div class="menu-utama">
                <a href="../menu.php" class="btn">
                    <i class="fa-solid fa-house"></i> Home
                </a>
                <a href="../beasiswa/beasiswa.php" class="btn">
                    <i class="fa-solid fa-user-graduate"></i> Beasiswa
                </a>
                <a href="../pengumuman/pengumuman.php" class="btn">
                    <i class="fa-solid fa-bullhorn"></i> Pengumuman
                </a>
                <a href="../profile/profile.php" class="btn">
                    <i class="fa-solid fa-user-tie"></i> Profile
                </a>
            </div>
        </div>
        <div class="logout">
            <a href="../logout.php" class="btn">
                <i class="fas fa-sign-out-alt"></i> Log Out
            </a>
        </div>
    </div>
    <!-- Sidebar end -->

    <!-- Content -->
    <div class="content">
        <h1>Pengumuman Pendaftaran</h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No Pendaftaran</th>
                        <th>NIM</th>
                        <th>Tanggal Daftar</th>
                        <th>ID Beasiswa</th>
                        <th>Berkas</th>
                        <th>Status Berkas</th>
                        <th>Status Penerimaan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nim = $_SESSION['nim'];
                    $sql = "SELECT * FROM pendaftaran WHERE NIM = $nim";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['No_pendaftaran'] . "</td>";
                            echo "<td>" . $row['NIM'] . "</td>";
                            echo "<td>" . $row['Tanggal_daftar'] . "</td>";
                            echo "<td>" . $row['Id_beasiswa'] . "</td>";
                            echo "<td>";
                            echo "<a class='text-decoration-none' href='../beasiswa/berkas/" . $row['berkas'] . "'>" . $row['berkas'] . "</a>";
                            echo "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            echo "<td>" . $row['status_penerimaan'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No data available</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Content end -->

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
