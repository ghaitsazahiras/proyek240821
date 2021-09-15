<?php
    $id_pelanggan = $_POST['id_pelanggan'];
    $id_petugas = $_POST['id_petugas'];
    $tgl_transaksi = $_POST['tgl_transaksi'];

    if(empty($id_pelanggan)){
        echo "<script>alert('Nama pelanggan tidak boleh kosong');
        location.href='tambah_transaksi.php';</script>";

    } elseif(empty($id_petugas)){
        echo "<script>alert('Nama petugas tidak boleh kosong');
        location.href='tambah_transaksi.php';</script>";

    } elseif(empty($tgl_transaksi)){
        echo "<script>alert('username tidak boleh kosong');
        location.href='tambah_transaksi.php';</script>";

    } else {
        include "koneksi.php";
        $insert=mysqli_query($conn,"insert into toko_transaksi 
        (id_peanggan,id_petugas, tgl_transaksi) 
        value ('".$id_pelanggan."','".$id_petugas."','".$tgl_transaksi."')")
        or die(mysqli_error($conn));

        if($insert){
            echo "<script>alert('Sukses menambahkan transaksi');
            location.href='tambah_transaksi.php';</script>";

        } else {
            echo "<script>alert('Gagal menambahkan transaksi');
            location.href='tambah_transaksi.php';</script>";
        }
        
    }
?>