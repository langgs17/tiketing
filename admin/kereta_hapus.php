<?php
    include 'config.php';
    $id_kereta = $_GET['id_kereta'];

    $result =mysqli_query($mysqli, "DELETE FROM kereta WHERE id_kereta = $id_kereta");

    if($result){
        echo '<script>alert("Data Kereta Berhasil di Hapus"); location.href="index.php?page=kereta";</script>';
    }else{
        echo '<script>alert("Hapus Data Kereta Gagal"); location.href="index.php?page=kereta";</script>';
    }
?>