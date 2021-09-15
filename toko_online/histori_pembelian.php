<?php 
    include "header_pelanggan.php";
?>

<h2>Histori Pembelian Produk</h2>

<table class="table table-hover table-striped">
    <thead>
        <th>NO</th>
        <th>Tanggal Pembelian</th>
        <th>Nama Produk</th>
        <th>Jumlah</th>
        <th>Subtotal</th>
        <th>Status</th>
    </thead>

    <tbody>
        <?php 
        include "koneksi.php";
        $qry_histori=mysqli_query($conn,"select * from toko_transaksi where id_peanggan='".$_SESSION['id_pelanggan']."'order by id_transaksi desc");
        $no=0;

        while($dt_histori=mysqli_fetch_array($qry_histori)){
            $no++;
            //menampilkan produk yang dibeli
            $produk_dibeli="<ul>";
            $jumlah="<ul>";;
            $total=0;

            $qry_produk=mysqli_query($conn,"select * from  toko_detail_transaksi join toko_produk on toko_produk.id_produk=toko_detail_transaksi.id_produk where id_transaksi = '".$dt_histori['id_transaksi']."'");

            while($dt_produk=mysqli_fetch_array($qry_produk)){
                $produk_dibeli.="<li>".$dt_produk['nama_produk']."</li>";
                $jumlah.="<li>".$dt_produk['qty']."</li>";
                $total += $dt_produk['subtotal'];
            }
            $produk_dibeli.="</ul>";
            $jumlah.="</ul>";
            $total2 = number_format($total, 2);
        ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$dt_histori['tgl_transaksi']?></td>
                <td><?=$produk_dibeli?></td>
                <td><?=$jumlah?></td>
                <td><?php echo("Rp. ".$total2);?></td>
                <td><?php echo("Diproses");?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php 
    include "footer_pelanggan.php";
?>