<?php 
    if($_POST){
        $username=$_POST['username'];
        $password=$_POST['password'];

        if(empty($username)){
            echo "<script>alert('Username tidak boleh kosong');location.href='login_pelanggan.php';</script>";

        } elseif(empty($password)){
            echo "<script>alert('Password tidak boleh kosong');location.href='login_pelanggan.php';</script>";

        } else {
            include "koneksi.php";
            $qry_login_pelanggan=mysqli_query($conn,"select * from toko_pelanggan where username = '".$username."' and password = '".$password."'");

            if(mysqli_num_rows($qry_login_pelanggan)>0){
                $dt_login_pelanggan=mysqli_fetch_array($qry_login_pelanggan);
                session_start();
                $_SESSION['id_pelanggan']=$dt_login_pelanggan['id_pelanggan'];
                $_SESSION['nama']=$dt_login_pelanggan['nama'];
                $_SESSION['status_login']=true;
                header("location: home_pelanggan.php");

            } else {
                echo "<script>alert('Username dan Password tidak benar');location.href='login_pelanggan.php';</script>";
            }
        }
    }
?>