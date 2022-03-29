<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Shoe Online Shop </title>
</head>
<body>

    <!-- Untuk mengatur koneksi dan 
    query ke database shoshop -->
    <?php
    
    include_once('koneksi.php');
    $pemasoks = mysqli_query($koneksi,"SELECT * FROM pemasok"); 
    
    $id_sepatu = $_GET['id_sepatu'];
    $sepatus = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_sepatu = '$id_sepatu' ");  

    while($sepatu = mysqli_fetch_array($sepatus)){
      $id_sepatu = $sepatu['id_sepatu'];
      $merek = $sepatu['merek_sepatu'];
      $jenis = $sepatu['jenis_sepatu'];
      $nomor = $sepatu['no_sepatu'];
      $harga = $sepatu['harga_sepatu'];
      $id_pemasok= $sepatu['id_pemasok'];
    }
    ?>

    <!-- Tabel barang -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar" style="background-color: teal; height:50px">
    <div class="container-fluid">
    <a class="navbar-brand" href="index.php">SHOESHOP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="pemasok.php">Pemasok</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="pelanggan.php">Pelanggan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="about.php">About</a>
        </li>
      </ul>
    </div>
  </div>
    </nav>
    <div class="container" style="margin-top:100px;">
    <div class="col-6">
    <!-- Form Tambah Data -->
    <h3>Form Edit Data Barang Toko Shoeshop</h3>
    <br>
    <form action="" method="post">
        <div class="mb-3">
            <label for="merek_barang" class="form-label">Merek Barang</label>
            <input type="text" class="form-control" id="merek_barang" name="merek" value="<?php echo $merek; ?>">
        </div>
        <div class="mb-3">
            <label for="jenis_sepatu" class="form-label">Jenis Sepatu</label>
            <input type="text" class="form-control" id="jenis_sepatu" name="jenis" value="<?php echo $jenis; ?>">
        </div>
        <div class="mb-3">
            <label for="nomor_sepatu" class="form-label">Nomor Sepatu</label>
            <input type="number" class="form-control" id="nomor_sepatu" name="nomor" value="<?php echo $nomor; ?>">
        </div>
        <div class="mb-3">
            <label for="harga_sepatu" class="form-label">Harga Sepatu</label>
            <input type="number" class="form-control" id="harga_sepatu" name="harga" value="<?php echo $harga; ?>">
        </div>
        <div class="mb-3">
        <label for="pemasok" class="form-label">Pemasok</label>
            <select name="pemasok" class="form-control">
                <?php
                    while($pemasok = mysqli_fetch_array($pemasoks)) {
                        echo "
                            <option ".($pemasok['id_pemasok'] == $id_pemasok ? 'selected' : '')." 
                            value=".$pemasok['id_pemasok'].">".$pemasok['id_pemasok']."
                            </option>
                        ";
                    }
                ?>
            </select>
        </div>
        <button class="btn btn-primary" type="submit" name="submit">
            Update Data
        </button>
      </form>
    </div>
    <br>
</body>
</html>

<!-- Untuk menyimpan data inputan sementara ke variabel -->
<?php

    if (isset($_POST['submit'])){
        $merek = $_POST['merek'];
        $jenis = $_POST['jenis'];
        $nomor = $_POST['nomor'];
        $harga = $_POST['harga'];
        $pemasok = $_POST['pemasok'];

        include_once('koneksi.php');
        $updateBrg = mysqli_query($koneksi, "UPDATE barang SET merek_sepatu = '$merek',jenis_sepatu = '$jenis', no_sepatu = '$nomor', harga_sepatu = '$harga', id_pemasok = '$pemasok' WHERE id_sepatu = '$id_sepatu' ");

        $done = true;


        if ($done)
        {
          echo "<script>window.location.href='index.php';</script>";
          exit;
        }
      }

  ?>