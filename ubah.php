<?php 

include "function.php";

$conn = mysqli_connect("127.0.0.1", "root", "", "produsen");

$id = $_GET["id"];
$produsen = query("SELECT * FROM produk_tb WHERE id = $id")[0];
// ambil data dari tabel produsen / query data produsen
if ( isset($_POST["submit"])) {

	if ( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'index.php';
			</script>
		";
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
		<h1 class="mt-4">Edit Data Produk</h1>
			<br>

            <input type="hidden" name="id" value="<?= $produsen["id"]; ?>">
			<input type="hidden" name="photo_lama" value="<?= $produsen["photo"]; ?>">

            <div class="form-group">
				<label for="exampleInputEmail1">Name</label>
				<input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" value="<?= $produsen["name"]; ?>">
			</div>

            <div class="form-group">
				<label for="exampleInputEmail1">Impotir Id</label>
				<input type="text" name="impotir_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter impotir_id" value="<?= $produsen["impotir_id"]; ?>">
			</div>

			<div class="form-group">
			    <label for="exampleFormControlFile1">Upload Photo</label><br>
                <img src="img/<?= $produsen['photo']; ?>" width="100"><br>
			    <input type="file" name="photo" class="form-control-file" id="exampleFormControlFile1">
			</div>

			<div class="form-group">
				<label for="description">Qty</label>
				<input type="text" class="form-control" name="qty" id="description" rows="3" placeholder="Enter Qty" value="<?= $produsen["qty"]; ?>"></textarea>
			</div>

            <div class="form-group">
				<label for="description">Price</label>
				<textarea class="form-control" name="price" id="description" rows="3" placeholder="Enter Price" value="<?= $produsen["price"]; ?>"></textarea>
			</div>

			<button type="submit" name="submit" class="btn btn-primary">Ubah</button>
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
