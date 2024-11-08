<?php
$mysqli = new mysqli ('localhost', 'root', '', 'tiketing');
if ($mysqli->connect_error) {
    die("Koneksi GAGAL BLOK!" . $mysqli->connect_error);
}
?>