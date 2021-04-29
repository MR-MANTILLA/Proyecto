<!doctype html>
<?php
  include_once '../../controlador/controladorComponentes.php';
  include_once '../../modelo/conexion.php';
  include_once '../../modelo/componente.php';
  include_once '../../modelo/dependencia.php';
?>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Lista Componentes</title>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h1 class="text-center text-success">
                    LISTADO DE COMPONENTES
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-20 ">
                <div class="row">
                    <div class="col">
                        <a class="btn btn-primary" href="./formularioCrearComponente.php">Crear nuevo</a>
                    </div>
                </div>
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                          <td>Referencia</td>
                          <td>Motherboard</td>
                          <td>Procesador</td>
                          <td>RAM</td>
                          <td>Video</td>
                          <td>Fuente</td>
                          <td>Dependencia</td>
                          <td>Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $controladorComponentes=new controladorComponentes(); //crea un objeto de tipo clase
                        $componentes=$controladorComponentes->listar();       //crea una variable y guarda el objeto con la funcion listar
                          foreach($componentes as $componente){     
                        ?>
                        <tr>
                            <td>
                              <?php echo $componente->getPzReferencia() ?>
                            </td>
                            <td>
                              <?php echo $componente->getPzMotherboard() ?>
                            </td>
                            <td>
                              <?php echo $componente->getPzProcesador() ?>
                            </td>
                            <td>
                              <?php echo $componente->getPzRam() ?>
                            </td>
                            <td>
                              <?php echo $componente->getPzVideo() ?>
                            </td>
                            <td>
                              <?php echo $componente->getPzFuente() ?>  
                            </td>
                            <td>
                              <?php echo $componente->getDependencia()->getDepNombre() ?>
                            </td>
                            <td>
                                <div class="row mt">
                                    <div class="col-md-5 text-center">
                                        <a class="btn btn-warning" href="formularioEditarComponente.php?pz_referencia=<?php echo $componente->getPzReferencia() ?>">Editar</a>
                                    </div>
                                    <div class="col-md-5 text-center">
                                        <a class="btn btn-danger" href="formularioEliminarComponente.php?pz_referencia=<?php echo $componente->getPzReferencia() ?>">Eliminar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <button type="button" class="btn btn-secondary" onclick="location.href='../../index.php'">atras</button>
    </div>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
