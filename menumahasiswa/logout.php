<?php
session_start();
session_unset(); // Menghapus semua variabel sesi
session_destroy(); // Menghapus sesi itu sendiri
header("Location: ../index.php"); // Redirect kembali ke halaman login
exit();
?>
