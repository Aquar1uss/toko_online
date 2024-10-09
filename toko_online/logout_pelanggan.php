<?php
// Mulai session
session_start(); // untuk memmulai session
session_destroy(); // untuk mengakhiri
header ("location:login_pelanggan.php?pesan=logout");

?>