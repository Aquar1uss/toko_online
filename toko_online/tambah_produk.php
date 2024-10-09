<?php
include "header.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}

.container {
    max-width: 600px;
    margin: auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

h2 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 5px;
    font-weight: bold;
    color: #555;
}

input[type="text"], 
input[type="number"], 
textarea, 
input[type="file"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

textarea {
    resize: vertical;
    height: 100px;
}

input[type="submit"] {
    background-color: #28a745;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

input[type="submit"]:hover {
    background-color: #218838;
}

@media screen and (max-width: 768px) {
    .container {
        width: 90%;
    }

    input[type="text"], 
    input[type="number"], 
    textarea {
        font-size: 14px;
    }

    input[type="submit"] {
        font-size: 14px;
    }
}

        </style>
</head>
<body>
<div class="container">
    <h2>Tambah Produk</h2>
    <form action="proses_tambah_produk.php" method="POST" enctype="multipart/form-data">
        <label>Nama Produk:</label><br>
        <input type="text" name="nama_produk" required><br><br>

        <label>Deskripsi:</label><br>
        <textarea name="deskripsi" required></textarea><br><br>

        <label>Harga:</label><br>
        <input type="number" name="harga" required><br><br>

        <label>Foto Produk:</label><br>
        <input type="file" name="foto_produk" accept="image/*" required><br><br>

        <input type="submit" value="Tambah Produk">
    </form>
</body>
</html>
