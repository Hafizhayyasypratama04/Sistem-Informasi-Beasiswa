<?php
session_start();
include 'koneksi.php';

// Query untuk mengambil informasi beasiswa
$sql = "SELECT * FROM beasiswa WHERE close_date >= CURDATE() ORDER BY open_date DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIBEA | Pendaftaran Beasiswa Polikteknik STMI Jakarta</title>
    <link rel="stylesheet" href="src/css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .bg-gradient-primary {
            background: linear-gradient(90deg, rgba(44, 130, 201, 1) 0%, rgba(91, 134, 229, 1) 100%);
        }

        .navbar-nav {
            margin: auto;
        }
    </style>
</head>

<body>
    <!-- header -->
    <header class="bg-gradient-primary text-white py-5">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><img src="src/img/logo.png" alt="Logo SIBEA" style="height: 75px;"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item"><a class="nav-link" href="#">Beranda</a></li>
                            <li class="nav-item"><a class="nav-link" href="#bea">Beasiswa</a></li>
                            <li class="nav-item"><a class="nav-link" href="#about">Tentang</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Unduhan</a></li>
                        </ul>
                    </div>
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'mahasiswa') : ?>
                        <div class="dropdown">
                            <a class="btn btn-light dropdown-toggle ms-3" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                Halo, <?php echo $_SESSION['username']; ?>
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="menumahasiswa/menu.php">Menu</a></li>
                                <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                            </ul>
                        </div>
                    <?php else : ?>
                        <a class="btn btn-light ms-3" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                    <?php endif; ?>
                </div>
            </nav>

            <div class="row mt-5 align-items-center">
                <div class="col-md-6">
                    <h1 class="display-4">Selamat Datang di Sistem Beasiswa <br> Politeknik STMI jakarta</h1>
                    <p class="lead">Mendapatkan beasiswa menjadi lebih mudah, <br> untuk masa depan yang lebih cerah!</p>
                    <div class="mt-4">
                        <a class="btn btn-warning btn-lg" href="#bea">Daftar Sekarang</a>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <img src="src/img/header-img.png" alt="gambar toga" class="img-fluid" style="max-height: 325px;">
                </div>
            </div>
        </div>
    </header>
    <svg xmlns="http://www.w3.org/2000/svg" style="background-color: white;" viewBox="0 0 1440 320">
        <defs>
            <linearGradient id="header-gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                <stop offset="0%" style="stop-color: rgba(44,130,201,1); stop-opacity: 1"></stop>
                <stop offset="100%" style="stop-color: rgba(91,134,229,1); stop-opacity: 1"></stop>
            </linearGradient>
        </defs>
        <path fill="url(#header-gradient)" fill-opacity="1" d="M0,64L48,85.3C96,107,192,149,288,149.3C384,149,480,107,576,74.7C672,43,768,21,864,26.7C960,32,1056,64,1152,90.7C1248,117,1344,139,1392,149.3L1440,160L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
    </svg>
    <!-- header end -->

    <!-- card info -->
    <div class="container mt-5">
        <div class="custom-card-container">
            <div class="custom-card">
                <h2><span class="counter">1500</span>+</h2>
                <p>PENGGUNA</p>
            </div>
            <div class="custom-card">
                <h2><span class="counter">500</span>+</h2>
                <p>PENERIMA BEASISWA</p>
            </div>
            <div class="custom-card">
                <h2><span class="counter">50</span>+</h2>
                <p>PENAWARAN BEASISWA</p>
            </div>
            <div class="custom-card">
                <h2><span class="counter">15</span>+</h2>
                <p>KERJASAMA</p>
            </div>
        </div>
    </div>
    <!-- card info end -->

    <!-- beasiswa info -->
    <div class="container py-5" id="bea">
        <h1 class="mb-4 text-center"><strong>Beasiswa yang Tersedia</strong></h1>
        <p class="mt-4 text-center">Daftarkan diri Anda pada beasiswa yang sedang menerima pendaftaran.</p>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <div class="col">
                    <div class="card h-100">
                        <img src="dashboard/beasiswa/thumbnail/<?php echo $row['thumbnail']; ?>" class="card-img-top" alt="Thumbnail Beasiswa">
                        <div class="card-body">
                            <h2 class="card-title"><?php echo $row['Nama_beasiswa']; ?></h2>
                            <p class="card-text"><?php echo $row['deskripsi']; ?></p>
                            <p class="card-text"><?php echo $row['Syarat']; ?></p>
                            <p class="card-text"><small class="text-muted">Tanggal Buka: <?php echo $row['open_date']; ?> <br> Tanggal Tutup: <?php echo $row['close_date']; ?></small></p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetail<?php echo $row['Id_beasiswa']; ?>">
                                Detail
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal Detail Beasiswa -->
                <div class="modal fade" id="modalDetail<?php echo $row['Id_beasiswa']; ?>" tabindex="-1" aria-labelledby="modal
