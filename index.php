<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>formulario</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="cont-p m-5">
        <form action="./control_usuario.php" method="post">
            <h2 class="my-4">Formulario</h2>
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" name="nombre" id="nombre">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">E-mail</label>
              <input type="email" class="form-control" name="email" id="email">
            </div>

            <div class="mb-3">
              <label for="contraseña" class="form-label">Contraseña</label>
              <input type="password" class="form-control" name="contrasenia" id="contraseña">
            </div>

            <div class="mb-3">
              <div class="g-recaptcha" data-sitekey="6LcJJmUpAAAAALg9JKz-2uc3RySuMzJKWG-pKIW4"></div>
            </div>
            <br>

            <input type="submit" class="btn btn-primary" name="btn" value="Enviar">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>

