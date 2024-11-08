<?php
// Mulai sesi jika belum dimulai
session_start();

// Hapus semua variabel sesi
$_SESSION = array();

// Hapus cookie sesi jika ada
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Hapus sesi dari server
session_destroy();

// Redirect ke halaman login atau halaman lain yang sesuai setelah logout
header("Location: index.php");
exit;
?>
