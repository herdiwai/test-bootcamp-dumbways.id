<?php 

include "function.php";

$conn = mysqli_connect("127.0.0.1", "root", "", "produsen");

$id = $_GET["id"];
$produsen = query("SELECT * FROM produk_tb WHERE id = $id")[0];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Detail Produk</title>
</head>
<body class="bg-dark">
    <div class="container mt-4 text-white">
        <div class="row text-right">
            <img src="img/<?= $produsen['photo']; ?>" width="400" alt="" class="img-thumbnail"> 
            <h5 class="ml-2"> Nama : <?= $produsen["name"]; ?>"</h5>
            <p class="ml-4">Stock : <?= $produsen["qty"]; ?> </p>
            <h2 class="ml-4">Price : <?= $produsen["price"]; ?>  </h2>
        </div>
    </div>


      <!-- Optional JavaScript -->
	    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	    <script src="js/jquery-3.5.1.slim.min.js"></script>
	    <script src="js/popper.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	</body>
</html>  