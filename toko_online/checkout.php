<?php
session_start();
include "koneksi.php";

// Periksa apakah keranjang tidak kosong
if (!empty($_SESSION["keranjang"])) {
    // Mendapatkan data dari session keranjang
    $cart = $_SESSION["keranjang"];

    // Hitung total belanja
    $total_belanja = 0;
    foreach ($cart as $item) {
        $total_belanja += $item["harga"] * $item["jumlah"];
    }

    // Proses checkout
    $id_pelanggan = $_SESSION['id_pelanggan']; // Ambil id pelanggan dari session login
    $tanggal_pemesanan = date('Y-m-d');
    
    // Masukkan data pemesanan ke tabel pemesanan
    $query_pemesanan = "INSERT INTO pemesanan (id_pelanggan, tanggal_pemesanan, total_belanja) 
                        VALUES ('$id_pelanggan', '$tanggal_pemesanan', '$total_belanja')";
    
    mysqli_query($conn, $query_transaksi);

    // Ambil id pemesanan yang baru dimasukkan (ini menjadi id_transaksi di tabel detail_pemesanan)
    $id_transaksi = mysqli_insert_id($conn);

    // Masukkan setiap produk yang ada di keranjang ke tabel detail_pemesanan
    foreach ($cart as $item) {
        $id_produk = $item["id_produk"];
        $jumlah = $item["jumlah"];
        $harga = $item["harga"];
        $subtotal = $jumlah * $harga;

        // Masukkan data ke tabel detail_pemesanan (id_transaksi menjadi id_pemesanan dari checkout)
        $query_transaksi = "INSERT INTO transaksi (id_pelanggan, tanggal_transaksi, total_belanja) 
        VALUES ('$id_pelanggan', '$tanggal_transaksi', '$total_belanja')";

        
        mysqli_query($conn, $query_detail);
    }

    // Hapus keranjang setelah checkout
    unset($_SESSION["keranjang"]);

    // Redirect ke halaman histori atau konfirmasi dengan pesan sukses
    echo '<script>alert("Checkout berhasil! Terima kasih atas pembeliannya.");location.href="histori.php";</script>';
} else {
    // Jika keranjang kosong, kembalikan ke halaman keranjang dengan pesan
    echo '<script>alert("Keranjang belanja Anda kosong.");location.href="keranjang.php";</script>';
}
?>
