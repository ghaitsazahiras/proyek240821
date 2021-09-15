<?php

if($_POST){
    $id_pelanggan = $_POST['id_pelanggan'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($id_pelanggan)){
        echo "<script>alert('ID Pelanggan tidak boleh kosong');
        location.href='tambah_pelanggan.php';</script>";
    }
    elseif(empty($nama)){
        echo "<script>alert('Nama pelanggan tidak boleh kosong');
        location.href='tambah_pelanggan.php';</script>";
    }
    elseif(empty($alamat)){
        echo "<script>alert('Alamat pelanggan tidak boleh kosong');
        location.href='tambah_pelanggan.php';</script>";
    }
    elseif(empty($username)){
        echo "<script>alert('Username pelanggan tidak boleh kosong');
        location.href='tambah_pelanggan.php';</script>";
    }
    elseif(empty($password)){
        echo "<script>alert('Password pelanggan tidak boleh kosong');
        location.href='tambah_pelanggan.php';</script>";
    }
    else {
        include "koneksi.php";
        $insert=mysqli_query($conn,"insert into toko_pelanggan
        (id_pelanggan, nama, alamat, telp, username, password) 
        value ('".$id_pelanggan."','".$nama."','".$alamat."','".$telp."','".$username."','".$password."')");
        
        if($insert){
            echo "<script>alert('Sukses menambahkan pelanggan');
            location.href='tambah_pelanggan.php';</script>";
        }
        else {
            echo "<script>alert('Gagal menambahkan pelanggan');
            location.href='tambah_pelanggan.php';</script>";
        }
    }
}

?>