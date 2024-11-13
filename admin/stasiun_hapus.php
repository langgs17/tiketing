<?php
    include 'config.php';
    $id_stasiun = $_GET['id_stasiun'];

    $result =mysqli_query($mysqli, "DELETE FROM stasiun WHERE id_stasiun = $id_stasiun");

    if($result){
        echo '<script>alert("Data Stasiun Berhasil di Hapus"); location.href="index.php?page=stasiun";</script>';
    }else{
        echo '<script>alert("Hapus Data Stasiun Gagal"); location.href="index.php?page=stasiun";</script>';
    }
?>