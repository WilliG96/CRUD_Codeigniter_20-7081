<!DOCTYPE html>
<html>

<head>
  <title>Editar Cliente</title>
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
  <h1 class="text-center">Información del Cliente</h1>
    <form method="post" id="update_cliente" name="update_cliente" action="<?= site_url('/update-cliente') ?>">
      <input type="hidden" name="id" id="id" value="<?php echo $cliente_obj['id']; ?>">

      <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control" value="<?php echo $cliente_obj['nombre']; ?>">
      </div>

      <div class="form-group">
        <label>Dirección</label>
        <input type="text" name="direccion" class="form-control" value="<?php echo $cliente_obj['direccion']; ?>">
      </div>

      <div class="form-group">
        <label>Teléfono</label>
        <input type="text" name="telefono" class="form-control" value="<?php echo $cliente_obj['telefono']; ?>">
      </div>

      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="<?php echo $cliente_obj['email']; ?>">
      </div>

      <div class="form-group">
        <label>CUI</label>
        <input type="text" name="cui" class="form-control" value="<?php echo $cliente_obj['cui']; ?>">
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Actualizar Datos</button>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script>
    if ($("#update_cliente").length > 0) {
      $("#update_cliente").validate({
        rules: {
          nombre: {
            required: true,
          },
          direccion: {
            required: true,
          },
          telefono: {
            required: true,
            digits: true
          },
          email: {
            required: true,
            maxlength: 60,
            email: true,
          },
          cui: {
            required: true,
            digits: true
          },
        },
        messages: {
          nombre: {
            required: "Nombre es requerido.",
          },
          direccion: {
            required: "Dirección es requerida.",
          },
          telefono: {
            required: "Teléfono es requerido.",
            digits: "Teléfono debe ser un número válido."
          },
          email: {
            required: "Email es requerido.",
            email: "Debe ingresar un email válido.",
            maxlength: "El email debe tener 60 caracteres o menos.",
          },
          cui: {
            required: "CUI es requerido.",
            digits: "CUI debe ser un número válido."
          }
        },
      });
    }
  </script>
</body>

</html>
