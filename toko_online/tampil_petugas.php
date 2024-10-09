<?php
include "header.php";
?>
<!DOCTYPE html>
<html>
<head>
<head>
    <style>
        /* Mengatur tampilan container utama */
        .container {
            margin-top: 20px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Menambahkan margin dan styling untuk judul */
        h3 {
            color: #333;
            font-family: 'Arial', sans-serif;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 30px;
        }

        /* Styling tabel */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        /* Mengatur border untuk tabel */
        .table th, .table td {
            border: 1px solid #dee2e6;
            padding: 12px;
            text-align: center;
            vertical-align: middle;
        }

        /* Styling untuk header tabel */
        .table thead th {
            background-color: #f8f9fa;
            font-weight: bold;
            text-transform: uppercase;
            color: #495057;
        }

        /* Hover effect untuk baris tabel */
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Mengatur warna dan styling tombol */
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            color: white;
            font-weight: bold;
            padding: 5px 10px;
            text-decoration: none;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            color: white;
            font-weight: bold;
            padding: 5px 10px;
            text-decoration: none;
        }

        /* Mengatur hover untuk tombol */
        .btn-success:hover {
            background-color: #218838;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        /* Styling untuk jarak antar tombol */
        .table-container a {
            margin-right: 10px;
        }
    </style>
</head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>List Pegawai</title>
        
    </head>
    
    <body>
        <div class="container">
            <h3 class="text-center my-4">List Petugas</h3>
            <div class="table-container">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA PETUGAS</th>
                            <th>LEVEL</th>
                            <th>AKSI</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "koneksi.php";
                        $qry_petugas = mysqli_query($conn, "SELECT * FROM petugas 
                        ");

                        $no = 0;
                        while ($data_petugas = mysqli_fetch_array($qry_petugas)) {
                            $no++; ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $data_petugas['nama_petugas'] ?></td>
                                <td><?= $data_petugas['level'] ?></td>
                                <td>
                                    <a href="ubah.php?id=<?= $data_petugas['id_petugas'] ?>" class="btn btn-success">Ubah</a> | <a href="hapus.php?id=<?= $data_petugas['id_petugas'] ?>"
                                    onclick="return confirm('Apakah anda yakin menghapus data ini?')"
                                    class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
                        
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>

</section>


                               
                          
                            
                        
                            