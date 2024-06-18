<?php
// Configuración de la conexión a la base de datos
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = 'monDonGo3000?';
$dbName = 'pruebas';

// Intenta conectarte a la base de datos
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Conexión fallida: " . $db->connect_error);
}

// Verifica si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge y sanea las entradas del usuario
    $username = $db->real_escape_string($_POST['username']);
    $password = $db->real_escape_string($_POST['password']);
    
    // Encripta la contraseña
    $md5 = md5($password);
    $crc32 = hash('crc32', $md5);
    $crypt = crypt($crc32, 'mondongo');
    $sha1 = sha1($crypt);
    
    // Prepara e inserta el nuevo usuario en la base de datos
    $query = $db->prepare("INSERT INTO usuarios (username, password) VALUES (?, ?)");
    $query->bind_param("ss", $username, $sha1);
    if ($query->execute()) {
        echo "<div class='alert alert-success' role='alert'>Usuario registrado con éxito.</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error al registrar el usuario.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <!-- Meta tags requeridas -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <title>Crear Cuenta</title>
</head>
<body style="background-color: #282a36; color: #f8f8f2; min-height: 100vh;">

<div class="container">
  <h2 class="mt-5">Crear Cuenta</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div class="form-group">
      <label for="username">Nombre de usuario:</label>
      <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="form-group">
      <label for="password">Contraseña:</label>
      <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary" style="background-color: #bd93f9; border-color: #bd93f9;">Registrar</button>
    <a href="index.php" class="btn btn-success" style="background-color: #50fa7b; border-color: #50fa7b;">Iniciar Sesión</a>
  </form>
</div>

</body>
</html>
