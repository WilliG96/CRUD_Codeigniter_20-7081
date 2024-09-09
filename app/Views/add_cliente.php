<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Cliente</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    .container {
      max-width: 500px;
    }

    .error {
      display: block;
      padding-top: 5px;
      font-size: 14px;
      color: red;
    }


    body {
          background: linear-gradient(to right, #6a11cb, #2575fc); /* Fondo con degradado */
          font-family: 'Arial', sans-serif; /* Cambiar la fuente */
          color: white; /* Color de texto principal */
      }
      

      h1 {
          font-family: 'Helvetica', sans-serif;
          font-weight: bold;
          color: #ffffff; /* Color de encabezado */
      }
    
    .btn-primary{
        background-color: #6a11cb; /* Color de fondo */
        font-weight: bold;
    }


  </style>
</head>

<body>
  <div class="container mt-5">
    <h1 class="text-center">Ingrese los Datos</h1>
    <form method="post" id="add_create" name="add_create" action="<?= site_url('/store-cliente') ?>">
      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" class="form-control" required>
        <span class="error" id="nombre-error"></span>
      </div>

      <div class="form-group">
        <label for="direccion">Dirección</label>
        <input type="text" id="direccion" name="direccion" class="form-control" required>
        <span class="error" id="direccion-error"></span>
      </div>

      <div class="form-group">
        <label for="telefono">Teléfono</label>
        <input type="text" id="telefono" name="telefono" class="form-control" required>
        <span class="error" id="telefono-error"></span>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control" required>
        <span class="error" id="email-error"></span>
      </div>

      <div class="form-group">
        <label for="cui">Número de CUI</label>
        <input type="text" id="cui" name="cui" class="form-control" required>
        <span class="error" id="cui-error"></span>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Agregar Cliente</button>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script>
    $(document).ready(function () {
      $("#add_create").validate({
        rules: {
          nombre: {
            required: true
          },
          direccion: {
            required: true
          },
          telefono: {
            required: true
          },
          email: {
            required: true,
            email: true
          },
          cui: {
            required: true
          }
        },
        messages: {
          nombre: {
            required: "Nombre es requerido."
          },
          direccion: {
            required: "Dirección es requerida."
          },
          telefono: {
            required: "Teléfono es requerido."
          },
          email: {
            required: "Email es requerido.",
            email: "Debe ingresar un email válido."
          },
          cui: {
            required: "Número de CUI es requerido."
          }
        },
        errorPlacement: function (error, element) {
          var id = element.attr('id');
          error.appendTo('#' + id + '-error');
        }
      });
    });
  </script>
</body>

</html>
