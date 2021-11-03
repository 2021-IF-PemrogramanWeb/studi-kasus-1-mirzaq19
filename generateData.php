<?php
// Jika mendownload faker dengan composer
require_once 'vendor/autoload.php';
$conn=mysqli_connect("localhost","root","","pweb");
 
// inisialisasi faker
$faker = Faker\Factory::create('id_ID');

$listjurusan = array("Teknik Informatika", "Sistem Informasi", "Teknologi Informasi");
$listnrp = array("051", "052", "053");
 
for($i=1; $i<=500; $i++){
	// generate data nama, alamat
  $randjurusan = rand(0,2);
  $jurusan = $listjurusan[$randjurusan];
  $kodejurusan = $listnrp[$randjurusan];
  $nourut = $i;
  if($i < 10){
    $nourut = "000".$i;
  }else if($i<100){
    $nourut = "00".$i;
  }else if($i<1000){
    $nourut = "0".$i;
  }
  $nrp = $kodejurusan."1194000".$nourut;
  $nama = $faker->unique()->name;
  $email = $faker->unique()->email();

  // // query insert data
	$query = "INSERT INTO mahasiswa VALUES ('','$nrp','$nama','$email','$jurusan')";
  mysqli_query($conn,$query);
  echo("Berhasil insert data ke-".$i."\n");
}
?>