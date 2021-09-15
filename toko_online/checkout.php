<?php 
    session_start();
    include "koneksi.php";
    $cart=@$_SESSION['cart'];

    if(count($cart)>0){
        $id_petugas=1;
        $tgl=date('Y-m-d');

        mysqli_query($conn,"insert into toko_transaksi (id_peanggan,id_petugas, tgl_transaksi) value('".$_SESSION['id_pelanggan']."','".$id_petugas."','".$tgl."')");

        $id=mysqli_insert_id($conn);

        foreach ($cart as $key_produk => $val_produk) {
            $qry_harga=mysqli_query($conn,"select * from toko_produk where id_produk = '".$val_produk['id_produk']."'");
            $data_harga=mysqli_fetch_array($qry_harga);
            $harga = $data_harga['harga'];
            $subtotal = $val_produk['qty'] * $harga;

            mysqli_query($conn,"insert into toko_detail_transaksi(id_transaksi,id_produk,qty,subtotal) value('".$id."','".$val_produk['id_produk']."','".$val_produk['qty']."','".$subtotal."')");
        }
        unset($_SESSION['cart']);

        echo '<script>alert("Anda berhasil membeli produk");location.href="histori_pembelian.php"</script>';
    }
?>