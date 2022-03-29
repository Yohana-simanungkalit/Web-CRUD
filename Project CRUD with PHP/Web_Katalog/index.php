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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/js" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>    
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,400italic,300italic,300,500,500italic,700,900">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>

    <title>Shoe Online Shop </title>

    <style>
      .price {
        color: grey;
        font-size: 22px;
      }
    </style>
</head>
<body>

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
          <a class="nav-link active" aria-current="page" href="about.php">About</a>
        </li>
      </ul>
    </div>
  </div>
    </nav>
    <div class="container" style="margin-top:100px;">

 <!-- Header -->
 <div class="w3-container" id="showcase">
    <h1 class="w3-jumbo"><b>Shoeshop Catalog Website</b></h1>
    <h1 class="w3-xxxlarge w3-text-red"><b>Beli Sekarang!</b></h1>
    <hr style="width:100%;border:2px solid red" class="w3-round">
  </div>
    <div class="content-wrapper">
            <div class="inner-container container">
                <div class="row">
                    <div class="section-header col-md-12">
                        <br>
                        <a href="tambah_barang.php" class="btn btn-primary">Tambah Barang </a>
                        <br>
                    <br>
                    </div> 
                </div>
                <div class="projects-holder-2 row" >
                <div class="col-md-2 col-sm-3" style="background-color:rgb(138, 204, 204);">
                        <br>
                        <h5>Brand terbaik hanya di SHOESHOP!</h5>
                        <br>
                        <div class="w3-display-container">
                        <img src="images/adidas.jpg" style="width:100%" alt="Avatar">
                        <br>
                        <br>
                        <img src="images/reebok.png" style="width:100%" alt="Avatar">
                        <br>
                        <img src="images/ysl-1.png" style="width:100%" alt="Avatar">
                        <br>
                        <img src="images/nik.png" style="width:100%" alt="Avatar">
                        <br>
                        <br>
                        <img src="images/download.png" style="width:100%" alt="Avatar">
                        
                        </div>
                      
                       
                    </div>
                
                    <div class="col-md-10 col-sm-9" >
                        <div class="row">
                             <!-- Untuk mengatur koneksi dan 
                            query ke database shoshop -->
                            <?php
                            
                            include_once('koneksi.php');
                            $kueri = "SELECT * FROM barang";
                            $barangs = $koneksi->query($kueri);  
                            ?>
                            
                            <?php while($barang = mysqli_fetch_array($barangs)) : ?>
                                <div class="card" style="width: 19rem; padding: 10px;">
                                <img src="images/<?php echo $barang['gambar']; ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="price" style="text-align:center;background-color:rgb(255, 204, 0)">Rp.<?php echo $barang['harga_sepatu']; ?></p>
                                    <h5 class="card-title">Merek: <?php echo $barang['merek_sepatu']; ?></h5>
                                    <p class="card-text">Jenis sepatu : <?php echo $barang['jenis_sepatu']; ?> <br> Nomor sepatu : <?php echo $barang['no_sepatu']; ?></p>
                                    <a href="edit_barang.php?id_sepatu=<?php echo $barang['id_sepatu']; ?>" class="btn btn-info">Edit</a>
                                    <a href="delete_barang.php?id_sepatu=<?php echo $barang['id_sepatu']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus?') ">Hapus</a>
                                </div>
                                </div>
                           
                            <?php endwhile; ?>

                        </div> 
                    </div> 
                </div> 
            </div> 
        </div> 

        <script src="js/vendor/jquery-1.11.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Preloader -->
        <script type="text/javascript">
            $(window).load(function() { 
                $('.loader-item').fadeOut(); 
                    $('#pageloader').delay(350).fadeOut('slow');
                $('body').delay(350).css({'overflow-y':'visible'});
            })
            //]]>
        </script>
    </div>
</body>
</html>

<script type="text/javascript">
$(document).ready( function () {
        $('#barang').DataTable();
    } );

</script>