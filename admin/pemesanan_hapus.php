<?php
    include 'config.php';
    $id_pemesanan = $_GET['id_pemesanan'];

    $result =mysqli_query($mysqli, "DELETE FROM pemesanan WHERE id_pemesanan = $id_pemesanan");

    if($result){
        echo '<script>alert("Data pemesanan Berhasil di Hapus"); location.href="index.php?page=pemesanan_batal";</script>';
    }else{
        echo '<script>alert("Hapus Data pemesanan Gagal"); location.href="index.php?page=pemesanan_batal";</script>';
    }
?>