<nav class="navbar navbar-expand-lg navbar-dark bg-success sticky-top">
  <div class="container">
    <a class="navbar-brand" href="index.php">Pemrograman Web</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php activeNavIfRequestMatches("index")?>" href="./index.php">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php activeNavIfRequestMatches("grafik")?>" href="./grafik.php">Grafik</a>
        </li>
      </ul>
      <div class="row">
        <p class="col-12 col-md-auto text-white my-2"><?= $_SESSION["email"]?></p>
        <a class="col-4 col-md-auto btn btn-outline-light mx-2 mx-md-0" href="logout.php">Logout</a>
      </div>
    </div>
  </div>
</nav>