DetailLabel<?php echo $row['Id_beasiswa']; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalDetailLabel<?php echo $row['Id_beasiswa']; ?>"><?php echo $row['Nama_beasiswa']; ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="<?php echo $thumbnail; ?>" class="card-img-top mb-3" alt="Thumbnail Beasiswa">
                                <p><?php echo $row['deskripsi']; ?></p>
                                <p><strong>Syarat:</strong> <?php echo $row['Syarat']; ?></p>
                                <p><strong>Tanggal Buka:</strong> <?php echo $row['open_date']; ?></p>
                                <p><strong>Tanggal Tutup:</strong> <?php echo $row['close_date']; ?></p>
                                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'mahasiswa') : ?>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDaftar<?php echo $row['Id_beasiswa']; ?>">
                                        Daftar Sekarang
                                    </button>
                                <?php else : ?>
                                    <a href="#" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#loginModal">Login untuk Daftar</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Detail Beasiswa End -->
                <!-- Modal Form Pendaftaran -->
                <div class="modal fade" id="modalDaftar<?php echo $row['Id_beasiswa']; ?>" tabindex="-1" aria-labelledby="modalDaftarLabel<?php echo $row['Id_beasiswa']; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalDaftarLabel<?php echo $row['Id_beasiswa']; ?>">Form Pendaftaran Beasiswa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="submit_pendaftaran.php" method="POST">
                                <div class="modal-body">
                                    <input type="hidden" name="id_beasiswa" value="<?php echo $row['Id_beasiswa']; ?>">
                                    <div class="mb-3">
                                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                                        <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="upload_berkas" class="form-label">Upload Berkas</label>
                                        <input type="file" class="form-control" id="upload_berkas" name="upload_berkas" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal Form Pendaftaran End -->
            <?php endwhile; ?>
        </div>
    </div>
    <!-- beasiswa info end -->

    <!-- about -->
    <div class="container-fluid" id="about">
        <div class="row">
            <!-- Kolom Kiri -->
            <div class="col-md-6 d-flex align-items-center justify-content-center split-container">
                <div class="split-text">
                    <h2>Mulai Pendaftaran Beasiswa Anda</h2>
                    <p>Aplikasi SIBEA merupakan aplikasi terintegrasi untuk melakukan pengajuan beasiswa serta pemantauan status beasiswa dari mulai pendaftaran sampai dengan pengumuman. Di sini Anda bisa mendapatkan informasi dan melakukan pendaftaran beasiswa di Politeknik STMI Jakarta.</p>
                    <a href="#" class="btn bg-primary" style="color: white;">Yuk Daftar</a>
                </div>
            </div>
            <!-- Kolom Kanan -->
            <div class="col-md-6 d-flex align-items-center justify-content-center split-container">
                <img src="src/img/about-img.png" alt="Gambar Beasiswa" class="split-image">
            </div>
        </div>
    </div>
    <!-- about end -->

    <div class="footer">
        <div class="footer-content">
            <p>&copy; 2024 Politeknik STMI Jakarta. All rights reserved.</p>
        </div>
        <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#4384d7" fill-opacity="1" d="M0,224L80,197.3C160,171,320,117,480,122.7C640,128,800,192,960,192C1120,192,1280,128,1360,96L1440,64L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
        </svg>
    </div>

    <?php include('login.php'); ?>

    <script src="src/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>