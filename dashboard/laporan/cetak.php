<?php
include '../../koneksi.php';

function sanitize($conn, $data) {
    return mysqli_real_escape_string($conn, $data);
}

if (isset($_GET['Id_beasiswa']) && !empty($_GET['Id_beasiswa'])) {
    $Id_beasiswa = sanitize($conn, $_GET['Id_beasiswa']);

    // Fetch beasiswa details
    $sql_beasiswa = "SELECT * FROM beasiswa WHERE Id_beasiswa = $Id_beasiswa";
    $result_beasiswa = $conn->query($sql_beasiswa);

    if ($result_beasiswa && $result_beasiswa->num_rows > 0) {
        $row_beasiswa = $result_beasiswa->fetch_assoc();

        // Fetch pendaftar for this beasiswa
        $sql_pendaftar = "SELECT m.NIM, m.Nama, m.Email, p.Tanggal_daftar, p.status_penerimaan
                          FROM pendaftaran p
                          INNER JOIN mahasiswa m ON p.NIM = m.NIM
                          WHERE p.Id_beasiswa = $Id_beasiswa AND p.status_penerimaan = 'Diterima'";
        $result_pendaftar = $conn->query($sql_pendaftar);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Detail Beasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        h3 {
            margin-top: 30px;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn {
            margin-top: 20px;
        }

        .btn a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn a:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Laporan Penerima Beasiswa</h2>

        <div class="card mb-4">
            <div class="card-body">
                <h3><?php echo $row_beasiswa['Nama_beasiswa']; ?></h3>
                <p><strong>Deskripsi:</strong> <?php echo $row_beasiswa['deskripsi']; ?></p>
                <p><strong>Syarat:</strong> <?php echo $row_beasiswa['Syarat']; ?></p>
                <p><strong>Tanggal Buka:</strong> <?php echo date('d F Y', strtotime($row_beasiswa['open_date'])); ?></p>
                <p><strong>Tanggal Tutup:</strong> <?php echo date('d F Y', strtotime($row_beasiswa['close_date'])); ?></p>
            </div>
        </div>

        <h3>Daftar Pendaftar</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Email</th>
                        <th>Tanggal Daftar</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result_pendaftar && $result_pendaftar->num_rows > 0) {
                        while ($row_pendaftar = $result_pendaftar->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row_pendaftar['NIM'] . '</td>';
                            echo '<td>' . $row_pendaftar['Nama'] . '</td>';
                            echo '<td>' . $row_pendaftar['Email'] . '</td>';
                            echo '<td>' . date('d F Y', strtotime($row_pendaftar['Tanggal_daftar'])) . '</td>';
                            echo '<td>' . $row_pendaftar['status_penerimaan'] . '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="5">Belum ada pendaftar untuk beasiswa ini.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="btn">
            <a href="#" onclick="window.print();">Cetak Laporan</a>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
    } else {
        echo '<h2>Beasiswa tidak ditemukan.</h2>';
    }
} else {
    echo '<h2>Invalid or missing Id_beasiswa parameter.</h2>';
}

$conn->close();
?>
