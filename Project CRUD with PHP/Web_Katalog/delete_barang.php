<?php
    include_once('koneksi.php');

    $id_sepatu = $_GET['id_sepatu'];
    $hapus = mysqli_query($koneksi, "DELETE FROM barang WHERE id_sepatu = '$id_sepatu' ");

    header("Location:index.php");

?>