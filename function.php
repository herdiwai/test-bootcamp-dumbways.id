<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "produsen");

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function upload() {

	$namaFile = $_FILES['photo']['name'];
	$ukuranFile = $_FILES['photo']['size'];
	$error = $_FILES['photo']['error'];
	$tmpName = $_FILES['photo']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if ( $error === 4) {
		
		echo "
			<script>
				alert('pilih gambar terlebih dahulu');
			</script> ";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiImageValid = ['jpg', 'jpeg', 'png'];
	$ekstensiImage = explode('.', $namaFile);
	$ekstensiImage = strtolower(end($ekstensiImage));

	if ( !in_array($ekstensiImage, $ekstensiImageValid)) {

		echo "<script>
				alert('yang anda upload bukan gambar');
				document.location.href = 'tambah.php';
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if ( $ukuranFile > 10000000) {
		echo "<script>
				alert('ukuran gambar terlalu besar');
				document.location.href = 'tambah.php';
			  </script>";
		return false;
	}

	// jika lolos pengecekan
	move_uploaded_file($tmpName, 'img/'. $namaFile);

	return $namaFile;

}

function ubah($data) {
	global $conn;

	$id = $data["id"];
	$name = htmlspecialchars($data["name"]);
    $impotir_id = htmlspecialchars($data["impotir_id"]);
    $photo_lama = htmlspecialchars($data["photo_lama"]);

	// cek apakah user pilih image baru atau tidak
	if ( $_FILES['photo']['error'] === 4 ) {
		$photo = $photo_lama;	
	} else {
		$photo = upload();
	}

	$qty = htmlspecialchars($data["qty"]);
	$price = htmlspecialchars($data["price"]);


	$query = "UPDATE produk_tb SET
				name = '$name', 
				impotir_id = '$impotir_id',
				photo = '$photo',
				qty = '$qty',
				price = '$price'
				WHERE id = $id
				";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function hapus($id) {
	global $conn;

	mysqli_query($conn, "DELETE FROM produk_tb WHERE id = $id");

	return mysqli_affected_rows($conn);
}

?>