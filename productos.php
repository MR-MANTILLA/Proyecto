
<!doctype html>
<html lang="es">
        <head>
            <title>Componentes</title>
                <!-- Required meta tags -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <!-- Bootstrap CSS -->
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        </head>
    <body>
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12">
                    <h1 class="text-center">
                        Productos
                    </h1>
                <div class="row">
                    <div class="col">
                        <table class="table table-bordered">
                            <thread>
                                <tr>
                                    <td>Nombre</td>
                                    <td>Marca</td>
                                    <td>Price</td>
                                </tr>
                            </thread>
                
        
        <?php
            $productos = [
        
                array(  "name"=>"Motherboard",
                        "Marca"=>"Gybabyte A320",
                        "precio"=>"3.00000"
                    
                    ),
        
                array(  "name"=>"Procesador",
                        "Marca"=>"Ryzen 5 3400g",
                        "precio"=>"7.00000"),

                array(  "name"=>"Ram",
                        "Marca"=>"Aurus de 3000 mhz rgb ",
                        "precio"=>"3.00000"),

                array(  "name"=>"Fuente de Poder",
                        "Marca"=>"Corsair de 500 watts 80 white",
                        "precio"=>"3.00000"),
        
            ];
    

        $cantidad_productos=count($productos);

            for($i=0; $i < $cantidad_productos; $i++) { 
        
                echo "<tr>"."<td>".$productos[$i]["name"]."</td>";
                echo "<td>".$productos[$i]["Marca"]."</td>";
                echo "<td>".$productos[$i]["precio"]."</td>"."</tr>";
            }
    
    

    
    ?>
                        
                        </div>
                    </div>
                </div>    
            </div>    
        </div>   

  
  
        <a class="btn btn-warning" href="./index.php">Regresar al Inicio</a>
 
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        </body>
</html>
