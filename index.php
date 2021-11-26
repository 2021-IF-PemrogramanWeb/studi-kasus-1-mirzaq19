<?php
  // cek session
  session_start();
  if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
  }
  require 'functions.php';

  if(isset($_GET["ada"])){
    echo "<script>alert('Id yang diminta tidak ditemukan')</script>";
  }

  if (isset($_POST["cari"])) {
    $keyword = mysqli_real_escape_string($conn,xss($_POST["keyword"]));
    $_SESSION["keyword"] = $keyword;
  }else{
    if(!isset($_SESSION["keyword"])) $_SESSION["keyword"] = ''; 
    $keyword = mysqli_real_escape_string($conn,xss($_SESSION["keyword"]));
  }

  $mahasiswa = query("SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR nrp LIKE '%$keyword%' OR email LIKE '%$keyword%' OR jurusan LIKE '%$keyword%'");

  // pagination
  // konfigurasi
  $jumlahDataPerHalaman=5;
  $jumlahData = count($mahasiswa);
  $jumlahHalaman = ceil($jumlahData/$jumlahDataPerHalaman);
  if (isset($_POST["cari"])){
    $halamanAktif = 1;
  }else{
    $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
  }
  $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

  $data_perhalaman = query("SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR nrp LIKE '%$keyword%' OR email LIKE '%$keyword%' OR jurusan LIKE '%$keyword%' LIMIT $awalData, $jumlahDataPerHalaman");
  

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />

    <title>Daftar Mahasiswa</title>
  </head>
  <body>
    <?php include './navcomp.php'?>
    <div class="container my-5">
      <div class="row">
        <div class="col-6">
          <img src="./img/logoits.png" alt="logo ITS" height="100" />
        </div>
        <div
          class="
            col-6
            d-flex
            align-content-center
            flex-wrap
            justify-content-end
          "
        >
          <h4><?= date("l, d/m/Y")?></h4>
        </div>
      </div>
      <h1 class="my-5 text-center">Daftar Mahasiswa</h1>
      <div class="row justify-content-between mb-3">
        <div class="col-md-3 col-sm-4 mb-3 mb-sm-0">
          <a href="tambah.php" class="btn btn-success">Tambah Data</a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <form action="" method="post">
            <div class="input-group">
              <input value="<?= $keyword?>" type="text" class="form-control" name="keyword" placeholder="Masukkan keyword pencarian" size="30" autofocus autocomplete="off">
              <button class="btn btn-outline-success" type="submit" name="cari" >Cari</button>
            </div>
          </form>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr class="table-success text-center">
              <th scope="col">No.</th>
              <th scope="col">NRP</th>
              <th scope="col">Nama</th>
              <th scope="col">Email</th>
              <th scope="col">Jurusan</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=$awalData+1 ?>
            <?php foreach($data_perhalaman as $row): ?>
            <tr>
              <td><?= $i;?></td>
              <td><?= $row["nrp"];?></td>
              <td><?= $row["nama"];?></td>
              <td><?= $row["email"];?></td>
              <td><?= $row["jurusan"];?></td>
              <td class="text-center">
                <a class="btn btn-warning" href="ubah.php?id=<?= $row["id"];?>">ubah</a>
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-confirm" onclick="modalSet(<?= $row['id']?>)">hapus</button>
              </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <nav class="mt-4" aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item <?php if($halamanAktif<=1) echo("disabled")?>"><a class="page-link" href="?halaman=<?= $halamanAktif-1?>">Previous</a></li>
          <?php for($i=($halamanAktif-2 == 0)?1:$halamanAktif-2; $i <= $halamanAktif-1 && $i >= 1 ; $i++): ?>
            <li class="page-item"><a class="page-link" href="?halaman=<?= $i?>"><?= $i?></a></li>
          <?php endfor;?>
          <li class="page-item active" aria-current="page"><span class="page-link"><?= $halamanAktif?></span></li>
          <?php for($i=$halamanAktif+1; $i <= $halamanAktif+2 && $i <= $jumlahHalaman; $i++): ?>
            <li class="page-item"><a class="page-link" href="?halaman=<?= $i?>"><?= $i?></a></li>
          <?php endfor;?>
          <li class="page-item <?php if($halamanAktif>=$jumlahHalaman) echo("disabled")?>"><a class="page-link" href="?halaman=<?= $halamanAktif+1?>">Next</a></li>
          <!-- <li class="page-item"><a class="page-link" href="#">3</a></li> -->
          <!-- <li class="page-item"><a class="page-link" href="#">Next</a></li> -->
        </ul>
      </nav>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-confirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalConfirmLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalConfirmLabel">Hapus</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Apakah anda yakin menghapus data berikut?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <form id="form-confirm" action="" method="post">
              <button class="btn btn-danger" type="submit">Hapus</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    
    <script>
      const FORM_CONFIRM = document.getElementById('form-confirm');
      const modalSet = (id) => {
        FORM_CONFIRM.setAttribute('action',`hapus.php?id=${id}`)
      }
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
