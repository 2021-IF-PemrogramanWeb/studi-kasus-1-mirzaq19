<?php 
  require 'functions.php';
  session_start();

  if (isset($_COOKIE['id'])&&isset($_COOKIE['key'])) {
    loginUsingCookie();
  }

  if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
  }

  if (isset($_POST["login"])) {
    $response = login($_POST);
    if ($response["status"]) {
      header("Location: index.php");
      exit;
    }
    $error = true;
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

    <title>Login</title>
    <style>
      body {
        min-height: 100vh;
        display: grid;
        place-items: center;
        background: rgb(71,255,110);
        background: linear-gradient(45deg, rgba(71,255,110,1) 0%, rgba(8,143,255,1) 100%);
      }
      .login-wrapper{
        width: 100%;
        max-width: 430px;
        padding: 1.6rem;
        border-radius: .8rem;
      }

    </style>
  </head>
  <body>
    <div class="container">
      <div class="d-flex justify-content-center">
        <div class="login-wrapper bg-light">
          <h1 class="mb-3 text-center">Login</h1>
          <p class="text-center"><small>Silahkan login terlebih dahulu</small></p>
          <hr>
          <?php if(isset($error)): ?>
            <div class="alert alert-danger" role="alert">
              Email / password tidak cocok
            </div>
          <?php endif; ?>
          <form action="" method="post">
            <div class="mb-3">
              <label for="inputEmail" class="form-label">Email</label>
              <input
                type="email"
                class="form-control"
                id="inputEmail"
                name="email"
                placeholder="example@gmail.com"
                required
              />
            </div>
            <div class="mb-3">
              <label for="inputPassword" class="form-label"
                >Password</label
              >
              <input
                type="password"
                class="form-control"
                id="inputPassword"
                name="password"
                placeholder="password"
                required
              />
            </div>
            <p><small>Tidak punya akun? <a href="register.php" class="text-decoration-none">Daftar</a></small></p>
            <div class="form-check">
              <input class="form-check-input" name="remember" type="checkbox" value="" id="rememberCheckBox">
              <label class="form-check-label" for="rememberCheckBox">
                Ingat saya
              </label>
            </div>
            
            <div class="mt-4 d-grid">
              <button type="submit" name="login" class="btn btn-block btn-dark">
                Login
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
