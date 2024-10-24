<?php
// Password baru yang ingin dihash
$new_password = "12345";

// Buat hash dari password baru
$new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

// Koneksi ke database
include 'koneksi.php'; // Sesuaikan dengan file koneksi Anda

// Query untuk mengupdate password
$sql_update_password_admin = "UPDATE akun SET password = '$new_hashed_password' WHERE username = 'admin'";
$sql_update_password_mahasiswa = "UPDATE akun SET password = '$new_hashed_password' WHERE username = 'mahasiswa'";

// Lakukan update password
if ($conn->query($sql_update_password_admin) === TRUE && $conn->query($sql_update_password_mahasiswa) === TRUE) {
    echo "Password berhasil diubah.";
} else {
    echo "Error: " . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
