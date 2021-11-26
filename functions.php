<?php 
// koneksi ke database
$conn=mysqli_connect("localhost","mirzaq","Lahir@19122000","pweb");

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
	$query = "INSERT INTO mahasiswa VALUES (NULL,'$nrp','$nama','$email','$jurusan')";

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

// //Prevent XSS attacks
function xss($data)
{
	$data = trim($data);
    $data = strtolower($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function checkLength($data, $min, $max){
	$length = strlen($data);
	if($length < $min || $length > $max){
		return false;
	}else{
		return true;
	}
}

function checkChar($data){
	if(!preg_match('/^[a-zA-Z.\' ]+$/', $data)){
		return false;
	}else{
		return true;
	}
}

function validateName($data){
	if(checkChar($data) && checkLength($data, 3, 50)){
		return true;
	}else{
		return false;
	}
}

function validateEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    return true;
}

function registrasi($data){
	global $conn;

	$email = mysqli_real_escape_string($conn, xss($data["email"]));
	$nama = $data["nama"];
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$repeatpassword = mysqli_real_escape_string($conn, $data["repeatpassword"]);
	
	$response = array(
		"status" => true,
		"errors" => array(),
	);

	// cek nama
	if(!validateName($nama)){
		$response["errors"]["nama"] = "Pastikan nama tidak mengandung karakter khusus, angka, dan setidaknya berisi 3 karakter";
	}

	// cek email
	if(!validateEmail($email)){
		$response["errors"]["email"] = "Pastikan format email valid";
	}

	// cek email sudah ada atau belum
	$result = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
	if(mysqli_fetch_assoc($result)){
		$response["errors"]["email"] = "Email telah terdaftar";
	}

	// cek konfirmasi password
	if($password !== $repeatpassword){
		$response["errors"]["password"] = "Konfirmasi Password tidak sesuai";
	}

	if(count($response["errors"])){
		$response["status"] = false;
		return $response;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan user baru ke database
	$query= "INSERT INTO users VALUES (NULL,'$nama','$email','$password')";
	mysqli_query($conn, $query);

	(mysqli_affected_rows($conn) > 0) ? $response["status"] = true : $response["status"] = false;

	return $response;
}

function loginUsingCookie() {
	$id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil usename berdasarkan id
    $result = mysqli_query($conn, "SELECT email FROM users WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan email
    if($key === hash('sha256', $row['email'])){
      $_SESSION['login'] =true;
    }
}

function login($data){
	global $conn;

	$email = mysqli_real_escape_string($conn, xss($data["email"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);

	$response = array(
		"status" => true,
	);

	// cek email sudah ada atau belum
	$result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
	if($row = mysqli_fetch_assoc($result)){
		// cek password
		if(password_verify($password, $row["password"])){
			// set session
			$_SESSION["login"] = true;
			$_SESSION["email"] = $row["email"];
	
			// cek remember me
			if(isset($_POST['remember'])){
			  // buat cookie
			  setcookie('id',$row['id'],time()+3600);
			  setcookie('key', hash('sha256', $row['email']), time()+3600);
			}
			return $response;
		}
	}
	$response["status"] = false;
	return $response;
}

function activeNavIfRequestMatches($requestUri){
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");
    if ($current_file_name == $requestUri) echo('active');
}

