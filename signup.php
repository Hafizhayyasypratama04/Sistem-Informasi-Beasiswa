<?php
include 'koneksi.php';

$status = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $prodi = $_POST['prodi'];
    $semester = $_POST['semester'];
    $ipk = $_POST['ipk'];
    $username = $_POST['username'];
    $password = $_POST['password']; // Ambil password langsung dari form
    $role = 'mahasiswa';

    $conn->begin_transaction();

    try {
        // Simpan data ke dalam tabel mahasiswa
        $sql_mahasiswa = "INSERT INTO mahasiswa (NIM, Nama, Tanggal_Lahir, Alamat, No_Telp, Email, Prodi, Semester, IPK, Username, Password) 
                          VALUES ('$nim', '$nama', '$tanggal_lahir', '$alamat', '$no_telp', '$email', '$prodi', '$semester', '$ipk', '$username', '$password')";
        $conn->query($sql_mahasiswa);

        // Simpan data ke dalam tabel akun
        $sql_akun = "INSERT INTO akun (username, password, role) VALUES ('$username', '$password', '$role')";
        $conn->query($sql_akun);

        $conn->commit();
        $status = 'success';
    } catch (Exception $e) {
        $conn->rollback();
        $status = 'fail';
    }

    $conn->close();
    header("Location: index.php?status=$status");
    exit();
}

if (isset($_GET['status'])) {
    $status = $_GET['status'];
}
?>

<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="signup.php" method="post">
                    <div class="mb-3">
                        <label for="signupNIM" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="signupNIM" name="nim" required>
                    </div>
                    <div class="mb-3">
                        <label for="signupNama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="signupNama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="signupTanggalLahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="signupTanggalLahir" name="tanggal_lahir" required>
                    </div>
                    <div class="mb-3">
                        <label for="signupAlamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="signupAlamat" name="alamat" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="signupNoTelp" class="form-label">No. Telp</label>
                        <input type="text" class="form-control" id="signupNoTelp" name="no_telp" required>
                    </div>
                    <div class="mb-3">
                        <label for="signupEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="signupEmail" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="signupProdi" class="form-label">Prodi</label>
                        <input type="text" class="form-control" id="signupProdi" name="prodi" required>
                    </div>
                    <div class="mb-3">
                        <label for="signupSemester" class="form-label">Semester</label>
                        <input type="number" class="form-control" id="signupSemester" name="semester" required>
                    </div>
                    <div class="mb-3">
                        <label for="signupIPK" class="form-label">IPK</label>
                        <input type="text" class="form-control" id="signupIPK" name="ipk" required>
                    </div>
                    <div class="mb-3">
                        <label for="signupUsername" class="form-label">Username</label>
                        <input type="text" class="form-control" id="signupUsername" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="signupPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="signupPassword" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resultModalLabel">Notifikasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php if ($status == 'success') { ?>
                    <p>Pendaftaran berhasil!</p>
                <?php } elseif ($status == 'fail') { ?>
                    <p>Pendaftaran gagal. Silakan coba lagi.</p>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var status = "<?php echo $status; ?>";
        if (status) {
            var resultModal = new bootstrap.Modal(document.getElementById('resultModal'));
            resultModal.show();
            setTimeout(function() {
                window.location.href = 'index.php';
            }, 3000);
        }
    });
</script>
