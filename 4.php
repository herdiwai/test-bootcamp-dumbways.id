<?php 

$conn = mysqli_connect("127.0.0.1", "root", "", "produsen");

$result = mysqli_query($conn, "SELECT * FROM produk_tb");

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Hello, world!</title>
  </head>
  <body class="bg-dark">

<div class="container">
<div class="d-flex justify-content-start text-white mt-4">Dw-Incomp</div>
</div>

<div class="container d-flex justify-content-end">
    <a class="btn btn-danger btn-sm mr-sm-4" href="" role="button">Add Impotir</a>
    <a class="btn btn-danger btn-sm" href="tambah.php" role="button">Add Product</a>
</div>

<div class="container">
    <div class="row">

    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <div class="card mt-4 mr-4" style="width: 250px;">
            <img src="img/<?= $row["photo"]; ?>" width="40" class="card-img-top" alt="mulan">
            <div class="card-body">
                <h5 class="card-title"><?= $row["name"]; ?></h5>
                <p class="card-text"><?= $row["price"]; ?> </p>
                <p class="card-text">Stock : <?= $row["qty"]; ?></p>
                <a href="ubah.php?id=<?= $row["id"]; ?>" class="btn btn-warning btn-sm btn-block">Ubah</a>
                <a href="detail.php?id=<?= $row["id"]; ?>" class="btn btn-primary btn-sm btn-block">Detail</a>
                <a href="hapus.php?id=<?= $row["id"]; ?>" class="btn btn-danger btn-sm btn-block" onclick="return confirm('yakin?');">Hapus</a>
            </div>
        </div>

    <?php endwhile; ?>

    </div>
</div>

   
    // <!-- Optional JavaScript -->
    // <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
  </body>
</html>