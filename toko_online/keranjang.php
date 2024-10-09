<?php
include "koneksi.php";
include "header_pelanggan.php";

// Fungsi untuk memperbarui jumlah produk di keranjang
if (isset($_POST['update_jumlah'])) {
    $id_produk = $_POST['id_produk'];
    $jumlah_baru = $_POST['jumlah'];

    foreach ($_SESSION["keranjang"] as $key => $value) {
        if ($value["id_produk"] == $id_produk) {
            $_SESSION["keranjang"][$key]["jumlah"] = $jumlah_baru;
        }
    }
}

// Hapus item dari keranjang
if (isset($_GET['action']) && $_GET['action'] == "remove") {
    if (!empty($_SESSION["keranjang"])) {
        foreach ($_SESSION["keranjang"] as $key => $value) {
            if ($value["id_produk"] == $_GET["id_produk"]) {
                unset($_SESSION["keranjang"][$key]);
            }
        }
        $_SESSION["keranjang"] = array_values($_SESSION["keranjang"]);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Keranjang Belanja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h2 class="text-center my-4">Keranjang Belanja</h2>
    <?php if (!empty($_SESSION["keranjang"])) { ?>
        <form method="post" action="keranjang.php">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $total = 0;
                    foreach ($_SESSION["keranjang"] as $item) {
                        $total_harga = $item['harga'] * $item['jumlah'];
                        $total += $total_harga;
                    ?>
                        <tr>
                            <td><?= $item['nama_produk']; ?></td>
                            <td>Rp. <?= number_format($item['harga'], 0, ',', '.'); ?></td>
                            <td>
                                <form method="post" action="keranjang.php">
                                    <input type="hidden" name="id_produk" value="<?= $item['id_produk']; ?>">
                                    <input type="number" name="jumlah" value="<?= $item['jumlah']; ?>" min="1">
                                    <button type="submit" name="update_jumlah" class="btn btn-primary btn-sm">Update</button>
                                </form>
                            </td>
                            <td>Rp. <?= number_format($total_harga, 0, ',', '.'); ?></td>
                            <td><a href="keranjang.php?action=remove&id_produk=<?= $item['id_produk']; ?>" class="btn btn-danger">Hapus</a></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="3" class="text-right"><strong>Total</strong></td>
                        <td>Rp. <?= number_format($total, 0, ',', '.'); ?></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </form>
        <a href="checkout.php" class="btn btn-success">Checkout</a>
    <?php } else { ?>
        <p>Keranjang belanja Anda kosong.</p>
    <?php } ?>
</div>

</body>
</html>
