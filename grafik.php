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

    <title>Grafik</title>
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
      <div class="mt-5">
        <canvas id="myChart"></canvas>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      const labels = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16];
      const data = {
        labels: labels,
        datasets: [
          {
            label: "Trend of Reason",
            backgroundColor: "rgb(43, 143, 237)",
            borderColor: "rgb(255, 99, 132)",
            data: [2, 3, 4, 1, 2, 5, 6, 7, 1, 1, 1, 2, 3, 2, 1, 9],
          },
        ],
      };
      const config = {
        type: "bar",
        data: data,
        options: {},
      };
      // === include 'setup' then 'config' above ===

      const myChart = new Chart(document.getElementById("myChart"), config);
    </script>

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
