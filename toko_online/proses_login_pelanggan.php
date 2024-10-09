<?php
    if($_POST){
        $username=$_POST['username'];
        $password=$_POST['password'];
        if(empty($username)){
            echo "<script>alert('username tidak boleh kosong');location.href='login_pelanggan.php';</script>";
        } elseif(empty($password)){
            echo "<script>alert('Password tidak boleh kosong');location.href='login_pelanggan.php';</script>";
        } else {
            include "koneksi.php";
            $qry_login=mysqli_query($conn,"SELECT * FROM pelanggan where username = '".$username."' and password = '".$password."'");
            if(mysqli_num_rows($qry_login)>0){
                $dt_login=mysqli_fetch_array($qry_login);
                session_start();
                $_SESSION['id_pelanggan']=$dt_login['id_pelanggan'];
                $_SESSION['nama_pelanggan']=$dt_login['nama_pelanggan'];
                $_SESSION['status_login']=true;
                header("location: home_pelanggan.php");
            } else {
                echo "<script>alert('username dan Password tidak benar');location.href='login_pelanggan.php';</script>";
            }
        }
    }
?>