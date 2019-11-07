<!DOCTYPE html>
<html lang="en">
  <head>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="abm.css" />

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Document</title>
  </head>
  <body>
    <ul class="nav justify-content-center bg-dark">
      <li class="nav-item">
        <a class="nav-link" href="Add_product.php">Comics/Heroes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="usuarios.php">Usuarios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="compras.php">Compras</a>
      </li>
    </ul>


    <table class="table">
  <thead>
    <tr>
      <th scope="col">Venta</th>
      <th scope="col">Usuario</th>
      <th scope="col">Producto</th>
      <th scope="col">cant</th>
      <th scope="col">total</th>
      <th scope="col">fecha</th>
    </tr>
  </thead>
    <tbody>
        <?php include("../include/getCompra.php"); ?>
    </tbody>
</table>



    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
