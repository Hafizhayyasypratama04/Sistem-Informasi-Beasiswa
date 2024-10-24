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

        .card {
            margin-bottom: 20px;
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
        <h1>Beasiswa Tersedia</h1>
        <div class="row">
            <?php
            $nim = $_SESSION['nim'];
            $today = date("Y-m-d");
            $sql = "SELECT * FROM beasiswa b INNER JOIN pendaftaran p ON p.Id_beasiswa = b.Id_beasiswa WHERE b.close_date >= '$today' AND p.NIM != '$nim'";
            $result = $conn->query($sql);
            $sql2 = "SELECT * FROM mahasiswa WHERE NIM='$nim'";
            $result2 = mysqli_fetch_array(mysqli_query($conn, $sql2));

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='col-md-4'>";
                    echo "<div class='card'>";
                    echo "<img src='../../dashboard/beasiswa/thumbnail/" . $row['thumbnail'] . "' class='card-img-top' alt='Thumbnail'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>" . $row['Nama_beasiswa'] . "</h5>";
                    echo "<p class='card-text'>" . $row['deskripsi'] . "</p>";
                    echo "<p class='card-text'><strong>Syarat: </strong>" . $row['Syarat'] . "</p>";
                    echo "<p class='card-text'><strong>Open Date: </strong>" . $row['open_date'] . "</p>";
                    echo "<p class='card-text'><strong>Close Date: </strong>" . $row['close_date'] . "</p>";
                    echo "<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modalDaftar" . $row['Id_beasiswa'] . "'>Daftar Sekarang</button>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";

                    
                    // Modal Form Pendaftaran
                    echo "<div class='modal fade' id='modalDaftar" . $row['Id_beasiswa'] . "' tabindex='-1' aria-labelledby='modalDaftarLabel" . $row['Id_beasiswa'] . "' aria-hidden='true'>";
                    echo "<div class='modal-dialog modal-dialog-centered'>";
                    echo "<div class='modal-content'>";
                    echo "<div class='modal-header'>";
                    echo "<h5 class='modal-title' id='modalDaftarLabel" . $row['Id_beasiswa'] . "'>Form Pendaftaran Beasiswa</h5>";
                    echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
                    echo "</div>";
                    echo "<form action='' method='POST' enctype='multipart/form-data'>";
                    echo "<div class='modal-body'>";
                    echo "<input type='hidden' name='id_beasiswa' value='" . $row['Id_beasiswa'] . "'>";
                    echo "<div class='mb-3'>";
                    echo "<label for='nama_lengkap' class='form-label'>Nama Lengkap</label>";
                    echo "<input type='text' class='form-control' id='nama_lengkap' name='nama_lengkap' value='".$result2['Nama']."' required readonly>";
                    echo "</div>";
                    echo "<div class='mb-3'>";
                    echo "<label for='email' class='form-label'>Email</label>";
                    echo "<input type='email' class='form-control' id='email' name='email' value='".$result2['Email']."' required readonly>";
                    echo "</div>";
                    echo "<div class='mb-3'>";
                    echo "<label for='nomor_telepon' class='form-label'>Nomor Telepon</label>";
                    echo "<input type='text' class='form-control' id='nomor_telepon' value='".$result2['No_Telp']."' name='nomor_telepon' required readonly>";
                    echo "</div>";
                    echo "<div class='mb-3'>";
                    echo "<label for='upload_berkas' class='form-label'>Upload Berkas</label>";
                    echo "<input type='file' class='form-control' id='upload_berkas' name='berkas' accept='.pdf' required>";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class='modal-footer'>";
                    echo "<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Batal</button>";
                    echo "<button type='submit' name='proses' class='btn btn-primary'>Submit</button>";
                    echo "</div>";
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";

                    
                }
            } else {
                echo "<p>No beasiswa available</p>";
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $NIM = $_SESSION['nim'];
                $Tanggal_daftar = date("Y-m-d");
                $Id_beasiswa = $_POST['id_beasiswa'];

                $dir = "berkas/";
                $berkas = $_FILES['berkas']['name'];

                move_uploaded_file($_FILES['berkas']['tmp_name'], $dir.$berkas);
                
                mysqli_query($conn, "INSERT INTO pendaftaran VALUES ('', '$NIM', '$Tanggal_daftar', '$Id_beasiswa', '$berkas', '', '')");
                echo "<script>alert('Pendaftaran beasiswa berhasil!'); window.location.href = 'beasiswa.php';</script>";
            }

            $conn->close();
            ?>
        </div>
    </div>
    <!-- Content end -->

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
