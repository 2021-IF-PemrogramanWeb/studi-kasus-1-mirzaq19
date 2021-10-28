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

    <title>Hello, world!</title>
    <style>
      body {
        min-height: 100vh;
        display: grid;
        place-items: center;
        /* background: rgb(51,233,255);
        background: linear-gradient(90deg, rgba(51,233,255,1) 0%, rgba(226,107,255,1) 100%); */
        background: rgb(71,255,110);
        background: linear-gradient(45deg, rgba(71,255,110,1) 0%, rgba(8,143,255,1) 100%);
      }
      .login-wrapper{
        width: 100%;
        max-width: 330px;
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
          <form action="./login_action.php" method="post">
            <div class="mb-3">
              <label for="inputEmail" class="form-label">Email</label>
              <input
                type="email"
                class="form-control"
                id="inputEmail"
                name="email"
                placeholder="example@gmail.com"
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
              />
            </div>
            <div class="mt-4 d-grid">
              <button type="submit" class="btn btn-block btn-dark">
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
    ></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
