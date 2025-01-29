<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cartelería - Galería</title>
  <link rel="stylesheet" href="../styles/base/normalize.css">
  <link rel="stylesheet" href="../styles/base/base.css">
  <link rel="stylesheet" href="../styles/header.css">
  <link rel="stylesheet" href="../styles/footer.css">
  <link rel="stylesheet" href="../styles/participate.css">
  <link rel="stylesheet" href="../styles/gallery.css">
</head>

<body>

  <section class="alert text-align-center">
    <?php
    require_once "../components/component_alert.php";

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

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
    <section class="data-box flex-column gap-1-5 gridded">
    <?php
      require_once "../db/cx_gallery.php";
      $resultados = getGallery();
      if ($resultados && count($resultados) > 0) {
        foreach ($resultados as $resultado) {
          echo "<article class='data-box flex-column bordered centered'>";
            echo "<iframe class='frame bordered' src='data:application/pdf;base64," . base64_encode($resultado['imagen']) . "'></iframe>";
            echo "<h3>" . htmlspecialchars($resultado['titulo']) . "</h3>";
            echo "<p>". htmlspecialchars($resultado['descripcion']) . "</p>";
            echo "<a class='fake_button full-width-button' style='width=100%' href='vote.php?id=" . htmlspecialchars($resultado['id']) . "'>Votar</a>";
          echo "</article>";
        }
      } else {
        echo "<p>No hay resultados disponibles.</p>";
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
