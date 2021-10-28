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

    <title>Tabel</title>
    <style>
      .bg-blue {
        background-color: #78c6f0;
      }
      .bg-green {
        background-color: #7bb58d;
      }
      .kotak {
        height: 30px;
        width: 100%;
        border-radius: 5px;
      }
      .ket {
        width: 60px;
      }
    </style>
  </head>
  <body>
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
      <div class="row mt-5">
        <div class="col-md-2">
          <div class="ket text-center">
            <div class="kotak bg-blue"></div>
            <p>Mobil1</p>
          </div>
          <div class="ket text-center">
            <div class="kotak bg-green"></div>
            <p>Mobil2</p>
          </div>
          <div class="d-grid gap-2 col-md-8 mb-5">
            <button type="button" class="btn my-1 btn-warning">Graph</button>
            <button type="button" class="btn my-1 btn-primary">Export</button>
            <button type="button" class="btn my-1 btn-danger">Logout</button>
          </div>
        </div>
        <div class="col-md-10 table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr class="table-success">
                <th scope="col">No.</th>
                <th scope="col">On</th>
                <th scope="col">Off</th>
                <th scope="col">Ack by</th>
                <th scope="col">Reason</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Kamis, 25/02/2021,19:41:50</td>
                <td>Kamis, 25/02/2021,21:00:40</td>
                <td>Act: Audiyatra, Dis: Rizaldy Gathot</td>
                <td>1. Interlock Hose Reel Front</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Minggu, 25/02/2021,19:01:50</td>
                <td>Minggu, 25/02/2021,21:42:40</td>
                <td>Act: Audiyatra, Dis: Rizaldy Gathot</td>
                <td>2. Interlock Hose Reel Rear</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Minggu, 25/02/2021,17:31:50</td>
                <td>Minggu, 25/02/2021,16:43:40</td>
                <td>Act: Audiyatra, Dis: Rizaldy Gathot</td>
                <td>3. Interlock Input Coupler Stow</td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td>Minggu, 25/02/2021,18:31:50</td>
                <td>Minggu, 25/02/2021,20:43:40</td>
                <td>Act: Audiyatra, Dis: Rizaldy Gathot</td>
                <td>4. Interlock Input Hose Boom Stow</td>
              </tr>
              <tr>
                <th scope="row">5</th>
                <td>Minggu, 25/02/2021,17:31:23</td>
                <td>Minggu, 25/02/2021,21:23:34</td>
                <td>Act: Audiyatra, Dis: Rizaldy Gathot</td>
                <td>9. Interlock Bonding Static Reel Front</td>
              </tr>
              <tr>
                <th scope="row">6</th>
                <td>Minggu, 25/02/2021,18:23:23</td>
                <td>Minggu, 25/02/2021,20:14:54</td>
                <td>Act: Audiyatra, Dis: Rizaldy Gathot</td>
                <td>10. Interlock Bonding Static Reel Rear</td>
              </tr>
              <tr>
                <th scope="row">7</th>
                <td>Minggu, 25/02/2021,08:23:23</td>
                <td>Minggu, 25/02/2021,10:14:54</td>
                <td>Act: Audiyatra, Dis: Rizaldy Gathot</td>
                <td>15. Interlock System Fault</td>
              </tr>
              <tr>
                <th scope="row">8</th>
                <td>Minggu, 25/02/2021,08:30:56</td>
                <td>Minggu, 25/02/2021,12:18:04</td>
                <td>Act: Audiyatra, Dis: Rizaldy Gathot</td>
                <td>16. Breakdown</td>
              </tr>
            </tbody>
          </table>
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
