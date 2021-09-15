<?php
if($_POST){
    $id_petugas=$_POST['id_petugas'];
    $nama_petugas=$_POST['nama_petugas'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $level=$_POST['level'];

    if(empty($nama_petugas)){
        echo "<script>alert('nama petugas tidak boleh kosong');location.href='ubah_petugas.php';</script>";
    } elseif(empty($password)){
        echo "<script>alert('password tidak boleh kosong');location.href='ubah_petugas.php';</script>";
    } elseif(empty($level)){
        echo "<script>alert('level tidak boleh kosong');location.href='ubah_petugas.php';</script>";
    } else {
        include "koneksi.php";
            $update=mysqli_query($conn,"UPDATE `toko_petugas` SET `nama_petugas`='".$nama_petugas."',`username` = '".$username."', `level` = '".$level."' WHERE `toko_petugas`.`id_petugas` = '".$id_petugas."'") or die(mysqli_error($conn));
            
            if($update){
                echo "<script>alert('Sukses update toko petugas');location.href='tampil_petugas.php';</script>";
            } else {
                echo "<script>alert('Gagal update toko petugas');location.href='ubah_petugas.php?id_petugas=".$id_petugas."';</script>";
            }
        }
}
?>