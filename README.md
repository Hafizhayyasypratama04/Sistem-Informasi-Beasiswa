<h1 align="center">Aplikasi Penerimaan Beasiswa</h1>
<h3 align="center">Aplikasi Web Penerimaan Beasiswa</h3>

<p align="left">Aplikasi Web Penerimaan Beasiswa ini dirancang untuk memudahkan proses pendaftaran beasiswa secara online. Aplikasi ini memungkinkan admin untuk mengelola data pendaftaran dan informasi beasiswa, sementara user dapat mengajukan permohonan beasiswa dan melihat status pendaftaran mereka. Aplikasi ini dikembangkan menggunakan PHP dan MySQL untuk sisi backend, serta Bootstrap untuk tampilan antarmuka.</p>

📋 **Tim Proyek**  
- **Project Manager**: Hafizh Ayyasy Pratama  
- **System Analyst**: Rafi Muhammad Yusuf Fathurrahman  
- **Business Analyst**: Graciela Dewy  
- **Programmer**: Fatur Rahman Zaki  
- **Tester**: Adrian Maliqi Aprilwan

🎯 **Fitur Utama**  
**Untuk Admin**:
- **Login Admin**: Admin dapat mengakses dashboard dengan login menggunakan username dan password yang telah ditentukan.
- **Manajemen Pendaftaran**: Admin dapat melihat, mengedit, dan menghapus data pendaftaran beasiswa yang diajukan oleh user.
- **Manajemen Beasiswa**: Admin dapat menambahkan, mengedit, dan menghapus informasi beasiswa yang tersedia untuk pendaftaran.

**Untuk User**:
- **Pendaftaran Beasiswa**: User dapat mendaftar untuk berbagai jenis beasiswa yang tersedia.
- **Melihat Status Pendaftaran**: User dapat melihat status pendaftaran beasiswa yang telah mereka ajukan.

🛠️ **Teknologi yang Digunakan**  
- **Frontend**:  
  - HTML5  
  - CSS3  
  - Bootstrap 5  
- **Backend**:  
  - PHP 7.x atau lebih tinggi  
  - MySQL  
- **Other Tools**:  
  - XAMPP atau LAMP sebagai server lokal

🚀 **Instalasi dan Pengaturan**  
1. **Clone Repository**  
   Pertama, clone repositori ini ke dalam folder lokal:
  git clone https://github.com/Hafizhayyasypratama04/Sistem-Informasi-Beasiswa
   
2. **Set Up Database**
Buat database baru di MySQL, misalnya db_beasiswa.
Jalankan script SQL untuk membuat tabel-tabel yang dibutuhkan (biasanya terdapat di dalam file database.sql di repositori ini).

Konfigurasi Koneksi Database
Sesuaikan konfigurasi koneksi database di file config/database.php dengan pengaturan MySQL lokal Anda:
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_beasiswa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

Jalankan Server Lokal
Gunakan XAMPP atau LAMP untuk menjalankan server lokal.
Akses aplikasi dengan membuka browser dan pergi ke http://localhost/web-penerimaan-beasiswa.

🖥️ Demo
Aplikasi ini menggunakan Bootstrap 5 untuk desain yang responsif dan modern. Berikut adalah beberapa tampilan antarmuka:

Halaman Admin:
Dashboard Admin: Halaman untuk mengelola pendaftaran beasiswa.
Formulir Beasiswa: Formulir untuk menambah dan mengedit beasiswa.

Dashboard Admin: Halaman untuk mengelola pendaftaran beasiswa.
Formulir Pendaftaran Beasiswa: User dapat mendaftarkan diri untuk beasiswa yang tersedia.
Status Pendaftaran: Tampilan status pendaftaran yang diajukan oleh user.
Formulir Pendaftaran Beasiswa: User dapat mendaftarkan diri untuk beasiswa yang tersedia.
Status Pendaftaran: Tampilan status pendaftaran yang diajukan oleh user.

📈 Fitur Tambahan yang Akan Datang
Notifikasi Email: Kirim notifikasi email kepada user ketika status pendaftaran beasiswa berubah.
Autentikasi Pengguna: Implementasi autentikasi menggunakan sesi atau JWT untuk meningkatkan keamanan.

