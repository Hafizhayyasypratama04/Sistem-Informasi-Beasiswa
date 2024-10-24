<?php
    include '../../koneksi.php';

    if (isset($_GET['No_pendaftaran'])) {
        $No_pendaftaran = $_GET['No_pendaftaran'];
    }
     
    // Delete user row from table based on given id
    $result = mysqli_query($conn, "DELETE FROM pendaftaran WHERE No_pendaftaran='$No_pendaftaran'");
     
    // After delete redirect to Home, so that latest user list will be displayed.
    header("Location:pendaftar.php");
?>