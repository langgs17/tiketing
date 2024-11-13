<?php
    include 'config.php';
    $id_pemesanan = $_GET['id_pemesanan'];

    $result =mysqli_query($mysqli, "UPDATE pemesanan SET status='sudah bayar' WHERE id_pemesanan = $id_pemesanan");

    if($result){
        echo '<script>alert("Konfirmasi Pembayaran Berhasil"); location.href="index.php?page=pemesanan_pending";</script>';
    }else{
        echo '<script>alert("Error Gagal Konfirmasi Pembayaran"); location.href="index.php?page=pemesanan_pending";</script>';
    }
?>