<?php
include("./connection.php");
?>

<?php
$query1 = "SELECT ROUND(AVG(temperature),2), MIN(temperature), MAX(temperature), ROUND(AVG(humidity),2), MIN(humidity), MAX(humidity), ROUND(AVG(shadow),2), MIN(shadow), MAX(shadow), ROUND(AVG(pressure),2), ROUND(AVG(altitude),2) FROM node1";
$query2 = "SELECT ROUND(AVG(temperature),2), MIN(temperature), MAX(temperature), ROUND(AVG(humidity),2), MIN(humidity), MAX(humidity), ROUND(AVG(shadow),2), MIN(shadow), MAX(shadow), ROUND(AVG(pressure),2), ROUND(AVG(altitude),2) FROM node2";
$query3 = "SELECT temperature, humidity, shadow, pressure, altitude FROM node1 ORDER BY reading_time DESC LIMIT 1";
$query4 = "SELECT temperature, humidity, shadow, pressure, altitude FROM node2 ORDER BY reading_time DESC LIMIT 1";
?>

<img src="./assets/croquis.jpeg" alt="Croquis ITESM QRO" class="img-responsive d-none d-xl-block" width="1150">
<a href="#BioDiv" id="Est1">
    <?php
    if ($result = mysqli_query($conn, $query1) and $result3 = mysqli_query($conn, $query3)) {
        while ($col = mysqli_fetch_row($result) and $col3 = mysqli_fetch_row($result3)) {
            if ($col3[2] < 35) {
                echo "<img src=./assets/Sun.gif alt='Estacion de monitoreo 1' style='width: 60px; height: 60px;' class='d-none d-xl-block'>";
            } else if ($col3[2] > 35 and $col3[2] < 70) {
                echo "<img src=./assets/Cloud.gif alt='Estacion de monitoreo 1' style='width: 60px; height: 60px;' class='d-none d-xl-block'>";
            } else if ($col3[2] > 70) {
                echo "<img src=./assets/moon.gif alt='Estacion de monitoreo 1' style='width: 60px; height: 60px;' class='d-none d-xl-block'>";
            } else if ($col3[3] >= ($col[9] + 2) and $col3[4] >= ($col[10] + 12) and $col3[1] >= 70) {
                echo "<img src=./assets/RainyCloud.gif alt='Estacion de monitoreo 1' style='width: 60px; height: 60px;' class='d-none d-xl-block'>";
            }
        }
    }
    mysqli_free_result($result);
    mysqli_free_result($result3);
    ?>
</a>
<a href="#CIMADiv" id="Est2">
    <?php
    if ($result = mysqli_query($conn, $query2) and $result3 = mysqli_query($conn, $query4)) {
        while ($col = mysqli_fetch_row($result) and $col3 = mysqli_fetch_row($result3)) {
            if ($col3[2] < 35) {
                echo "<img src=./assets/Sun.gif alt='Estacion de monitoreo 1' style='width: 60px; height: 60px;' class='d-none d-xl-block'>";
            } else if ($col3[2] > 35 and $col3[2] < 70) {
                echo "<img src=./assets/Cloud.gif alt='Estacion de monitoreo 1' style='width: 60px; height: 60px;' class='d-none d-xl-block'>";
            } else if ($col3[2] > 70) {
                echo "<img src=./assets/moon.gif alt='Estacion de monitoreo 1' style='width: 60px; height: 60px;' class='d-none d-xl-block'>";
            } else if ($col3[3] >= ($col[9] + 2) and $col3[4] >= ($col[10] + 12) and $col3[1] >= 70) {
                echo "<img src=./assets/RainyCloud.gif alt='Estacion de monitoreo 1' style='width: 60px; height: 60px;' class='d-none d-xl-block'>";
            }
        }
    }
    mysqli_free_result($result);
    mysqli_free_result($result3);
    ?>
</a>
<a href="#SalDiv" id="Est3">
    <?php
    if ($result = mysqli_query($conn, $query1) and $result3 = mysqli_query($conn, $query3)) {
        while ($col = mysqli_fetch_row($result) and $col3 = mysqli_fetch_row($result3)) {
            if ($col3[2] < 35) {
                echo "<img src=./assets/Sun.gif alt='Estacion de monitoreo 1' style='width: 60px; height: 60px;' class='d-none d-xl-block'>";
            } else if ($col3[2] > 35 and $col3[2] < 70) {
                echo "<img src=./assets/Cloud.gif alt='Estacion de monitoreo 1' style='width: 60px; height: 60px;' class='d-none d-xl-block'>";
            } else if ($col3[2] > 70) {
                echo "<img src=./assets/moon.gif alt='Estacion de monitoreo 1' style='width: 60px; height: 60px;' class='d-none d-xl-block'>";
            } else if ($col3[3] >= ($col[9] + 2) and $col3[4] >= ($col[10] + 12) and $col3[1] >= 70) {
                echo "<img src=./assets/RainyCloud.gif alt='Estacion de monitoreo 1' style='width: 60px; height: 60px;' class='d-none d-xl-block'>";
            }
        }
    }
    mysqli_free_result($result);
    mysqli_free_result($result3);
    ?>
</a>
<a href="#ArquiDiv" id="Est4">
    <?php
    if ($result = mysqli_query($conn, $query2) and $result3 = mysqli_query($conn, $query4)) {
        while ($col = mysqli_fetch_row($result) and $col3 = mysqli_fetch_row($result3)) {
            if ($col3[2] < 35) {
                echo "<img src=./assets/Sun.gif alt='Estacion de monitoreo 1' style='width: 60px; height: 60px;' class='d-none d-xl-block'>";
            } else if ($col3[2] > 35 and $col3[2] < 70) {
                echo "<img src=./assets/Cloud.gif alt='Estacion de monitoreo 1' style='width: 60px; height: 60px;' class='d-none d-xl-block'>";
            } else if ($col3[2] > 70) {
                echo "<img src=./assets/moon.gif alt='Estacion de monitoreo 1' style='width: 60px; height: 60px;' class='d-none d-xl-block'>";
            } else if ($col3[3] >= ($col[9] + 2) and $col3[4] >= ($col[10] + 12) and $col3[1] >= 70) {
                echo "<img src=./assets/RainyCloud.gif alt='Estacion de monitoreo 1' style='width: 60px; height: 60px;' class='d-none d-xl-block'>";
            }
        }
    }
    mysqli_free_result($result);
    mysqli_free_result($result3);
    ?>
</a>