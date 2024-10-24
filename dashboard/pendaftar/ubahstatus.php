<?php
    include '../../koneksi.php';

    $status = $_GET['status'];
    $No_pendaftaran = $_GET['No_pendaftaran'];
    $Id_beasiswa = $_GET['Id_beasiswa'];

    if($status == 'valid'){
        mysqli_query($conn, "UPDATE pendaftaran SET status = 'Divalidasi' WHERE No_pendaftaran = '$No_pendaftaran';");
        echo "<script>alert('Berkas Pendaftar berhasil divalidasi!'); window.location.href = 'detailpendaftar.php?Id_beasiswa=".$Id_beasiswa."';</script>";
    } else if ($status == 'invalid'){
        mysqli_query($conn, "UPDATE pendaftaran SET status = 'Ditolak' WHERE No_pendaftaran = '$No_pendaftaran';");
        echo "<script>alert('Berkas Pendaftar ditolak!'); window.location.href = 'detailpendaftar.php?Id_beasiswa=".$Id_beasiswa."';</script>";
    }
?>