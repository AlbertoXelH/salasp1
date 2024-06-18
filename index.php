<?php
session_start();

// Base de Datos Configuración
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "monDonGo3000?";
$dbname = "pruebas";

// Conectar a la base de datos
$conexion = new mysqli($servername, $dbUsername, $dbPassword, $dbname);
if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}

// Captcha
if (!isset($_SESSION['captcha']) || !isset($_POST['captcha'])) {
    $permitted_chars = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz23456789';
    $_SESSION['captcha'] = substr(str_shuffle($permitted_chars), 0, 6);
}

// Procesar el formulario al enviar
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'], $_POST['password'], $_POST['captcha'])) {
    // Verificar captcha
    if ($_POST['captcha'] !== $_SESSION['captcha']) {
        echo "<div class='alert alert-danger' role='alert'>Captcha incorrecto.</div>";
    } else {
        $username = $_POST['username'];

        // Aplicar la secuencia de hashing
        $password = $_POST['password'];
        $password = md5($password); // MD5
        $password = hash("crc32", $password); // CRC32
        $password = crypt($password, 'mondongo'); // Crypt
        $password = sha1($password); // SHA1

        // Consulta a la base de datos
        $sql = "SELECT * FROM usuarios WHERE username = ? AND password = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Autenticación exitosa
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;

            // Redireccionar a la página segura
            header("Location: sesion_iniciada.php");
            exit;
        } else {
            // Error en la autenticación
            echo "<div class='alert alert-danger' role='alert'>Usuario o contraseña incorrectos.</div>";
        }
    }
    // Regenerar captcha para el siguiente intento
    $permitted_chars = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz23456789';
    $_SESSION['captcha'] = substr(str_shuffle($permitted_chars), 0, 6);
}
?>

<!-- Formulario HTML con Bootstrap para Inicio de Sesión -->
<!DOCTYPE html>
<html lang="es">
<head>
  <!-- Meta tags requeridas -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <title>Inicio de Sesión</title>
</head>
<body style="background-color: #282a36; color: #f8f8f2; min-height: 100vh;">

<div class="container">
  <h2 class="mt-5">Inicio de Sesión</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div class="form-group">
      <label for="username">Nombre de usuario:</label>
      <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="form-group">
      <label for="password">Contraseña:</label>
      <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="form-group">
      <label for="captcha">Captcha: <?php echo $_SESSION['captcha']; ?></label>
      <input type="text" class="form-control" id="captcha" name="captcha" required>
    </div>
    <button type="submit" class="btn btn-primary" style="background-color: #bd93f9; border-color: #bd93f9;">Iniciar Sesión</button>
    <a href="crear.php" class="btn btn-success" style="background-color: #50fa7b; border-color: #50fa7b;">Crear cuenta</a>
  </form>
</div>

</body>
</html>

