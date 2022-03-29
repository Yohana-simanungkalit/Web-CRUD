<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Shoe Online Shop </title>
</head>
<body>

    <!-- Untuk mengatur koneksi dan 
    query ke database shoshop -->
    <?php
    
    include_once('koneksi.php');
    $kueri = "SELECT * FROM pemasok";
    $pemasoks = mysqli_query($koneksi,$kueri);    
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
    <h3>Form Tambah Data Barang Toko Shoeshop</h3>
    <br>
      <form action="tambah_barang.php" method="post">
          <div class="mb-3">
              <label for="merek_barang" class="form-label">Merek Barang</label>
              <input type="text" class="form-control" id="merek_barang" name="mereks" required>
          </div>
          <div class="mb-3">
              <label for="jenis_sepatu" class="form-label">Jenis Sepatu</label>
              <input type="text" class="form-control" id="jenis_sepatu" name="jeniss" required>
          </div>
          <div class="mb-3">
              <label for="nomor_sepatu" class="form-label">Nomor Sepatu</label>
              <input type="number" class="form-control" id="nomor_sepatu" name="nomors" required>
          </div>
          <div class="mb-3">
              <label for="harga_sepatu" class="form-label">Harga Sepatu</label>
              <input type="number" class="form-control" id="harga_sepatu" name="hargas" required>
          </div>
          <div class="mb-3">
          <label for="pemasok" class="form-label">Pemasok</label>
              <select name="pemasoks" class="form-control">
                  <?php
                      while($pemasok = mysqli_fetch_array($pemasoks)) {
                          echo "
                              <option value=".$pemasok['id_pemasok'].">".$pemasok['id_pemasok']."</option>
                          ";
                      }
                    ?>
              </select>
          </div>
          <div>
          <button class="btn btn-primary" type="submit" name="submit" onclick="return confirm('Apakah anda sudah yakin?')">
              Simpan Data
          </button>
          <a href="index.php" class="btn btn-dark">Kembali</a>
          </div>
      </form>
    </div>
    <br>
</body>
</html>

<!-- Untuk menyimpan data inputan sementara ke variabel -->
<?php

    if (isset($_POST['submit'])){
        $merek = $_POST['mereks'];
        $jenis = $_POST['jeniss'];
        $nomor = $_POST['nomors'];
        $harga = $_POST['hargas'];
        $pemasok = $_POST['pemasoks'];

        include_once('koneksi.php');
        $insert = mysqli_query($koneksi, "INSERT INTO barang VALUES(' ','$merek', '$jenis', '$nomor', '$harga', '$pemasok')");

        $done = true;


        if ($done)
        {
          echo "<script>window.location.href='index.php';</script>";
          exit;
        }
    }