<?php
include("./connection.php");
?>

<?php
$query1 = "SELECT ROUND(AVG(temperature),2), MIN(temperature), MAX(temperature), ROUND(AVG(humidity),2), MIN(humidity), MAX(humidity), ROUND(AVG(shadow),2), MIN(shadow), MAX(shadow), ROUND(AVG(pressure),2), ROUND(AVG(altitude),2) FROM node1";
$query2 = "SELECT ROUND(AVG(temperature),2), MIN(temperature), MAX(temperature), ROUND(AVG(humidity),2), MIN(humidity), MAX(humidity), ROUND(AVG(shadow),2), MIN(shadow), MAX(shadow), ROUND(AVG(pressure),2), ROUND(AVG(altitude),2) FROM node2";
$query3 = "SELECT temperature, humidity, shadow, pressure, altitude, reading_time FROM node1 ORDER BY reading_time DESC LIMIT 1";
$query4 = "SELECT temperature, humidity, shadow, pressure, altitude, reading_time FROM node2 ORDER BY reading_time DESC LIMIT 1";
?>

<div class="container-fluid py-2" id="BioDiv">
  <div class="row row-cols-1 row-cols-lg-2">
    <div class="col">
      <img src="./assets/CentroBioingenieria/CentroBioingenieriaMP30.jpeg" alt="Centro de bioingeniería de noche"
        class="img-fluid" id="Bio">
    </div>
    <div class="col justify-content-center">
      <div class="row">
        <div class="card"
          style="background: linear-gradient(to right, #3a548fc7, #182848b2);color: white;padding: 2em;border-radius: 30px;width: 95%;margin: 1em;">
          <div class="row">
            <h2 class=text-center>Centro de bioingeniería</h2>
          </div>
          <div class="row justify-content-center mx-auto">
            <div class="col">
              <h6>Temperatura</h6>
              <?php
              if ($result = mysqli_query($conn, $query1) and $result3 = mysqli_query($conn, $query3)) {
                while ($col = mysqli_fetch_row($result) and $col3 = mysqli_fetch_row($result3)) {
                  echo "<h1>$col3[0]°C</h1>";
                  echo "<h6>Promedio $col[0]º <br> Mínima $col[1]º <br> Máxima $col[2]º</h6>";
                }
              }
              mysqli_free_result($result);
              mysqli_free_result($result3);
              ?>
            </div>
            <div class="col">
              <h6>Humedad</h6>
              <?php
              if ($result = mysqli_query($conn, $query1) and $result3 = mysqli_query($conn, $query3)) {
                while ($col = mysqli_fetch_row($result) and $col3 = mysqli_fetch_row($result3)) {
                  echo "<h1>$col3[1]%</h1>";
                  echo "<h6>Promedio $col[3]% <br> Mínima $col[4]% <br> Máxima $col[5]%</h6>";
                }
              }
              mysqli_free_result($result);
              mysqli_free_result($result3);
              ?>
            </div>
            <div class="col">
              <h6>Sombra</h6>
              <?php
              if ($result = mysqli_query($conn, $query1) and $result3 = mysqli_query($conn, $query3)) {
                while ($col = mysqli_fetch_row($result) and $col3 = mysqli_fetch_row($result3)) {
                  echo "<h1>$col3[2]%</h1>";
                  echo "<h6>Promedio $col[6]% <br> Mínima $col[7]% <br> Máxima $col[8]% </h6>";
                }
              }
              mysqli_free_result($result);
              mysqli_free_result($result3);
              ?>
            </div>
          </div>
          <div class="row justify-content-center">
            <?php
            if ($result = mysqli_query($conn, $query1) and $result3 = mysqli_query($conn, $query3)) {
              while ($col = mysqli_fetch_row($result) and $col3 = mysqli_fetch_row($result3)) {
                if ($col3[2] <= 35){
                  echo "<img src=./assets/Sun.gif style='width: 25%'>";
                }
                else if ($col3[2] > 35 and $col3[2] < 70){
                  echo "<img src=./assets/Cloud.gif style='width: 25%'>";
                }
                else if ($col3[2] > 70){
                  echo "<img src=./assets/moon.gif style='width: 25%'>";
                }
                else if ($col3[3] >= ($col[9] + 2) and $col3[4] >= ($col[10] + 12) and $col3[1] >= 70) {
                  echo "<img src=./assets/RainyCloud.gif style='width: 25%'>";
                }
              }
            }
            mysqli_free_result($result);
            mysqli_free_result($result3);
            ?>
          </div>
          <div class="row">
            <?php
            if ($result3 = mysqli_query($conn, $query3)) {
              while ($col3 = mysqli_fetch_row($result3)) {
                echo "<p class=text-end> <br> Última actualización: $col3[5]</p>";
              }
            }
            mysqli_free_result($result3);
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid py-2" id="SalDiv">
  <div class="row row-cols-1 row-cols-lg-2">
    <div class="col order-last order-lg-first">
      <div class="row">
        <div class="card"
          style="background: linear-gradient(to right, #3a548fc7, #182848b2);color: white;padding: 2em;border-radius: 30px;width: 90%;margin: 1em;">
          <div class="row">
            <h2 class=text-center>Salón de congresos</h2>
          </div>
          <div class="row justify-content-center mx-auto">
            <div class="col">
              <h6>Temperatura</h6>
              <?php
              if ($result = mysqli_query($conn, $query2) and $result3 = mysqli_query($conn, $query4)) {
                while ($col = mysqli_fetch_row($result) and $col3 = mysqli_fetch_row($result3)) {
                  echo "<h1>$col3[0]°C</h1>";
                  echo "<h6>Promedio $col[0]º <br> Mínima $col[1]º <br> Máxima $col[2]º</h6>";
                }
              }
              mysqli_free_result($result);
              mysqli_free_result($result3);
              ?>
            </div>
            <div class="col">
              <h6>Humedad</h6>
              <?php
              if ($result = mysqli_query($conn, $query2) and $result3 = mysqli_query($conn, $query4)) {
                while ($col = mysqli_fetch_row($result) and $col3 = mysqli_fetch_row($result3)) {
                  echo "<h1>$col3[1]%</h1>";
                  echo "<h6>Promedio $col[3]% <br> Mínima $col[4]% <br> Máxima $col[5]%</h6>";
                }
              }
              mysqli_free_result($result);
              mysqli_free_result($result3);
              ?>
            </div>
            <div class="col">
              <h6>Sombra</h6>
              <?php
              if ($result = mysqli_query($conn, $query2) and $result3 = mysqli_query($conn, $query4)) {
                while ($col = mysqli_fetch_row($result) and $col3 = mysqli_fetch_row($result3)) {
                  echo "<h1>$col3[2]%</h1>";
                  echo "<h6>Promedio $col[6]% <br> Mínima $col[7]% <br> Máxima $col[8]% </h6>";
                }
              }
              mysqli_free_result($result);
              mysqli_free_result($result3);
              ?>
            </div>
          </div>
          <div class="row justify-content-center">
          <?php
            if ($result = mysqli_query($conn, $query2) and $result3 = mysqli_query($conn, $query4)) {
              while ($col = mysqli_fetch_row($result) and $col3 = mysqli_fetch_row($result3)) {
                if ($col3[2] <= 35){
                  echo "<img src=./assets/Sun.gif style='width: 25%'>";
                }
                else if ($col3[2] > 35 and $col3[2] < 70){
                  echo "<img src=./assets/Cloud.gif style='width: 25%'>";
                }
                else if ($col3[2] > 70){
                  echo "<img src=./assets/moon.gif style='width: 25%'>";
                }
                else if ($col3[3] >= ($col[9] + 2) and $col3[4] >= ($col[10] + 12) and $col3[1] >= 70) {
                  echo "<img src=./assets/RainyCloud.gif style='width: 25%'>";
                }
              }
            }
            mysqli_free_result($result);
            mysqli_free_result($result3);
            ?>
          </div>
          <div class="row">
            <?php
            if ($result3 = mysqli_query($conn, $query4)) {
              while ($col3 = mysqli_fetch_row($result3)) {
                echo "<p class=text-end> <br> Última actualización: $col3[5]</p>";
              }
            }
            mysqli_free_result($result3);
            ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col order-first order-lg-last">
      <img src="./assets/SalaCongresos/SalaCongresosMP30.jpeg" alt="Sala de congresos de noche" class="img-fluid"
        id="SalaImg">
    </div>
  </div>
