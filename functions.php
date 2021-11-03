<?php 
// koneksi ke database
$conn=mysqli_connect("localhost","root","","pweb");

// Ambil data dari tabel mahasiswa
function query($query){
	global $conn;
	$result=mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[]= $row;
	}
	return $rows;
}


// Cari data
function cari($keyword){
	$query = "SELECT * FROM mahasiswa
				WHERE
			nama LIKE '%$keyword%' OR
			nrp LIKE '%$keyword%' OR
			email LIKE '%$keyword%' OR
			jurusan LIKE '%$keyword%'
			";
		return query($query);
}

// check NRP
function nrpExist($nrp){
	$query = "SELECT nrp FROM mahasiswa WHERE nrp = '$nrp'";
	return strlen(query($query)[0]['nrp']);
}

// function tambah
function tambah($data) {
	global $conn;
	// ambil data dari setiap elemen pada form
	$nrp = htmlspecialchars($data["nrp"]);
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);

	// query insert data
	$query = "INSERT INTO mahasiswa VALUES ('','$nrp','$nama','$email','$jurusan')";

	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}

function ubah($data){
	global $conn;
	// ambil data dari setiap elemen pada form
	$id = $data["id"];
	$nrp = htmlspecialchars($data["nrp"]);
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);

	// query insert data
	$query = "UPDATE mahasiswa SET
				nama = '$nama',
				nrp = '$nrp',
				email = '$email',
				jurusan = '$jurusan'
				WHERE id=$id
				";

	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}

function hapus($id){
	global $conn;
	$hd="DELETE FROM mahasiswa WHERE id = $id";
	mysqli_query($conn, $hd);
	return mysqli_affected_rows($conn);
}

function registrasi($data){
	global $conn;

	$email = strtolower(stripslashes($data["email"]));
	$nama = $data["nama"];
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$repeatpassword = mysqli_real_escape_string($conn, $data["repeatpassword"]);

	// cek usename sudah ada atau belum
	$result = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
	if(mysqli_fetch_assoc($result)){
		echo "<script>alert('Email telah terdaftar')</script>";
		return false;
	}

	// cek konfirmasi password
	if($password !== $repeatpassword){
		echo "<script>alert('Konfirmasi password tidak sesuai');</script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan user baru ke database
	$query= "INSERT INTO users VALUES ('','$nama','$email','$password')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function activeNavIfRequestMatches($requestUri)
{
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

    if ($current_file_name == $requestUri) echo('active');
}

