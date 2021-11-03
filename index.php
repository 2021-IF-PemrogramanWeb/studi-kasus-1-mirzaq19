<?php
  require 'functions.php';
  $mahasiswa = query("SELECT * FROM mahasiswa");

  if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
  }
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
      <div class="container">
        <a class="navbar-brand" href="#">Pemrograman Web</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="./grafik.php">Grafik</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./viewDB.php">View DB</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./tabel.php">Tabel</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
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
              <input type="text" class="form-control" name="keyword" placeholder="Masukkan keyword pencarian" size="30" autofocus autocomplete="off">
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
            <?php $i=1 ?>
            <?php foreach($mahasiswa as $row): ?>
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
