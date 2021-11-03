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