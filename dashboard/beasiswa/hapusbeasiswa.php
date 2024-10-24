<?php
    include '../../koneksi.php';

    if (isset($_GET['Id_beasiswa'])) {
        $Id_beasiswa = $_GET['Id_beasiswa'];
    }
     
    // Delete user row from table based on given id
    $result = mysqli_query($conn, "DELETE FROM beasiswa WHERE Id_beasiswa='$Id_beasiswa'");
     
    // After delete redirect to Home, so that latest user list will be displayed.
    header("Location:beasiswa.php");
?>