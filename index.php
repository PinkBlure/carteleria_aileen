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
  <section class="alert">
    <?php
      require_once "src/components/component_alert.php";
    ?>
  </section>

  <div>

    <header class="header_container">
      <a href="index.php" class="logo_sagaseta_container"><img src="src/img/logo_sagaseta.svg" alt="logo" class="logo_sagaseta"></a>
      <h1 class="header_title">Concurso día de Canarias</h1>
    </header>

    <div class="nav">
      <a href="src/pages/participate.php">Participar</a>
      <a href="src/pages/results.php">Resultados</a>
      <a href="src/pages/gallery.php">Galería de carteles</a>
    </div>
  </div>

  <main>
    <section class="section_date">
        <div class="fecha">
          <h1>Fechas del Concurso</h1>
            <?php
            // Llamar a la función getDates() que fue incluida en el archivo cx_database.php
            require_once "src/db/cx_date.php";

            $result = getDates();  // Llamada a la función getDates

            // Verificar si tenemos resultados
            if ($result && count($result) > 0) {
                foreach ($result as $fecha) {
                    // Mostrar cada evento con su fecha y descripción al lado
                    echo "<div class='date-item'>";
                    echo "<span class='descripcion'>" . htmlspecialchars($fecha['descripcion']) . "</span> &rarr;";
                    echo "<span class='fechas'>" . htmlspecialchars(
                      DateTime::createFromFormat('Y-m-d', $fecha['fecha'])->format('d-m-Y')
                    ) . "</span>";
                    echo "</div>";
                }
            } else {
                echo "<p>No hay fechas disponibles.</p>";
            }
            ?>
        </div>
    </section>

    <section class="requirements">
      <h1>Requisitos para participar:</h1>
      <div class="steps-container">
        <!-- Paso 1 -->
        <div class="step">Paso 1</div>
        <div class="description">Los autores deben ser alumnos del centro.</div>
        <!-- Paso 2 -->
        <div class="step">Paso 2</div>
        <div class="description">Los carteles deben reflejar elementos alusivos a la cultura, tradiciones, símbolos y patrimonio de Canarias.</div>
        <!-- Paso 3 -->
        <div class="step">Paso 3</div>
        <div class="description">Se permite cualquier técnica, siempre que el diseño final esté en formato digital.</div>
        <!-- Paso 4 -->
        <div class="step">Paso 4</div>
        <div class="description">El cartel debe presentarse en formato vertical y en tamaño DIN A3 (3508 x 4961 píxeles). Subido en formato PDF.</div>
        <!-- Paso 5 -->
        <div class="step">Paso 5</div>
        <div class="description">Cualquier diseño que incluya contenido inapropiado o contrario a los valores de respeto y convivencia será descalificado.</div>
        <!-- Paso 6 -->
        <div class="step">Paso 6</div>
        <div class="description">Al participar, los autores ceden los derechos de uso y reproducción de sus diseños al centro educativo para posibles exposiciones y publicaciones.</div>
      </div>
    </section>
    
    <section class="results">
      <h1>Entrega de premios</h1>
        <div class="awards">
          <p> Como parte de las actividades conmemorativas del Día de Canarias, la entrega de premios será uno de los momentos más destacados de este evento tan especial.
          <br><br>
          Esta se hará a lo largo del día en un ambiente lleno de emoción y orgullo, se reconocerá públicamente a las personas que han contribuido al desarrollo cultural, social y artístico de nuestras islas.
          </p>
          <h3>¡No te pierdas esta celebración del talento, la dedicación y espíritu canario!</h3>
        </div>
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
