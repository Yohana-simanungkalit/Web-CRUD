<?php
    include_once('koneksi.php');

    $id = $_GET['id_pelanggan'];
    $hapusPelanggan = mysqli_query($koneksi, "DELETE FROM pelanggan WHERE id_pelanggan = '$id' ");
    header("Location: pelanggan.php");

?>