</div>

<div class="container-fluid py-2" id="CIMADiv">
  <div class="row row-cols-1 row-cols-lg-2">
    <div class="col">
      <img src="./assets/CIMA/CIMAMP30.jpeg" alt="CIMA de noche" class="img-fluid" id="CIMAimg">
    </div>
    <div class="col">
      <div class="row">
        <div class="card"
          style="background: linear-gradient(to right, #3a548fc7, #182848b2);color: white;padding: 2em;border-radius: 30px;width: 90%;margin: 1em;">
          <div class="row">
            <h2 class=text-center>Centro de manufactura avanzada</h2>
          </div>
          <div class="row justify-content-center mx-auto">
            <div class="col">
              <h6>Temperatura</h6>
              <?php
              if ($result = mysqli_query($conn, $query1) and $result3 = mysqli_query($conn, $query3)) {
                while ($col = mysqli_fetch_row($result) and $col3 = mysqli_fetch_row($result3)) {
                  echo "<h1>$col3[0]°C</h1>";
                  echo "<h6>Promedio $col[0]º <br> Mínima $col[1]º <br> Máxima $col[2]º</h6>";
                }
              }
              mysqli_free_result($result);
              mysqli_free_result($result3);
              ?>
            </div>
            <div class="col">
              <h6>Humedad</h6>
              <?php
              if ($result = mysqli_query($conn, $query1) and $result3 = mysqli_query($conn, $query3)) {
                while ($col = mysqli_fetch_row($result) and $col3 = mysqli_fetch_row($result3)) {
                  echo "<h1>$col3[1]%</h1>";
                  echo "<h6>Promedio $col[3]% <br> Mínima $col[4]% <br> Máxima $col[5]%</h6>";
                }
              }
              mysqli_free_result($result);
              mysqli_free_result($result3);
              ?>
            </div>
            <div class="col">
              <h6>Sombra</h6>
              <?php
              if ($result = mysqli_query($conn, $query1) and $result3 = mysqli_query($conn, $query3)) {
                while ($col = mysqli_fetch_row($result) and $col3 = mysqli_fetch_row($result3)) {
                  echo "<h1>$col3[2]%</h1>";
                  echo "<h6>Promedio $col[6]% <br> Mínima $col[7]% <br> Máxima $col[8]% </h6>";
                }
              }
              mysqli_free_result($result);
              mysqli_free_result($result3);
              ?>
            </div>
          </div>
          <div class="row justify-content-center">
          <?php
            if ($result = mysqli_query($conn, $query1) and $result3 = mysqli_query($conn, $query3)) {
              while ($col = mysqli_fetch_row($result) and $col3 = mysqli_fetch_row($result3)) {
                if ($col3[2] <= 35){
                  echo "<img src=./assets/Sun.gif style='width: 25%'>";
                }
                else if ($col3[2] > 35 and $col3[2] < 70){
                  echo "<img src=./assets/Cloud.gif style='width: 25%'>";
                }
                else if ($col3[2] > 70){
                  echo "<img src=./assets/moon.gif style='width: 25%'>";
                }
                else if ($col3[3] >= ($col[9] + 2) and $col3[4] >= ($col[10] + 12) and $col3[1] >= 70) {
                  echo "<img src=./assets/RainyCloud.gif style='width: 25%'>";
                }
              }
            }
            mysqli_free_result($result);
            mysqli_free_result($result3);
            ?>
          </div>
          <div class="row">
            <?php
            if ($result3 = mysqli_query($conn, $query3)) {
              while ($col3 = mysqli_fetch_row($result3)) {
                echo "<p class=text-end> <br> Última actualización: $col3[5]</p>";
              }
            }
            mysqli_free_result($result3);
            ?>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="container-fluid py-2" id="ArquiDiv">
  <div class="row row-cols-1 row-cols-lg-2">
    <div class="col order-last order-lg-first">
      <div class="row">
        <div class="card"
          style="background: linear-gradient(to right, #3a548fc7, #182848b2);color: white;padding: 2em;border-radius: 30px;width: 90%;margin: 1em;">
          <div class="row">
            <h2 class=text-center>Centro de Arquitectura</h2>
          </div>
          <div class="row justify-content-center mx-auto">
            <div class="col">
              <h6>Temperatura</h6>
              <?php
              if ($result = mysqli_query($conn, $query2) and $result3 = mysqli_query($conn, $query4)) {
                while ($col = mysqli_fetch_row($result) and $col3 = mysqli_fetch_row($result3)) {
                  echo "<h1>$col3[0]°C</h1>";
                  echo "<h6>Promedio $col[0]º <br> Mínima $col[1]º <br> Máxima $col[2]º</h6>";
                }
              }
              mysqli_free_result($result);
              mysqli_free_result($result3);
              ?>
            </div>
            <div class="col">
              <h6>Humedad</h6>
              <?php
              if ($result = mysqli_query($conn, $query2) and $result3 = mysqli_query($conn, $query4)) {
                while ($col = mysqli_fetch_row($result) and $col3 = mysqli_fetch_row($result3)) {
                  echo "<h1>$col3[1]%</h1>";
                  echo "<h6>Promedio $col[3]% <br> Mínima $col[4]% <br> Máxima $col[5]%</h6>";
                }
              }
              mysqli_free_result($result);
              mysqli_free_result($result3);
              ?>
            </div>
            <div class="col">
              <h6>Sombra</h6>
              <?php
              if ($result = mysqli_query($conn, $query2) and $result3 = mysqli_query($conn, $query4)) {
                while ($col = mysqli_fetch_row($result) and $col3 = mysqli_fetch_row($result3)) {
                  echo "<h1>$col3[2]%</h1>";
                  echo "<h6>Promedio $col[6]% <br> Mínima $col[7]% <br> Máxima $col[8]% </h6>";
                }
              }
              mysqli_free_result($result);
              mysqli_free_result($result3);
              ?>
            </div>
          </div>
          <div class="row justify-content-center">
          <?php
            if ($result = mysqli_query($conn, $query2) and $result3 = mysqli_query($conn, $query4)) {
              while ($col = mysqli_fetch_row($result) and $col3 = mysqli_fetch_row($result3)) {
                if ($col3[2] <= 35){
                  echo "<img src=./assets/Sun.gif style='width: 25%'>";
                }
                else if ($col3[2] > 35 and $col3[2] < 70){
                  echo "<img src=./assets/Cloud.gif style='width: 25%'>";
                }
                else if ($col3[2] > 70){
                  echo "<img src=./assets/moon.gif style='width: 25%'>";
                }
                else if ($col3[3] >= ($col[9] + 2) and $col3[4] >= ($col[10] + 12) and $col3[1] >= 70) {
                  echo "<img src=./assets/RainyCloud.gif style='width: 25%'>";
                }
              }
            }
            mysqli_free_result($result);
            mysqli_free_result($result3);
            ?>
          </div>
          <div class="row">
            <?php
            if ($result3 = mysqli_query($conn, $query4)) {
              while ($col3 = mysqli_fetch_row($result3)) {
                echo "<p class=text-end> <br> Última actualización: $col3[5]</p>";
              }
            }
            mysqli_free_result($result3);
            ?>
          </div>
        </div>
      </div>

    </div>
    <div class="col order-first order-lg-last align-items-center mx-auto">
      <img src="./assets/CentroArquitectura/CentroArquitecturaMP30.jpeg" alt="Centro de Arquitectura de noche"
        class="img-fluid" id="ArquiImg" style="width: 100%;">
    </div>
  </div>
</div>