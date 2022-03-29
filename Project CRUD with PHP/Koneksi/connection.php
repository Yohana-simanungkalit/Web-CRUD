<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Koneksi Database</title>
</head>
<body>
    
</body>
</html>

<?php

// Parameter mysqli_connect
$serverName = '127.0.0.1:3308';
$userName = 'root';
$pass = '';
$databaseName = 'shoeshop';

$koneksi = mysqli_connect($serverName,$userName,$pass,$databaseName);


// Pengecekan Koneksi
if(!$koneksi){
    die("<h3>Koneksi bermasalah " . mysqli_connect_error() . "</h3>");
} 

// echo("<h3>Koneksi ke database berhasil!</h3>");
// mysqli_close($koneksi);

?>


<?php 
$kueri = "SELECT * FROM barang ORDER BY barang.harga_sepatu ASC";
$hasil = $koneksi->query($kueri); ?>

<div class="container" style="margin-top:50px;">
<table class="table">
        <thead class="table-dark">
        <tr>
            <th>Nama Sepatu</th>
            <th>Jenis Sepatu</th>
            <th>Harga</th>
    
        </tr>
        </thead>
        <?php if($hasil->num_rows > 0) :  ?>
            <?php while($row = $hasil->fetch_assoc()) : ?>
       <tbody>
       <tr>
            <td><?php echo $row["merek_sepatu"]; ?></td>
            <td><?php echo $row["jenis_sepatu"]; ?></td>
            <td><?php echo $row["harga_sepatu"]; ?></td>

        </tr>
       </tbody>
            <?php endwhile; ?>
        <?php endif; ?>
    </table>
</div>
    

  <?php  mysqli_close($koneksi); ?>




 <!-- if($hasil->num_rows > 0){
    while($row = $hasil->fetch_assoc()){
        echo "Sepatu " .
            $row["merek_sepatu"]. " " . " Jenis " .
            $row["jenis_sepatu"]. " ". "Harga " .
            $row["harga_sepatu"]. "<br>";
    } 
    }else{
        echo "Tidak ada data!";
} -->


