<?php
if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $level = $_POST['level'];
    

    if (empty($nama)) {
        echo "<script>alert('nama petugas tidak boleh kosong');location.href='register.php';</script>";
    } elseif (empty($username)) {
        echo "<script>alert('username tidak boleh kosong');location.href='register.php';</script>";
    } elseif (empty($password)) {
        echo "<script>alert('password tidak boleh kosong');location.href='register.php';</script>";
    } else {
        include "koneksi.php";
        $insert = mysqli_query($conn, "INSERT INTO `toko_petugas` (`nama_petugas`, `username`, `level`, `password`) VALUES ('" . $nama . "','" . $username . "','" . $level. "','" . $password . "')") or die(mysqli_error($conn));
        if ($insert) {
            echo "<script>alert('Sukses menambahkan petugas');location.href='login.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan Petugas');location.href='register.php.php';</script>";
        }
    }
}

?>