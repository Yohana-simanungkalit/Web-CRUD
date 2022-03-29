<?php
    include_once('koneksi.php');

    $id = $_GET['id_pemasok'];
    $deletePemasok = mysqli_query($koneksi, "DELETE FROM pemasok WHERE id_pemasok = '$id' ");

    header("Location: pemasok.php");

?>