<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cartelería - Participación</title>
  <link rel="stylesheet" href="../styles/base/normalize.css">
  <link rel="stylesheet" href="../styles/base/base.css">
  <link rel="stylesheet" href="../styles/header.css">
  <link rel="stylesheet" href="../styles/footer.css">
  <link rel="stylesheet" href="../styles/participate.css">
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

    <h1>Formulario de participación</h1>
    <form action="cx_participation.php" method="POST" enctype="multipart/form-data" class="background-3 flex-column data-box max-width margin-bt-6">
      <fieldset class="border-none flex-column gap-1 max-width">
        <label for="cial">CIAL del usuario:</label>
        <input type="text" name="cial" id="cial" maxlength="20" required class="data-box bordered">
      </fieldset>
      <fieldset class="border-none flex-column gap-1 max-width">
        <label for="pin">PIN del usuario:</label>
        <input type="password" name="pin" id="pin" maxlength="4" required class="data-box bordered">
      </fieldset>
      <fieldset class="border-none flex-column gap-1 max-width">
        <label for="titulo">Nombre del cartel:</label>
        <input type="text" name="titulo" id="titulo" maxlength="100" required class="data-box bordered">
      </fieldset>
      <fieldset class="border-none flex-column gap-1 max-width">
        <label for="descripcion">Descripción del cartel:</label>
        <input type="text" name="descripcion" id="descripcion" maxlength="100" required class="data-box bordered">
      </fieldset>
      <fieldset class="border-none flex-column gap-1 max-width">
        <label for="imagen">Selecciona la imagen del cartel:</label>
        <input type="file" name="imagen" id="imagen" accept="image/*" required class="data-box bordered">
      </fieldset>
      <fieldset class="border-none flex-column gap-1 max-width">
        <button class="button" type="submit">Subir cartel</button>
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

    <h1>¿Qué tamaño debe tener mi cartel?</h1>
    <section class="flex-column gap-1-5 margin-bt-6">
      <div class="flex-column gap-1">
        <div class="data-box background-3 font-bold text-align-center">Paso 1</div>
        <div class="data-box bordered">El cartel debe presentarse en formato vertical y en tamaño DIN A3 (3508 x 4961 píxeles).</div>
      </div>
    </section>

    <h1>¿En qué formato debo entregarlo?</h1>
    <section class="flex-column gap-1-5 margin-bt-6">
      <div class="flex-column gap-1">
        <div class="data-box background-3 font-bold text-align-center">Paso 1</div>
        <div class="data-box bordered">El cartel debe subirse en formato PDF.</div>
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
