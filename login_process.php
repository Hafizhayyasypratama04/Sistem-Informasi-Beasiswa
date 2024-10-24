<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM akun a INNER JOIN mahasiswa m ON a.username = m.Username WHERE a.username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Membandingkan password langsung dari database
        if ($password === $row['password']) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['nim'] = $row['NIM']; // Simpan NIM di dalam session
            // $_SESSION['nama'] = $row['Nama']; // Simpan NIM di dalam session
            $_SESSION['login_status'] = 'success'; // Login berhasil

            if ($_SESSION['role'] == 'admin') {
                header("Location: dashboard/dashboard.php");
            } else {
                header("Location: menumahasiswa/menu.php");
            }
            exit();
        } else {
            $_SESSION['login_status'] = 'fail'; // Password salah
        }
    } else {
        $_SESSION['login_status'] = 'fail'; // Username tidak ditemukan
    }
    
    $stmt->close();
    $conn->close();
    
    // Redirect kembali ke halaman login.php jika login gagal
    header("Location: index.php");
    exit();
}
?>
