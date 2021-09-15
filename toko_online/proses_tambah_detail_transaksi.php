<?php

include "koneksi.php";
if($_POST){
    $id_transaksi =$_POST['id_transaksi'];
    $id_produk =$_POST['id_produk'];
    $qty =$_POST['qty'];

    $qry_harga =mysqli_query($conn,"SELECT * FROM `toko_produk` WHERE `id_produk`='$id_produk'");
    $data_harga=mysqli_fetch_array($qry_harga);
    $harga=$data_harga['harga'];

    $subtotal =$qty*$harga;


    if(empty($id_transaksi)) {
        echo "<script>alert('id transaksi tidak boleh kosong');
        location.href='tambah_detail_transaksi.php';</script>";

    }elseif(empty($id_produk)){
        echo "<script>alert('id produk tidak boleh kosong');
        location.href='tambah_detail_transaksi.php';</script>";

    }elseif(empty($qty)){
        echo "<script>alert('quantity tidak boleh kosong');
        location.href='tambah_detail_transaksi.php';</script>";

    }else{
        include "koneksi.php";
        $insert =mysqli_query($conn,"insert into toko_detail_transaksi  
        ( `id_transaksi`, `id_produk`, `qty`, `subtotal`) 
        VALUES ('".$id_transaksi."', '".$id_produk."', '".$qty."', '".$subtotal."')");

        if($insert){
            echo "<script>alert('Sukses menambahkan detail transaksi');
            location.href='tambah_detail_transaksi.php';</script>";

        } else {
            echo "<script>alert('Gagal menambahkan detail transaksi');
            location.href='tambah_detail_transaksi.php';</script>";
        }
    }
}
?>