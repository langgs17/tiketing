<?php
    include 'config.php';
    $id_route = $_GET['id_route'];

    $result =mysqli_query($mysqli, "DELETE FROM route WHERE id_route = $id_route");

    if($result){
        echo '<script>alert("Data route Berhasil di Hapus"); location.href="index.php?page=route";</script>';
    }else{
        echo '<script>alert("Hapus Data route Gagal"); location.href="index.php?page=route";</script>';
    }
?>