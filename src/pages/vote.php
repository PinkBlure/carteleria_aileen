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

    <?php

    if (isset($_GET['id'])) {
      $id = $_GET['id'];
    } else {
      echo "<div class='data-box' style='border: 2px solid red'>Este cartel no existe</div>";
    }

    if (isset($_GET['error'])) {
      echo "<div class='data-box' style='border: 2px solid red'>" .
        $mensaje = htmlspecialchars($_GET['error']) .
        "</div>";
    }

    if (isset($_GET['accept'])) {
      echo "<div class='data-box' style='border: 2px solid green'>" .
        $mensaje = htmlspecialchars($_GET['accept']) .
        "</div>";
    }
    ?>

    <h1>Requisitos para votar</h1>
    <section class="flex-column gap-1-5 margin-bt-6">
      <div class="flex-column gap-1 gridded-inverse">
        <div class="data-box background-3 font-bold text-align-center">Requisito 1</div>
        <div class="data-box bordered">Sólo se admite un <strong>ÚNICO</strong> voto por persona</div>
      </div>
      <div class="flex-column gap-1 gridded-inverse">
        <div class="data-box background-3 font-bold text-align-center">Requisito 2</div>
        <div class="data-box bordered">Es necesario tener <strong>CIAL Y PIN</strong></div>
      </div>
      <div class="flex-column gap-1 gridded-inverse">
        <div class="data-box background-3 font-bold text-align-center">Requisito 3</div>
        <div class="data-box bordered">Una vez emitido el voto, <strong>NO SE PODRÁ MODIFICAR</strong></div>
      </div>
    </section>

    <h1>Formulario de votación</h1>

    <form action="../db/cx_vote.php" method="POST" enctype="multipart/form-data" class="background-3 flex-column data-box max-width margin-bt-6">
      <fieldset class="border-none flex-column gap-1 max-width">
        <label for="cial">CIAL del usuario:</label>
        <input type="text" name="cial" id="cial" maxlength="20" required class="data-box bordered">
      </fieldset>
      <fieldset class="border-none flex-column gap-1 max-width">
        <label for="pin">PIN del usuario:</label>
        <input type="password" name="pin" id="pin" maxlength="4" required class="data-box bordered">
      </fieldset>
      <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id']); ?>">
      <fieldset class="border-none flex-column gap-1 max-width">
        <button class="button" type="submit">Votar cartel</button>
      </fieldset>
    </form>

    <h1>¿Cuál es mi CIAL?</h1>
    <section class="flex-column gap-1-5 margin-bt-6">
      <div class="flex-column gap-1">
        <div class="data-box background-3 font-bold text-align-center">Paso 1</div>
        <div class="data-box bordered">Entrar al portal de <a href="https://www.gobiernodecanarias.org/educacion/PEKWEB/Ekade">Pincel Ekade</a></div>
        <div class="data-box bordered flex-column centered">
          <img src="../img/ekade.png" class="max-width">
        </div>
      </div>
      <div class="flex-column gap-1">
        <div class="data-box background-3 font-bold text-align-center">Paso 2</div>
        <div class="data-box bordered">Logear con tu credencial</div>
        <div class="data-box bordered flex-column centered">
          <img src="../img/login.png" class="max-width">
        </div>
      </div>
      <div class="flex-column gap-1">
        <div class="data-box background-3 font-bold text-align-center">Paso 3</div>
        <div class="data-box bordered">Tu CIAL se encuentra en la zona azul</div>
        <div class="data-box bordered flex-column centered">
          <img src="../img/gestion.png" class="max-width">
        </div>
      </div>
    </section>

    <h1>¿Cuál es mi PIN?</h1>
    <section class="flex-column gap-1-5 margin-bt-6">
      <div class="flex-column gap-1">
        <div class="data-box background-3 font-bold text-align-center">Paso 1</div>
        <div class="data-box bordered">Tu PIN son los últimos 4 dígitos de tu DNI sin letra</div>
        <div class="data-box bordered flex-column centered">
          <img src="../img/dni.png" class="max-width">
        </div>
      </div>
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
