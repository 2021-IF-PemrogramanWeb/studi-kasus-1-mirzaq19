<?php
  require 'functions.php';
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

    <title>Tambah Data Mahasiswa</title>
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
      <h1 class="my-5 text-center">Tambah Data Mahasiswa</h1>
      <div class="row justify-content-center">
        <div class="col-auto">
          <form action="" method="post" class="row g-3" style="max-width:50rem;">
            <div class="col-12">
              <label for="inputEmail" class="form-label">Email</label>
              <input type="email" class="form-control" id="inputEmail" name="email" placeholder="email@example.com" required >
            </div>
            <div class="col-12">
              <label for="inputNama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="inputNama" name="nama" placeholder="Budi Setyawan" required>
            </div>
            <div class="col-md-6">
              <label for="inputNRP" class="form-label">NRP</label>
              <input type="text" class="form-control" id="inputNRP" name="nrp" placeholder="ex: 05111940000001" required>
            </div>
            <div class="col-md-6">
              <label for="inputJurusan" class="form-label">Jurusan</label>
              <select id="inputJurusan" class="form-select" name="jurusan" required>
                <option value="Teknik Informatika" selected>Teknik Informatika</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
                <option value="Teknologi Informasi">Teknologi Informasi</option>
              </select>
            </div>
            <div class="col-12 d-grid">
              <button type="submit" class="btn btn-warning" name="submit" id="tambah">Tambah Data</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modal-success" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modal-header">Berhasil</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Data berikut</p>
            <p>Email: <?= $_POST['email'];?></p>
            <p>Nama: <?= $_POST['nama'];?></p>
            <p>NRP: <?= $_POST['nrp'];?></p>
            <p>Jurusan: <?= $_POST['jurusan'];?></p>
            <p>Berhasil ditambahkan</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <a href="index.php" class="btn btn-primary">Kembali ke Beranda</a>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modal-failed" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modal-header">Gagal</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <?php
              if(isset($_POST["submit"])&&nrpExist($_POST['nrp']) > 0) echo('<p class="badge bg-danger">NRP sudah ada dalam database</p>');
            ?>
            <p>Data gagal ditambahkan. Hubungi admin untuk info lebih lanjut</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <a href="index.php" class="btn btn-primary">Kembali ke Beranda</a>
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

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
<?php

  // cek apakah tombol submit sudah ditekan atau belum
  if (isset($_POST["submit"])) {
    if(tambah($_POST)>0){
      echo "
        <script>
          var myModal = new bootstrap.Modal(document.getElementById('modal-success'), {
            keyboard: false
          });
          myModal.show();
        </script>
      ";
    }else{
      echo "
        <script>
          var myModal = new bootstrap.Modal(document.getElementById('modal-failed'), {
            keyboard: false
          });
          myModal.show();
        </script>
      ";
    }
  }
?>

