<?php 
include "function.php";

$conn = mysqli_connect("127.0.0.1", "root", "", "produsen");

// ambil data dari tabel produk_tb / query data produk_tb
if ( isset($_POST["submit"])) {


    $name = $_POST["name"];
    $impotir_id = $_POST["impotir_id"];

    $photo = upload();
	if (!$photo) {
		return false;
    }
    
    $qty = $_POST["qty"];
	$price = $_POST["price"];


	// query insert data
	$query = "INSERT INTO produk_tb VALUES ('', '$name', '$impotir_id', '$photo', '$qty', '$price')";

	mysqli_query($conn, $query);

    // cek apakah data berhasil di tambahkan atau tidak
	if ( mysqli_affected_rows($conn) > 0 ) {
		echo "<script>
				alert('data berhasil ditambahkan');
				document.location.href = 'index.php';
			  </script> 
			";
	} else {
		echo "<script>
				alert('data gagal ditambahkan');
				document.location.href = 'tambah.php';
			  </script> 
			";
		echo mysqli_error($conn);
	}
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Document</title>
</head>
<body class="bg-dark">

<div class="container d-flex justify-content-center text-white">
	<div class="row">
		<form action="" method="POST" enctype="multipart/form-data">
		<h1 class="mt-4">Tambah Data Produk</h1>
			<br>

            <div class="form-group">
				<label for="exampleInputEmail1">Name</label>
				<input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
			</div>

            <div class="form-group">
				<label for="exampleInputEmail1">Impotir Id</label>
				<input type="text" name="impotir_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter impotir_id">
			</div>

			<div class="form-group">
			    <label for="exampleFormControlFile1">Upload Photo</label>
			    <input type="file" name="photo" class="form-control-file" id="exampleFormControlFile1">
			</div>

			<div class="form-group">
				<label for="description">Qty</label>
				<input type="text" class="form-control" name="qty" id="description" rows="3" placeholder="Enter Qty"></textarea>
			</div>

            <div class="form-group">
				<label for="description">Price</label>
				<textarea class="form-control" name="price" id="description" rows="3" placeholder="Enter Price"></textarea>
			</div>

			<button type="submit" name="submit" class="btn btn-primary">Tambah</button>
			<br><br><br><br><br><br>
		</form>
	</div>
</div>

  <!-- Optional JavaScript -->
	    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	    <script src="js/jquery-3.5.1.slim.min.js"></script>
	    <script src="js/popper.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	</body>
</html>
