<?php
    include 'config.php';
    $id_user = $_GET['id_user'];

    $result =mysqli_query($mysqli, "DELETE FROM users WHERE id_user = $id_user");

    if($result){
        echo '<script>alert("Data User Berhasil di Hapus"); location.href="index.php?page=user";</script>';
    }else{
        echo '<script>alert("Hapus Data User Gagal"); location.href="index.php?page=user";</script>';
    }
?>