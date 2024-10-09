<?php
include "koneksi.php"; // Menghubungkan ke database
include "header.php";

// Query untuk mengambil data pelanggan
$id_pelanggan = isset($_GET['id_pelanggan']) ? $_GET['id_pelanggan'] : null;

if ($id_pelanggan) {
    $qry_pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'");
} else {
    $qry_pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Detail Pelanggan</title>
    <style>
        .container {
            margin-top: 20px;
        }

        .profile-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #ddd;
            margin-bottom: 20px;
        }

        .card {
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <div class="container">
        <h3 class="text-center">Detail Pelanggan</h3>
        <div class="row justify-content-center">
            <?php while ($data_pelanggan = mysqli_fetch_array($qry_pelanggan)) { ?>
                <div class="col-md-6">
                    <div class="card">
                        <div class="text-center">
                            

                            <!-- Pastikan jalur menuju folder assets/foto sudah benar -->
                            <img src="uploads/images/<?= $data_pelanggan['foto'] ?>" class="profile-img" alt="Foto Pelanggan">
                        </div>
                        <hr>
                        <p><strong>Nama Lengkap:</strong> <?= $data_pelanggan['nama'] ?></p>
                        <p><strong>Username:</strong> <?= $data_pelanggan['username'] ?></p>
                        <p><strong>Alamat:</strong> <?= $data_pelanggan['alamat'] ?></p>
                        <p><strong>No Telepon:</strong> <?= $data_pelanggan['telp'] ?></p>
                        <td>
                            <a href="ubah_pelanggan.php?id_pelanggan=<?= $data_pelanggan['id_pelanggan'] ?>"
                                class="btn btn-success">Ubah</a> 
                            <a href="hapus_pelanggan.php?id_pelanggan=<?= $data_pelanggan['id_pelanggan'] ?>"
                                onclick="return confirm('Apakah anda yakin menghapus data ini?')"
                                class="btn btn-danger">Hapus</a>
                        </td>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="text-left mt-4">
            <a href="register_pelanggan.php" class="btn btn-primary">Tambah Pelanggan</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>