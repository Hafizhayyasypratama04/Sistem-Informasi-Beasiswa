<?php
include("../../koneksi.php");

// Periksa apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $namaBeasiswa = $_POST['namaBeasiswa'];
    $syarat = $_POST['syarat'];
    $deskripsi = $_POST['deskripsi'];
    $openDate = $_POST['openDate'];
    $closeDate = $_POST['closeDate'];

    $dir = "thumbnail/";
    $thumbnail = $_FILES['thumbnail']['name'];

    move_uploaded_file($_FILES['thumbnail']['tmp_name'], $dir.$thumbnail); 

    $query = "INSERT INTO beasiswa (Id_Admin, Nama_beasiswa, thumbnail, Syarat, deskripsi, open_date, close_date) 
                      VALUES ('1', '$namaBeasiswa', '$thumbnail', '$syarat', '$deskripsi', '$openDate', '$closeDate')";

            // Eksekusi query
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Beasiswa berhasil ditambahkan!'); window.location.href = 'beasiswa.php';</script>";
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
    // Periksa apakah file telah diunggah
    /*
    if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] === UPLOAD_ERR_OK) {
        $thumbnail = $_FILES['thumbnail']['name'];
        $thumbnailTmpName = $_FILES['thumbnail']['tmp_name'];

        // Tentukan lokasi penyimpanan thumbnail
        $targetDir = "/dashboard/beasiswa/thumbnail/";
        $targetFilePath = $targetDir . basename($thumbnail);

        // Pindahkan file thumbnail ke folder tujuan
        if (move_uploaded_file($thumbnailTmpName, $targetFilePath)) {
            // Siapkan query untuk menambahkan data ke dalam database
            $query = "INSERT INTO beasiswa (Id_Admin, Nama_beasiswa, thumbnail, Syarat, deskripsi, open_date, close_date) 
                      VALUES ('1', '$namaBeasiswa', '$thumbnail', '$syarat', '$deskripsi', '$openDate', '$closeDate')";

            // Eksekusi query
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Beasiswa berhasil ditambahkan!'); window.location.href = 'beasiswa.php';</script>";
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "<script>alert('Gagal mengunggah thumbnail!'); window.location.href = 'tambahbeasiswa.php';</script>";
        }
    } else {
        echo "<script>alert('Tidak ada file yang diunggah atau terjadi kesalahan pada file!')</script>";
    } */
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
