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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/js" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>  
    <title>Shoe Online Shop </title>
    <style>
        input{
            width: 100%;
            background-color: rgb(255, 255, 255);
            
        }

        #pemasok{
          margin-top:10px;
        }
    </style>

</head>
<body>

    <!-- Untuk mengatur koneksi dan 
    query ke database shoshop -->
    <?php
    include_once('koneksi.php');

    $pemasoks = mysqli_query($koneksi, "SELECT * FROM pemasok");
    ?>

  

    <!-- Tabel Pemasok -->
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
    <a href="tambah_pemasok.php" class="btn btn-primary">Tambah Pemasok</a>
    <br><br>
    <table class="table table-light table-hover" id="pemasok">
            <thead class="table-dark">
                <tr>
                    <th>Nama Pemasok</th>
                    <th>Alamat Pemasok</th>
                    <th>No Telepon</th>
                    <th>Catatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php while($pemasok = mysqli_fetch_array($pemasoks)) : ?>
                    <tr>
                        <td><?php echo $pemasok['nama_pemasok']; ?></td>
                        <td><?php echo $pemasok['alamat_pemasok']; ?></td>
                        <td><?php echo $pemasok['no_telepon']; ?></td>
                        <td><?php echo $pemasok['catatan']; ?></td>
                        <td>
                          <a href="editPemasok.php?id_pemasok=<?php echo $pemasok['id_pemasok']; ?>" class="btn btn-info">Edit</a>
                          |
                          <a href="hapusPemasok.php?id_pemasok=<?php echo $pemasok['id_pemasok']; ?>" class="btn btn-warning" onclick = "return confirm('Yakin ingin menghapus?'); ">Hapus</a>
                        </td>
                    </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<script type="text/javascript">
  $(document).ready( function () {
        $('#pemasok').DataTable();
    } );

</script>