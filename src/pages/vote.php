<?php
// Verificar si hay mensajes en el GET
$message = isset($_GET['message']) ? $_GET['message'] : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cartelería - Vote</title>
  <link rel="stylesheet" href="../styles/base/normalize.css">
  <link rel="stylesheet" href="../styles/base/base.css">
  <link rel="stylesheet" href="../styles/header.css">
  <link rel="stylesheet" href="../styles/footer.css">
  <link rel="stylesheet" href="../styles/results.css">
  <link rel="stylesheet" href="../styles/vote.css">
</head>

<body>
  <section class="alert">
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
  <section class="requirements">
      <h1>Requisitos para votar:</h1>
      <div class="steps-container">
        <!-- Paso 1 -->
        <div class="step">Requisito 1</div>
        <div class="description">Sólo se admite un <strong>ÚNICO</strong> voto por persona</div>
        <!-- Paso 2 -->
        <div class="step">Requisito 2</div>
        <div class="description">Es necesario tener <strong>CIAL Y PIN</strong></div>
        <!-- Paso 3 -->
        <div class="step">Requisito 3</div>
        <div class="description">Una vez emitido el voto, <strong>NO SE PODRÁ MODIFICAR</strong></div>
      </div>
    </section>
    <div class="form-container">
      <h1>Votación</h1>
      <?php if ($message): ?>
        <div class="message">
          <?php
          switch ($message) {
            case 'voted':
              echo "<p class='success'>¡Gracias por tu voto!</p>";
              break;
            case 'userVoted':
              echo "<p class='error'>Ya has votado anteriormente.</p>";
              break;
            case 'userNotValid':
              echo "<p class='error'>Usuario o PIN no válidos.</p>";
              break;
            default:
              echo "<p class='error'>Ocurrió un error desconocido.</p>";
              break;
          }
          ?>
        </div>
      <?php endif; ?>

      <form action="../scripts/votar.php" method="POST">
        <div class="form-group">
          <label for="cial">CIAL (ID de Usuario):</label>
          <input type="text" id="cial" name="cial" required maxlength="20" placeholder="Ingresa tu CIAL">
        </div>
        <div class="form-group">
          <label for="pin">PIN:</label>
          <input type="password" id="pin" name="pin" required maxlength="10" placeholder="Ingresa tu PIN">
        </div>
        <div class="form-group">
          <label for="id_cartel">ID del Cartel:</label>
          <input type="text" id="id_cartel" name="id_cartel" required maxlength="10" placeholder="Ingresa el ID del Cartel">
        </div>
        <button type="submit" class="btn-submit">Votar</button>
      </form>
    </div>
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
