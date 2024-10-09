<?php
if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];

    // Penanganan file foto
    $foto = $_FILES['foto']['name'];
    $temp_foto = $_FILES['foto']['tmp_name'];
    $folder = "uploads/images";

    // Validasi form
    if (empty($nama)) {
        echo "<script>alert('Nama pelanggan tidak boleh kosong');location.href='register_pelanggan.php';</script>";
    } elseif (empty($username)) {
        echo "<script>alert('Username tidak boleh kosong');location.href='register_pelanggan.php';</script>";
    } elseif (empty($password)) {
        echo "<script>alert('Password tidak boleh kosong');location.href='register_pelanggan.php';</script>";
    } else {
        // Validasi file foto
        $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
        $file_ext = strtolower(pathinfo($foto, PATHINFO_EXTENSION));
        if (!in_array($file_ext, $allowed_ext)) {
            echo "<script>alert('Format foto tidak valid. Hanya JPG, JPEG, PNG, dan GIF yang diperbolehkan.');location.href='register_pelanggan.php';</script>";
        } elseif ($_FILES['foto']['size'] > 2 * 1024 * 1024) { 
            echo "<script>alert('Ukuran file foto terlalu besar. Maksimal 2MB.');location.href='register_pelanggan.php';</script>";
        } else {
            // Buat folder jika belum ada
            if (!is_dir($folder)) {
                mkdir($folder, 0755, true);
            }

            // Memindahkan file foto ke folder tujuan
            if (move_uploaded_file($temp_foto, $folder . $foto)) {
                include "koneksi.php";

                // Masukkan data ke database, termasuk nama file foto
                $insert = mysqli_query($conn, "INSERT INTO pelanggan (nama, username, alamat, telp, foto, password) VALUES ('$nama', '$username', '$alamat', '$telp', '$foto', '$password')") or die(mysqli_error($conn));

                if ($insert) {
                    echo "<script>alert('Sukses menambahkan pelanggan');location.href='login_pelanggan.php';</script>";
                } else {
                    echo "<script>alert('Gagal menambahkan pelanggan');location.href='register_pelanggan.php';</script>";
                }
            } else {
                echo "<script>alert('Gagal mengunggah foto');location.href='register_pelanggan.php';</script>";
            }
        }
    }
}
?>
