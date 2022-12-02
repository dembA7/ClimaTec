<!-- Connection to db and validate session -->
<?php
  include ("./php/connection.php");
  include ("./php/session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
  </script>
  <!-- CSS -->
  <link rel="stylesheet" href="./css/style.css">
  <!-- JS -->
  <script src="./js/main.js"></script>
  <!-- Favicon -->
  <link rel="icon" href="./assets/mainIconFavi.png" type="image/x-icon">
  <title>Estaciones de monitoreo tec</title>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top p-2">
    <div class="container-fluid">
      <a class="navbar-brand" href="./index.php">
        <img src="./assets/mainIcon.png" alt="Logo" width="24" height="23" class="d-inline-block align-text-top text-wrap">
        <span class="d-none d-md-inline">
          Clima-Tec
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navmenu">
        <ul class="navbar-nav ms-auto">  
          <li class="nav-item">
            <a href="./index.php" class="nav-link active">Mediciones</a>
          </li>
          <li class="nav-item">
            <a href="./project.php" class="nav-link">Sobre el proyecto</a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link active"><?php echo $login_session; ?></a>
          </li>
          <li class="nav-item">
            <a href="./php/logout.php" class="nav-link active">Cerrar sesion</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Map -->
  <h1 class="text-center p-3">Conoce las mediciones por estación</h1>
  <div class="d-flex justify-content-center" id="CroqDiv">
    
  </div>

  <!-- Stations -->
  <div class="container">
    <div class="row">
      <div class="col">
        <h1 class="text-center mt-5 mb-5">Estaciones activas</h1>
      </div>
    </div>
  </div>

  <div id="stations">
    
  </div>

</html>

<!-- xml funtions to load and update data from db -->
<script>
  function loadDataCard(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("stations").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "./php/data.php", true);
    xhttp.send();
  }

  function loadMap(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("CroqDiv").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "./php/map.php", true);
    xhttp.send();
  }

  setInterval(function(){loadDataCard()}, 1000);
  setInterval(function(){loadMap()}, 1000);
  window.onload = loadXMLDoc;
  window.onload = loadMap;
</script>