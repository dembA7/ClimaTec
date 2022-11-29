<?php
include("connection.php");
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $myusername = mysqli_real_escape_string($conn, $_POST['username']);
    $mypassword = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT id FROM users WHERE username = '$myusername' and passcode = '$mypassword'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['login_user'] = $myusername;
        header("location: ../index.php");
    } else {
        $error = "Your Login Name or Password is invalid";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/login.css">
    <!-- JS -->
    <script src="../js/main.js"></script>
    <!-- Favicon -->
    <link rel="icon" href="../assets/mainIconFavi.png" type="image/x-icon">
    <title>Iniciar sesion</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top p-2">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">
                <img src="../assets/mainIcon.png" alt="Logo" width="24" height="23"
                    class="d-inline-block align-text-top text-wrap">
                <span class="d-none d-md-inline">
                    Clima-Tec
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- Login form -->
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            <form>
                <label for="chk" aria-hidden="true">Registrate</label>
                <input type="text" name="SignUsername" placeholder="Usuario" required="">
                <input type="password" name="SignPassword" placeholder="Contraseña" required="">
                <button>Registrarse</button>
            </form>
            <?php
            if (isset($_REQUEST['SignUsername'])) {
                $username = stripslashes($_REQUEST['SignUsername']);
                $username = mysqli_real_escape_string($conn, $username);
                $password = stripslashes($_REQUEST['SignPassword']);
                $password = mysqli_real_escape_string($conn, $password);
                $query = "INSERT INTO users (username, passcode) VALUES ('$username', '$password')";
                $result1 = mysqli_query($conn, $query);
                if ($result1) {
                    header("location: ./register.php");
                    echo "<p class='text-white text-center'>Usuario registrado correctamente.</p>";
                } else {
                    echo "<p class='text-white text-center'>Hubo un error al registrar el usuario.</p>";
                }
            }
            ?>
        </div>

        <div class="login">
            <form action="" method="post">
                <label for="chk" aria-hidden="true">Inicia sesion</label>
                <input type="text" name="username" placeholder="Usuario" required="">
                <input type="password" name="password" placeholder="Contraseña" required="">
                <button>Iniciar sesion</button>
            </form>
            <div style="font-size:11px; color:#cc0000; margin-top:10px">
                <?php
                echo $error;
                ?>
            </div>
        </div>
    </div>

</body>

</html>