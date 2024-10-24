<?php
session_start();
require_once('../../koneksi.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_SESSION['nim'];
    $nama = $_POST['nama'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $prodi = $_POST['prodi'];
    $semester = $_POST['semester'];
    $ipk = $_POST['ipk'];

    $sql = "UPDATE mahasiswa SET Nama='$nama', Tanggal_Lahir='$tanggal_lahir', Alamat='$alamat', No_Telp='$no_telp', Email='$email', Prodi='$prodi', Semester='$semester', IPK='$ipk' WHERE NIM='$nim'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Fetch user data from the database
$nim = $_SESSION['nim'];
$sql = "SELECT * FROM mahasiswa WHERE NIM='$nim'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "No user found";
    exit();
}
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
    <!-- <div class="sidebar">
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
    </div> -->
    <!-- Sidebar end -->

    <!-- Content -->
    <div class="content">
        <h1>Edit Profile</h1>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['Nama']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $row['Tanggal_Lahir']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $row['Alamat']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="no_telp" class="form-label">No. Telepon</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?php echo $row['No_Telp']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['Email']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="prodi" class="form-label">Prodi</label>
                <input type="text" class="form-control" id="prodi" name="prodi" value="<?php echo $row['Prodi']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="semester" class="form-label">Semester</label>
                <input type="number" class="form-control" id="semester" name="semester" value="<?php echo $row['Semester']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="ipk" class="form-label">IPK</label>
                <input type="text" class="form-control" id="ipk" name="ipk" value="<?php echo $row['IPK']; ?>" required>
            </div>
            <a href="../menu.php" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <!-- Content end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
