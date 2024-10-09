<?php
include "header.php";
?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            .card {
                background: rgba(255, 255, 255, 0.9);
                border-radius: 15px;
                box-shadow: 0px 0px 15px 0px #000;
                margin-bottom: 20px;
            }

            .card-title {
                font-family: 'Georgia', serif;
                color: #2c3e50;
            }

            .card-text {
                font-family: 'Arial', sans-serif;
                color: #34495e;
            }

            .btn-primary {
                background-color: #2c3e50;
                border-color: #2c3e50;
            }

            .btn-primary:hover {
                background-color: #1a252f;
                border-color: #1a252f;
            }

            .btn-danger {
                background-color: #e74c3c;
                border-color: #e74c3c;
            }

            .btn-danger:hover {
                background-color: #c0392b;
                border-color: #c0392b;
            }

            .btn-success {
                background-color: #27ae60;
                border-color: #27ae60;
            }

            .btn-success:hover {
                background-color: #1e8449;
                border-color: #1e8449;
            }

            .btn-back {
                background-color: #3498db;
                border-color: #3498db;
            }

            .btn-back:hover {
                background-color: #2980b9;
                border-color: #2980b9;
            }

            .text-left {
                margin-top: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="container">
    
        <h2 class="text-center my-4">Daftar Produk</h2>
        <div class="row">
            <?php
            include "koneksi.php";
            $qry_produk = mysqli_query($conn, "select * from produk");
            while ($dt_produk = mysqli_fetch_array($qry_produk)) {
                ?>
                <div class="col-md-3">
                    <div class="card">
                        <img src="uploads/foto_produk/<?= $dt_produk['foto_produk'] ?>" class="card-img-top">
                        <div class="card-body">
                            <p><strong>Nama Produk:</strong> <?= $dt_produk['nama_produk'] ?></p>
                            <p><strong>Deskripsi:</strong> <?= $dt_produk['deskripsi'] ?></p>
                            <p><strong>Harga Rp:</strong> <?= $dt_produk['harga'] ?></p>
                            <a href="ubah_produk.php?id_produk=<?= $dt_produk['id_produk'] ?>"
                                class="btn btn-primary">ubah</a>
                            <a href="hapus_produk.php?id_produk=<?= $dt_produk['id_produk'] ?>"
                                onclick="return confirm('Apakah anda yakin menghapus produk ini?')"
                                class="btn btn-danger">Hapus</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="text-left">
            <a href="tambah_produk.php" class="btn btn-success">Tambah Produk</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>