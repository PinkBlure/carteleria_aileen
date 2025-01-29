<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cartelería - Home</title>
  <link rel="stylesheet" href="src/styles/base/normalize.css">
  <link rel="stylesheet" href="src/styles/base/base.css">
  <link rel="stylesheet" href="src/styles/header.css">
  <link rel="stylesheet" href="src/styles/footer.css">
  <link rel="stylesheet" href="src/styles/index.css">
</head>

<body>

  <section class="alert text-align-center">
    <?php
    require_once "src/components/component_alert.php";
    ?>
  </section>

  <header class="header_container">
    <a href="index.php" class="logo_sagaseta_container"><img src="src/img/logo_sagaseta.svg" alt="logo" class="logo_sagaseta"></a>
    <h1 class="header_title">Concurso día de Canarias</h1>
  </header>

  <div class="nav">
    <a href="src/pages/participate.php">Participar</a>
    <a href="src/pages/results.php">Resultados</a>
    <a href="src/pages/gallery.php">Galería de carteles</a>
  </div>


  <main>

    <h1>Fechas del Concurso</h1>
    <section class="flex-column gap-1-5 margin-bt-6">
      <?php
      require_once "src/db/cx_date.php";
      $result = getDates();
      if ($result && count($result) > 0) {
        foreach ($result as $fecha) {
          echo "<div class='flex-column gap-1 gridded'>";
          echo "<div class='data-box background-3 font-bold text-align-center'>" . htmlspecialchars($fecha['descripcion']) . "</div>";
          echo "<div class='data-box bordered font-bold text-align-center'>" .
            htmlspecialchars(DateTime::createFromFormat('Y-m-d', $fecha['fecha'])->format('d-m-Y')) .
            "</div>";
          echo "</div>";
        }
      } else {
        echo "<p class='no-dates'>No hay fechas disponibles.</p>";
      }
      ?>
    </section>

    <h1>Requisitos para participar</h1>
    <section class="flex-column gap-1-5 margin-bt-6">
      <div class="flex-column gap-1 gridded-inverse">
        <div class="data-box background-3 font-bold text-align-center">Paso 1</div>
        <div class="data-box bordered">Los autores deben ser alumnos del centro.</div>
      </div>
      <div class="flex-column gap-1 gridded-inverse">
        <div class="data-box background-3 font-bold text-align-center">Paso 2</div>
        <div class="data-box bordered">Los carteles deben reflejar elementos alusivos a la cultura, tradiciones, símbolos y patrimonio de Canarias.</div>
      </div>
      <div class="flex-column gap-1 gridded-inverse">
        <div class="data-box background-3 font-bold text-align-center">Paso 3</div>
        <div class="data-box bordered">Se permite cualquier técnica, siempre que el diseño final esté en formato digital.</div>
      </div>
      <div class="flex-column gap-1 gridded-inverse">
        <div class="data-box background-3 font-bold text-align-center">Paso 4</div>
        <div class="data-box bordered">El cartel debe presentarse en formato vertical y en tamaño DIN A3 (3508 x 4961 píxeles). Subido en formato PDF.</div>
      </div>
      <div class="flex-column gap-1 gridded-inverse">
        <div class="data-box background-3 font-bold text-align-center">Paso 5</div>
        <div class="data-box bordered">Cualquier diseño que incluya contenido inapropiado o contrario a los valores de respeto y convivencia será descalificado.</div>
      </div>
      <div class="flex-column gap-1 gridded-inverse">
        <div class="data-box background-3 font-bold text-align-center">Paso 6</div>
        <div class="data-box bordered">Al participar, los autores ceden los derechos de uso y reproducción de sus diseños al centro educativo para posibles exposiciones y publicaciones.</div>
      </div>
    </section>

    <h1>Entrega de premios</h1>
    <section class="data-box bordered margin-bt-6">
      <p> Como parte de las actividades conmemorativas del Día de Canarias, la entrega de premios será uno de los momentos más destacados de este evento tan especial.
        <br><br>
        Esta se hará a lo largo del día en un ambiente lleno de emoción y orgullo, se reconocerá públicamente a las personas que han contribuido al desarrollo cultural, social y artístico de nuestras islas.
      </p>
      <h3 class="text-align-center">¡No te pierdas esta celebración del talento, la dedicación y espíritu canario!</h3>
    </section>
  </main>

  <footer class="footer_container">
    <div class="nav">
      <a href="src/pages/participate.php">Participar</a>
      <a href="src/pages/results.php">Resultados</a>
      <a href="src/pages/gallery.php">Galería de carteles</a>
    </div>
    <p>2ºDAW IES Fernando Sagaseta</p>
  </footer>

</body>

</html>
