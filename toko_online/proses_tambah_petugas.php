<?php

if($_POST){
    $id_petugas = $_POST['id_petugas'];
    $nama_petugas = $_POST['nama_petugas'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    if(empty($id_petugas)){
        echo "<script>alert('ID Petugas tidak boleh kosong');
        location.href='tambah_petugas.php';</script>";
    }
    elseif(empty($nama_petugas)){
        echo "<script>alert('Nama petugas tidak boleh kosong');
        location.href='tambah_petugas.php';</script>";
    }
    elseif(empty($username)){
        echo "<script>alert('Username petugas tidak boleh kosong');
        location.href='tambah_petugas.php';</script>";
    }
    elseif(empty($password)){
        echo "<script>alert('Password petugas tidak boleh kosong');
        location.href='tambah_petugas.php';</script>";
    }
    else {
        include "koneksi.php";
        $insert=mysqli_query($conn,"insert into toko_petugas
        (id_petugas, nama_petugas, username, password, level) 
        value ('".$id_petugas."','".$nama_petugas."','".$username."','".md5($password)."',
        '".$level."')");
        
        if($insert){
            echo "<script>alert('Sukses menambahkan petugas');
            location.href='tambah_petugas.php';</script>";
        }
        else {
            echo "<script>alert('Gagal menambahkan petugas');
            location.href='tambah_petugas.php';</script>";
        }
    }
}

?>