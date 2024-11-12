<?php
    include 'config.php';
    $id_pemesanan = $_GET['id_pemesanan'];

    $result =mysqli_query($mysqli, "DELETE FROM pemesanan WHERE id_pemesanan = $id_pemesanan");

    if($result){
        echo '<script>alert("Pemesanan Tiket Berhasil Dibatalkan"); location.href="index.php?page=pembayaran";</script>';
    }else{
        echo '<script>alert("Terjadi Kesalahan Gagal Membatalkan Pesanan"); location.href="index.php?page=pembayaran";</script>';
    }
?>