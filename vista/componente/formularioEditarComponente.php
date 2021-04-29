<!doctype html>
<?php
    
    include_once '../../modelo/componente.php';
    include_once '../../modelo/conexion.php';
    include_once '../../modelo/dependencia.php';
    include_once '../../controlador/controladorComponentes.php';
    include_once '../../controlador/controladorDependencia.php';
?>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Editar Componentes</title>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10 offset-md-1">
                <h1 class="text-center text-success">
                    Editar Componentes
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
                    <div class="card-body">
                        <form action="actualizarComponentes.php" method="POST">

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="referencia">Referencia del combo</label>
                                    <input name="referencia" type="text" class="form-control" id="referencia" value="<?php echo $componente->getPzReferencia() ?>" readonly>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="motherboard">Motherboard</label>
                                    <input name="motherboard" type="text" class="form-control" id="motherboard" value="<?php echo $componente->getPzMotherboard() ?>" required>
                                </div>
                            </div>
                        
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="procesador">Procesador</label>
                                    <input name="procesador" type="text" class="form-control" id="procesador" value="<?php echo $componente->getPzProcesador() ?>" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="ram">RAM</label>
                                    <input name="ram" type="text" class="form-control" id="ram" value="<?php echo $componente->getPzRam() ?>" required>
                                </div>
                            </div>
                        
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="video">Video</label>
                                    <input name="video" type="text" class="form-control" id="video" value="<?php echo $componente->getPzVideo() ?>" required>
                                </div>
                            </div>
                        
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="fuente">Fuente</label>
                                    <input name="fuente" type="text" class="form-control" id="fuente" value="<?php echo $componente->getPzFuente() ?>" required>
                                </div>
                            </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="dependencia_id">Dependencia</label>
                                <select name="dependencia_id" id="dependencia_id" class="form-control">
                                <option value="">---Seleccione---</option>
                                    <?php
                                        $controladorDependencia=new controladorDependencia();
                                        $dependencias=$controladorDependencia->listar();
                                        if(count($dependencias)>0){
                                            foreach($dependencias as $dependencia){
                                                if($componente->getPzDependenciaId()==$dependencia->getDepId()){
                                                    echo '<option value="' . $dependencia->getDepId() . '" selected >' . $dependencia->getDepNombre() . '</option>';
                                                }else{
                                                echo '<option value="' . $dependencia->getDepId() . '">' . $dependencia->getDepNombre() . '</option>';
                                            }
                                        }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-dark">Enviar</button>
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