<?php
session_start();
// ... rest of the code ...
include("../koneksi.php");

$nim = $_SESSION['nim'];
 $data = mysqli_fetch_array(mysqli_query($conn, "SELECT nama FROM mahasiswa WHERE NIM='$nim'"));
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
            /* White background for body */
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #66b3ff;
            /* Lighter blue that complements the logo */
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #66b3ff;
            /* Lighter blue that complements the logo */
            color: #000;
            /* Dark text color for readability */
            padding: 15px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            /* Ensure content is spaced out */
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
            /* Align items to the center */
            padding: 10px;
            margin: 5px 0;
            border-radius: 4px;
        }

        .sidebar .menu i {
            margin-right: 10px;
            /* Space between icon and text */
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
            /* Light color on hover */
        }

        .sidebar .logout {
            margin-top: auto;
            /* Push to bottom */
            text-align: right;
            /* Align to the right */
        }

        .sidebar .logout a {
            text-decoration: none;
            color: white;
            display: flex;
            align-items: center;
            /* Align icon and text */
            padding: 10px;
            border-radius: 4px;
        }

        .sidebar .logout a:hover {
            background-color: royalblue;
        }

        .sidebar .logout i {
            margin-right: 10px;
            /* Space between icon and text */
        }

        .content {
            margin-left: 250px;
            /* Offset for the sidebar */
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
            /* Lighter color on hover */
        }

        .navbar .d-flex.align-items-center {
            color: white;
        }

        .navbar .d-flex.align-items-center .fa-user-circle {
            font-size: 24px;
            /* Adjust icon size */
            margin-right: 8px;
            /* Space between icon and text */
        }
    </style>
</head>

<body>
    <!-- nav -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <!-- Empty space to center search bar -->
            <div class="d-flex justify-content-between w-100">
                <div></div> <!-- Empty div for left spacing -->
                <div></div> <!-- Empty div for right spacing -->
            </div>
            <!-- Profile Info -->
            <div class="d-flex align-items-center text-center" style="margin-right: 40px; padding:20px;">
                <i class="fas fa-user-circle" style="font-size: 35px; color: white; margin-right: 8px;"></i>
                <p class="mb-0 text-white" style="font-size: 25px;"><?php echo $_SESSION['username']; ?></p>
            </div>

        </div>
    </nav>
    <!-- nav end -->
    <!-- Sidebar-->
    <div class="sidebar">
        <div class="logo text-center">
            <img src="../src/img/logo.png" style="height: 150px; width:auto;" alt="Logo">
        </div>
        <div class="menu">
            <div class="menu-utama">
                <a href="menu.php"" class=" btn">
                    <i class="fa-solid fa-house"></i>Home
                </a>
                <a href="beasiswa/beasiswa.php" class="btn">
                <i class="fa-solid fa-user-graduate"></i>Beasiswa
                </a>
                <a href="pengumuman/pengumuman.php" class="btn">
                    <i class="fa-solid fa-bullhorn"></i> Pengumuman
                </a>
                <a href="profile/profile.php" class="btn">
                    <i class="fa-solid fa-user-tie"></i> Profile
                </a>
            </div>
            <!-- Add more menu items here if needed -->
        </div>
        <div class="logout">
            <a href="logout.php" class="btn">
                <i class="fas fa-sign-out-alt"></i> Log Out
            </a>
        </div>
    </div>
    <!-- Sidebar end -->
    
    <div class="content">
        <h1><strong>Selamat datang, <?php echo $data['nama'];?>!</strong></h1>
    </div>


    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>