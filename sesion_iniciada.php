<?php
session_start();

// Verificar si el usuario no está logueado y no está en la página de inicio de sesión o en 'crear.php'
if (!isset($_SESSION['loggedin']) && basename($_SERVER["PHP_SELF"]) !== "index.php" && basename($_SERVER["PHP_SELF"]) !== "crear.php") {
    header("Location: index.php");
    exit;
}

// Función para cerrar sesión
if(isset($_GET['logout'])){
    unset($_SESSION["loggedin"]);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS for Dracula Theme -->
  <style>
    body {
      background-color: #282a36;
      color: #f8f8f2;
    }
    .navbar, .footer {
      background-color: #44475a;
      color: #f8f8f2;
    }
    .nav-link {
      color: #bd93f9 !important;
    }
    .nav-link:hover {
      color: #ff79c6 !important;
    }
    h1, h2, h3, h4, h5, h6 {
      color: #bd93f9;
    }
    p {
      color: #f8f8f2;
    }
    .alert {
      background-color: #6272a4;
      color: #f8f8f2;
    }
    .container {
      border: 1px solid #6272a4;
      border-radius: 10px;
      padding: 20px;
    }
    .footer {
      padding: 10px 0;
    }
    .img-fluid {
      border: 2px solid #ff79c6;
      border-radius: 5px;
    }
    a {
      color: #50fa7b;
    }
    a:hover {
      color: #ffb86c;
    }
    .header-btn {
      background-color: #bd93f9;
      color: #282a36;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      transition: background-color 0.3s, color 0.3s;
    }
    .header-btn:hover {
      background-color: #ff79c6;
      color: #f8f8f2;
    }
  </style>
</head>
<body>

  <div class="container mt-4">
    <header class="d-flex justify-content-between align-items-center mb-4">
      <h1>TurboDrive</h1>
      <a href="?logout" class="btn header-btn">Cerrar Sesión</a>
    </header>

    <nav class="navbar navbar-expand-md mb-4">
      <ul class="nav nav-pills justify-content-center w-100">
        <li class="nav-item"><a class="nav-link" href="#">Opción 1</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Opción 2</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Opción 3</a></li>
      </ul>
    </nav>

    <div class="row">
      <div class="col-lg-8">
        <article class="mb-4">
          <h2>Ferrari</h2>
          <p>
            Ferrari es una marca italiana de automóviles de lujo y deportivos, reconocida mundialmente por su excelencia en diseño y rendimiento. Fundada en 1939 por Enzo Ferrari, inicialmente se centró en la fabricación de autos de competición y luego expandió su producción a automóviles de calle de alto rendimiento.
          </p>
          <p>
            Los autos Ferrari se caracterizan por su diseño distintivo, su potente motor y su rendimiento excepcional en pistas y carreteras. Además de los automóviles, Ferrari también tiene una presencia fuerte en la Fórmula 1, siendo uno de los equipos más exitosos y emblemáticos de la historia del deporte.
          </p>
          <p>
            En resumen, Ferrari representa no solo la pasión por la velocidad y la ingeniería de precisión, sino también un símbolo de estatus y exclusividad en el mundo del automovilismo y más allá.
          </p>
        </article>

        <article class="mb-4">
          <h2>Origen de Ferrari</h2>
          <p>
            Ferrari es una marca italiana de automóviles de lujo y deportivos, reconocida mundialmente por su excelencia en diseño y rendimiento. Fundada en 1939 por Enzo Ferrari, inicialmente se centró en la fabricación de autos de competición y luego expandió su producción a automóviles de calle de alto rendimiento.
          </p>
          <p>
            Los autos Ferrari se caracterizan por su diseño distintivo, su potente motor y su rendimiento excepcional en pistas y carreteras. Además de los automóviles, Ferrari también tiene una presencia fuerte en la Fórmula 1, siendo uno de los equipos más exitosos y emblemáticos de la historia del deporte.
          </p>
          <p>
            En resumen, Ferrari representa no solo la pasión por la velocidad y la ingeniería de precisión, sino también un símbolo de estatus y exclusividad en el mundo del automovilismo y más allá.
          </p>
        </article>

        <article class="mb-4">
          <h2>Modelos más famosos</h2>
          <p><strong>Ferrari 250 GTO:</strong> Considerado uno de los automóviles más legendarios y valiosos del mundo, producido en la década de 1960 para carreras de gran turismo.</p>
          <img src="https://cdn.motor1.com/images/mgl/MkvqvX/s3/1962-ferrari-250-gto-auction.jpg" class="img-fluid mb-3" alt="Ferrari 250 GTO">
          <p><strong>Ferrari F40:</strong> Introducido en 1987 como un superdeportivo de alto rendimiento para celebrar el 40 aniversario de la marca. Fue el coche de producción más rápido y potente de su época.</p>
          <img src="https://cdn.ferrari.com/cms/network/media/img/resize/5de7923a91756c07f10b1720-ferrari-f40-1987-intro-share?width=1080" class="img-fluid mb-3" alt="Ferrari F40">
          <p><strong>Ferrari Testarossa:</strong> Fabricado entre 1984 y 1996, es conocido por su diseño distintivo con tomas de aire laterales y su presencia en la cultura pop de los años 80 y 90.</p>
          <img src="https://blog.way.com/wp-content/uploads/2024/01/Ferrari-Testarossa-1.jpg" class="img-fluid mb-3" alt="Ferrari Testarossa">
          <p><strong>Ferrari Enzo:</strong> Lanzado en 2002, lleva el nombre del fundador de la compañía y representa lo último en tecnología y diseño de Ferrari en ese momento.</p>
          <img src="https://cdn.motor1.com/images/mgl/KLgJq/s3/2003-ferrari-enzo-sells-for-3.8-million.jpg" class="img-fluid mb-3" alt="Ferrari Enzo">
        </article>
      </div>

      <aside class="col-lg-4">
        <div class="alert alert-secondary" role="alert">
          Ferrari tiene una política muy estricta en cuanto a quién puede comprar sus autos más exclusivos, como el Ferrari LaFerrari. Antes de poder adquirir uno de estos vehículos, los clientes potenciales deben ser seleccionados por Ferrari y deben tener una historia significativa de ser propietarios de otros modelos de la marca. Además, deben ser considerados verdaderos aficionados y entusiastas de Ferrari. Esta medida no solo asegura que los vehículos de Ferrari permanezcan en manos de coleccionistas dedicados, sino que también mantiene la exclusividad y el prestigio de la marca.
        </div>
      </aside>
    </div>

    <footer class="footer text-center mt-4">
      <p>Copyright © 2024 - TurboDrive</p>
    </footer>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
