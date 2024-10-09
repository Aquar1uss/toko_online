<?php
include "koneksi.php"; 


if (isset($_GET['id'])) {
    $id = $_GET['id']; 
    $qry_get_petugas = mysqli_query($conn, "SELECT * FROM petugas WHERE id_petugas = '$id'");
    
    
    if (mysqli_num_rows($qry_get_petugas) > 0) {
        $data = mysqli_fetch_array($qry_get_petugas); 
    } else {
        echo "Petugas tidak ditemukan.";
        exit;
    }
} else {
    echo "ID tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Ubah Petugas</title>
</head>
<body>
    <div class="container">
        <h3>Ubah Petugas</h3>
        <form action="proses_ubah.php" method="post">
            <input type="hidden" name="id_petugas" value="<?= $data['id_petugas'] ?>"> <!-- Sesuaikan name dengan id_petugas -->
            
            <div class="mb-3">
                <label>Username:</label>
                <input type="text" name="username" value="<?= $data['username'] ?>" class="form-control">
            </div>
            
            <div class="mb-3">
                <label>Nama Petugas:</label>
                <input type="text" name="nama_petugas" value="<?= $data['nama_petugas'] ?>" class="form-control">
            </div>
            
            <div class="form-outline mb-4">
                <select id="level" name="level" class="form-control" required>
                    <option value="" disabled selected>Pilih level</option>
                    <option value="admin" <?= $data['level'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                    <option value="petugas" <?= $data['level'] == 'petugas' ? 'selected' : '' ?>>Petugas</option>
                </select>
                <label class="form-label" for="level">Level</label>
            </div>
            
            <div class="mb-3">
                <label>Password (kosongkan jika tidak ingin mengubah):</label>
                <input type="password" name="password" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Ubah Petugas</button>
        </form>
    </div>
</body>
</html>
