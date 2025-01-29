<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cartelería - Resultados</title>
  <link rel="stylesheet" href="../styles/base/normalize.css">
  <link rel="stylesheet" href="../styles/base/base.css">
  <link rel="stylesheet" href="../styles/header.css">
  <link rel="stylesheet" href="../styles/footer.css">
  <link rel="stylesheet" href="../styles/results.css">
</head>

<body>

  <section class="alert text-align-center">
    <?php
    require_once "../components/component_alert.php";
    ?>
  </section>

  <div>
    <header class="header_container">
      <a href="../../index.php" class="logo_sagaseta_container"><img src="../img/logo_sagaseta.svg" alt="logo" class="logo_sagaseta"></a>
      <h1 class="header_title">Concurso día de Canarias</h1>
    </header>

    <div class="nav">
      <a href="participate.php">Participar</a>
      <a href="results.php">Resultados</a>
      <a href="gallery.php">Galería de carteles</a>
    </div>
  </div>

  <main>
    <h1>Resultados del concurso</h1>

    <section class="data-box flex-column bordered margin-bt-6 text-align-center">
      <h2>¡Felicidades a los Ganadores!</h2>
      <p>Hoy, 29 de mayo, se realizará la entrega de premios del Concurso del día de Canarias.</p>
      <p>Gracias a todos por participar y felicidades a los ganadores.</p>
    </section>

    <h1>Top carteles del concurso</h1>

    <section class="flex-column centered relative podio-big">

      <?php
      require_once "../db/cx_results.php";
      $resultados = getResults();

      if ($resultados && count($resultados) > 0) {
        $top = 1;
        foreach ($resultados as $resultado) {
          echo "<div class='data-box bordered text-align-center podio-card margin-bt-20 index-2 background-white'>";
            echo "<h2>TOP " . $top++ . "</h2>";

            $imagen = $resultado['imagen'];
            if ($imagen) {
              echo "<iframe class='frame bordered' src='data:application/pdf;base64," . base64_encode($resultado['imagen']) . "'></iframe>";
            } else {
              echo "<p>No se encontró imagen.</p>";
            }

            echo "<p><strong>Nombre:</strong> " . htmlspecialchars($resultado['nombre']) . "</p>";
            echo "<p><strong>Curso:</strong> " . htmlspecialchars($resultado['curso']) . "</p>";
            echo "<p><strong>Título:</strong> " . htmlspecialchars($resultado['titulo']) . "</p>";
          echo "</div>";
        }
        echo "<div class='gold absolute'></div>";
        echo "<div class='silver absolute'></div>";
        echo "<div class='bronze absolute'></div>";
      } else {
        echo "<p class='data-box bordered'>No hay resultados disponibles.</p>";
      }
      ?>
    </section>
  </main>

  <footer class="footer_container">
    <div class="nav">
      <a href="participate.php">Participar</a>
      <a href="results.php">Resultados</a>
      <a href="gallery.php">Galería de carteles</a>
    </div>
    <p>2ºDAW IES Fernando Sagaseta</p>
  </footer>

</body>

</html>
