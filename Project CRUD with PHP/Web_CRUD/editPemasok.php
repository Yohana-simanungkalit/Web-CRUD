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
    $idP = $_GET['id_pemasok'];
    $kueri = "SELECT * FROM pemasok WHERE id_pemasok = '$idP' ";
    $pemasoks = mysqli_query($koneksi,$kueri); 
    
    while($pemasok = mysqli_fetch_array($pemasoks)){
      $namaPemasok = $pemasok['nama_pemasok'];
      $alamat= $pemasok['alamat_pemasok'];
      $nomor= $pemasok['no_telepon'];
      $catatan= $pemasok['catatan'];
    };
    ?>

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
    <h3>Form Edit Data Pemasok Toko Shoeshop</h3>
    <br>
    <form action="" method="post">
        <div class="mb-3">
            <label for="nama_pemasok" class="form-label">Nama Pemasok</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $namaPemasok; ?>">
        </div>
        <div class="mb-3">
            <label for="alamat_pemasok" class="form-label">Alamat Pemasok</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat; ?>">
        </div>
        <div class="mb-3">
            <label for="no_telepon" class="form-label">Nomor Telepon</label>
            <input type="number" class="form-control" id="nomor" name="nomor" value="<?php echo $nomor; ?>">
        </div>
        <div class="mb-3">
            <label for="catatan" class="form-label">Catatan</label>
            <input type="text" class="form-control" id="catatan" name="catatan" value="<?php echo $catatan; ?>">
        </div>
        <button class="btn btn-primary" type="submit" name="submit">
            Simpan Data
        </button>
      </form>
    </div>
    <br>
</body>
</html>

<!-- Untuk menyimpan data inputan sementara ke variabel -->
<?php

    if (isset($_POST['submit'])){
        $namaP = $_POST['nama'];
        $alamatP= $_POST['alamat'];
        $nomorP = $_POST['nomor'];
        $catatanP = $_POST['catatan'];

        include_once('koneksi.php');
        $updatePemasok = mysqli_query($koneksi, "UPDATE pemasok set nama_pemasok = '$namaP', alamat_pemasok = '$alamatP', no_telepon = '$nomorP', catatan = '$catatanP' WHERE id_pemasok = '$idP' ");

        $done = true;


        if ($done)
        {
          echo "<script>window.location.href='pemasok.php';</script>";
          exit;
        }
    }