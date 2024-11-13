<?php
    include 'config.php';
    $id_pemesanan = $_GET['id_pemesanan'];

    $result =mysqli_query($mysqli, "UPDATE pemesanan SET status='dibatalkan' WHERE id_pemesanan = $id_pemesanan");

    if($result){
        echo '<script>alert("Pemesanan Tiket Berhasil Dibatalkan"); location.href="index.php?page=tiket";</script>';
    }else{
        echo '<script>alert("Terjadi Kesalahan Gagal Membatalkan Pesanan"); location.href="index.php?page=tiket";</script>';
    }
?>