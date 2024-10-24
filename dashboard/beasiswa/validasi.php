<?php
    include '../../koneksi.php';

    $status = $_GET['status'];
    $No_pendaftaran = $_GET['No_pendaftaran'];
    $Id_beasiswa = $_GET['Id_beasiswa'];

    if($status == 'valid'){
        mysqli_query($conn, "UPDATE pendaftaran SET status_penerimaan = 'Diterima' WHERE No_pendaftaran = '$No_pendaftaran';");
        echo "<script>alert('Pendaftar berhasil menerima beasiswa!'); window.location.href = 'detailbeasiswa.php?Id_beasiswa=".$Id_beasiswa."';</script>";
    } else if ($status == 'invalid'){
        mysqli_query($conn, "UPDATE pendaftaran SET status_penerimaan = 'Ditolak' WHERE No_pendaftaran = '$No_pendaftaran';");
        echo "<script>alert('Pendaftar ditolak dalam pengaplikasian!'); window.location.href = 'detailbeasiswa.php?Id_beasiswa=".$Id_beasiswa."';</script>";
    }
?>