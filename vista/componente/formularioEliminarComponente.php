<!doctype html>
<?php
    include_once "../../modelo/conexion.php";
    include_once "../../modelo/componente.php";
    include_once "../../controlador/controladorComponentes.php";
?>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Eliminar Componentes</title>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10 offset-md-1">
                <h1 class="text-center text-success">
                    Eliminar Componentes
                </h1>
            </div>
        </div>
        <?php
            if(!isset($_GET["pz_referencia"])){
            throw new PDOException("No se recibio el numero de referencia");
            }
        try{
            $pz_referencia=$_GET["pz_referencia"];
            $controladorComponentes=new controladorComponentes();
            $resultado=$controladorComponentes->buscar($pz_referencia);
                if(count($resultado)>0){
                    $componente=$resultado[0];
                }
        }catch(PDOException $e){
            echo "Fallo la conexion " . $e->getMessage();
        }
        ?>
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-title">
                        <div class="row">
                            <div class="col">
                                <h3 class="text-center text-primary">
                                    <?php echo $componente->getPzReferencia() . " - " . $componente->getPzMotherboard() . " - " . $componente->getPzProcesador() ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col">
                                        <h4>Motherboard</h4>
                                    </div>
                                    <div class="col">
                                        <h4><?php echo $componente->getPzMotherboard()?></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h4>Procesador</h4>
                                    </div>
                                    <div class="col">
                                        <h4><?php echo $componente->getPzProcesador()?></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h4>RAM</h4>
                                    </div>
                                    <div class="col">
                                        <h4><?php echo $componente->getPzRam()?></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h4>Video</h4>
                                    </div>
                                    <div class="col">
                                        <h4><?php echo $componente->getPzVideo()?></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h4>Fuente</h4>
                                    </div>
                                    <div class="col">
                                        <h4><?php echo $componente->getPzFuente()?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="eliminarComponente.php" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input name="referencia" type="hidden" class="form-control" id="referencia" value="<?php echo $componente->getPzReferencia()?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </div>
                                <div class="col text-center">
                                    <a class="btn btn-success" href="componente/listarComponentes.php">Regresar al listado</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>