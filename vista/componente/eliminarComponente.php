<!doctype html>
<?php
include_once '../../modelo/componente.php';
include_once '../../modelo/conexion.php';
include_once '../../controlador/controladorComponentes.php';
?>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Agregar Componentes</title>
  </head>
  <body>
    <div class="container">
    <div class=row>
      <div class="col-md-10 offset-md-1">
      <?php
      try{
        if(!isset($_REQUEST["referencia"])){
          throw new PDOException("Por favor digite la identificación");
        }
        $pz_referencia=$_REQUEST["referencia"];

        $componente=new componente();
        $componente->setPzReferencia($pz_referencia);

        $controladorComponentes=new controladorComponentes();
        $mensaje=$controladorComponentes->eliminar($componente);

        echo '<h2 class="text-center text-success">' . $mensaje . "<h2>";
      }catch(PDOException $e){
        echo '<h2 class="text-center text-success">' . $e->getMessage() . "<h2>";
      }
    ?>
      </div>
      
  <br>

  <div class="row">
    <div class="col">
      <a class="btn btn-warning" href="listarComponentes.php">Regresar al listado</a>
    </div>
  </div>
  </div>
  </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>