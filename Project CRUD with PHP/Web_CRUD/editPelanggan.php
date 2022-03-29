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
    $idPlg = $_GET['id_pelanggan'];
    $pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan = '$idPlg'");
    while($plg = mysqli_fetch_array($pelanggan)){
      $id = $plg['id_pelanggan'];
      $nama = $plg['nama_pelanggan'];
      $sepatu = $plg['id_sepatu'];
      $kartu = $plg['id_kartu'];
    };


    $sepatu_array = mysqli_query($koneksi, "SELECT * FROM barang");
  
    $array_kartu = mysqli_query($koneksi, "SELECT * FROM  kartu_member");
   

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
    <h3>Form Edit Data Pelanggan Toko Shoeshop</h3>
    <br>
    <form action="" method="post">
        <div class="mb-3">
            <label for="nama_pelanggam" class="form-label">Nama Pelanggan</label>
            <input type="text" class="form-control" id="nama_pelanggam" name="nama" value="<?php echo  $nama ?>">
        </div>
        <div class="mb-3">
          <label for="id_sepatu" class="form-label">Id Sepatu</label>
              <select name="id_sepatu" class="form-control">
                  <?php
                     while($id = mysqli_fetch_array($sepatu_array)) {
                      echo "
                          <option ".($id['id_sepatu'] == $sepatu ? 'selected' : '')." 
                          value=".$id['id_sepatu'].">".$id['id_sepatu']."
                          </option>
                      ";
                  }
                  ?>
              </select>
        </div>
        <div class="mb-3">
          <label for="id_kartu" class="form-label">Id Kartu</label>
              <select name="id_kartu" class="form-control">
                  <?php
                      while($idKartu = mysqli_fetch_array($array_kartu)) {
                          echo "
                              <option ".($idKartu['id_kartu'] == $kartu ? 'selected' : '')." 
                              value=".$idKartu['id_kartu'].">".$idKartu['id_kartu']."
                              </option>";
                      }
                  ?>;
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
        $nama = $_POST['nama'];
        $sepatu= $_POST['id_sepatu'];
        $kartu = $_POST['id_kartu'];
  

        include_once('koneksi.php');
        $updatePlgn = mysqli_query($koneksi, "UPDATE pelanggan SET nama_pelanggan = '$nama', id_sepatu = '$sepatu', id_kartu = '$kartu' WHERE id_pelanggan = '$idPlg' ");

        $done = true;


        if ($done)
        {
          echo "<script>window.location.href='pelanggan.php';</script>";
          exit;
        }
    };