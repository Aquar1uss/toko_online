<?php
if ($_POST) {
    $nama_produk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $ekstensi = array('png', 'jpg', 'jpeg', 'gif', 'JPG');
    $filename = $_FILES['foto_produk']['name'];
    $ukuran = $_FILES['foto_produk']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $ekstensi)) {
        header("location:tambah_produk.php?alert=gagal_ekstensi");
    } else {
        if ($ukuran < 1044070) {
            $xx = $filename;
            move_uploaded_file($_FILES['foto_produk']['tmp_name'], 'uploads/foto_produk/' . '' . $filename);
        }

        if (empty($nama_produk)) {
            echo "<script>alert('Nama produk tidak boleh kosong');location.href='tambah_produk.php';</script>";
        } elseif (empty($deskripsi)) {
            echo "<script>alert('Deskripsi tidak boleh kosong');location.href='tambah_produk.php';</script>";
        } elseif (empty($harga)) {
            echo "<script>alert('Harga tidak boleh kosong');location.href='tambah_produk.php';</script>";
        } else {
            include "koneksi.php";
            $insert = mysqli_query($conn, "INSERT INTO produk (nama_produk , deskripsi , harga , foto_produk) value ('" . $nama_produk . "','" . $deskripsi . "','" . $harga . "','" . $xx . "')") or die(mysqli_error($conn));
            if ($insert) {
                echo "<script>alert('Sukses menambahkan Produk');location.href='produk_petugas.php';</script>";
            } else {
                echo "<script>alert('Gagal menambahkan Produk');location.href='tambah_produk.php';</script>";
            }
        }
    }
}
?>