<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Lista de Clientes</title>
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

  <!-- Custom CSS -->
  <style>
      body {
          background: linear-gradient(to right, #6a11cb, #2575fc); /* Fondo con degradado */
          font-family: 'Arial', sans-serif; /* Cambiar la fuente */
          color: white; /* Color de texto principal */
      }
      
      .container {
          background-color:  hsla(0, 0%, 100%, 0.623); /* Fondo blanco con transparencia */
          padding: 20px;
          border-radius: 10px;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra suave */
      }

      h1 {
          font-family: 'Helvetica', sans-serif;
          font-weight: bold;
          color: #000000; /* Color de encabezado */
      }

      .btn-success {
        background-color: #9a41e2;
        border-color: #9a41e2;
        font-weight: bold;
        transition: background-color 0.3s ease; /* Transición suave para el cambio de color */
    }

    .btn-success:hover {
        background-color: #007bff; /* Azul para el hover */
        border-color: #007bff; /* Cambiar el borde también */
    }

      table thead {
          background-color: #343a40; /* Fondo oscuro para la cabecera de la tabla */
          color: white;
          text-align: center;
      }

      table tbody tr:nth-child(even) {
          background-color: #f2f2f2; /* Alternar colores para filas */
      }

      table tbody tr:nth-child(odd) {
          background-color: #e9ecef;
      }

      .table {
          margin-top: 20px;
      }

      .btn-primary, .btn-danger {
          margin-right: 5px;
          font-weight: bold;
      }

      .actions-col {
          text-align: center; /* Centra los botones en la columna de acciones */
      }
  </style>
</head>
<body>
  <div class="container mt-4">
    <h1 class="text-center">Clientes Registrados</h1>
    <div class="d-flex justify-content-start mb-3">
        <!-- Botón ahora a la izquierda -->
        <a href="<?php echo site_url('/cliente-form') ?>" class="btn btn-success">Agregar Cliente</a>
    </div>
    
    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <table class="table table-bordered" id="clientes-list">
       <thead>
          <tr>
             <th>ID</th>
             <th>Nombre</th>
             <th>Dirección</th>
             <th>Teléfono</th>
             <th>Email</th>
             <th>CUI</th>
             <th>Acciones</th>
          </tr>
       </thead>
       <tbody>
          <?php if($clientes): ?>
          <?php foreach($clientes as $cliente): ?>
          <tr>
             <td><?php echo $cliente['id']; ?></td>
             <td><?php echo $cliente['nombre']; ?></td>
             <td><?php echo $cliente['direccion']; ?></td>
             <td><?php echo $cliente['telefono']; ?></td>
             <td><?php echo $cliente['email']; ?></td>
             <td><?php echo $cliente['cui']; ?></td>
             <td class="actions-col">
              <a href="<?php echo base_url('edit-cliente/'.$cliente['id']); ?>" class="btn btn-primary btn-sm">Editar</a>
              <a href="#" class="btn btn-danger btn-sm" onclick="confirmDelete('<?php echo base_url('delete-cliente/'.$cliente['id']); ?>')">Eliminar</a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
    </table>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready( function () {
      $('#clientes-list').DataTable({
        "searching": false,    // Desactiva la barra de búsqueda
        "lengthChange": false  // Desactiva la opción de cambiar el número de filas
      });
    });

    function confirmDelete(url) {
      if (confirm('¿Estás seguro de que deseas eliminar este registro?')) {
        window.location.href = url;
      }
    }
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>


