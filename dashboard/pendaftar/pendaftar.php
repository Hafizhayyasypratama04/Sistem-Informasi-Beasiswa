<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Beasiswa</title>
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

        .table-container {
            margin-top: 20px;
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

        .action-button {
            display: flex;
            justify-content: center;
        }

        .action-button a {
            margin: 0 5px;
            color: #fff;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 4px;
            background-color: #66b3ff;
        }

        .action-button a:hover {
            background-color: #3385ff;
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
        <h1>Daftar Beasiswa</h1>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Beasiswa</th>
                        <th>Nama Beasiswa</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Buka</th>
                        <th>Tanggal Tutup</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once('../../koneksi.php');

                    // Fetch beasiswa data
                    $today = date("Y-m-d");
                    $sql = "SELECT * FROM beasiswa WHERE close_date >= '$today'";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['Id_beasiswa'] . "</td>";
                            echo "<td>" . $row['Nama_beasiswa'] . "</td>";
                            echo "<td>" . $row['deskripsi'] . "</td>";
                            echo "<td>" . $row['open_date'] . "</td>";
                            echo "<td>" . $row['close_date'] . "</td>";
                            echo "<td class='action-button'>";
                            echo "<a href='detailpendaftar.php?Id_beasiswa=" . $row['Id_beasiswa'] . "' class='btn'>";
                            echo "<i class='fas fa-info-circle'></i> Detail Pendaftar";
                            echo "</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No beasiswa found</td></tr>";
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
