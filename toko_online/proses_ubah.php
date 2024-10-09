<?php
include "koneksi.php"; 

if ($_POST) {
    $id_petugas = $_POST['id_petugas']; // Mengambil id_petugas
    $nama_petugas = $_POST['nama_petugas']; // Mengambil nama_petugas
    $username = $_POST['username']; // Mengambil username
    $level = $_POST['level']; // Mengambil level
    $password = $_POST['password']; // Mengambil password, jika ada

    // Jika password tidak diubah, password tidak diupdate
    if (empty($password)) {
        $query = "UPDATE petugas SET 
                  nama_petugas = '$nama_petugas', 
                  username = '$username', 
                  level = '$level'
                  WHERE id_petugas = '$id_petugas'";
    } else {
        // Jika password diisi, password akan diupdate
        $query = "UPDATE petugas SET 
                  nama_petugas = '$nama_petugas', 
                  username = '$username', 
                  level = '$level', 
                  password = '$password'
                  WHERE id_petugas = '$id_petugas'";
    }

    // Eksekusi query
    $update = mysqli_query($conn, $query);

    // Cek apakah query berhasil
    if ($update) {
        echo "<script>alert('Data petugas berhasil diubah!');location.href='tampil_petugas.php';</script>";
    } else {
        echo "<script>alert('Gagal mengubah data petugas: " . mysqli_error($conn) . "');location.href='ubah.php?id=$id_petugas';</script>";
    }
}
?>
