<?php


class controladorDependencia{
    private $conexion;

    function __construct(){
        $this->conexion=new conexion();
        $this->conexion->getConexion()->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }

    function listar(){
        try{
            $sql="select * from dependencia";                               //guarda la seleccion de la tabla de la base de datos
            $ps=$this->conexion->getConexion()->prepare($sql);          //
            $ps->execute(NULL);
            $resultado=[];
            while($row=$ps->fetch(PDO::FETCH_OBJ)){                     //permite la impresion de tipo registro
                $dependencia=new dependencia();
                $dependencia->setDepId($row->dep_id);
                $dependencia->setDepNombre($row->dep_nombre);
                array_push($resultado,$dependencia);                     //Inserta uno o más elementos al final de un array
            }
            $this->conexion=null;                                       //cerrar la conexion
        }catch(PDOException $e){
            echo "Falló la conexion" . $e->getMessage();
        }
        return $resultado;
    }

    function crear($dependencia)
    {
        try {
            $resultado = [];
            $sql = "insert into dependencia values (?,?)";
            $ps = $this->conexion->getConexion()->prepare($sql);
            $ps->execute(array(
                $dependencia->getDepId(),
                $dependencia->getDepNombre()
            ));
            if ($ps->rowCount() > 0) {
                $mensaje = "Se creó la dependencia correctamente";
                $type = "success";
            } else {
                $mensaje = "No se pudo crear la dependencia";
                $type = "error";
            }
            $this->conexion = null;
        } catch (PDOException $e) {
            $mensaje = "Error al crear la persona " . $e->getMessage();
            $type = "error";
        }
        $resultado = [
            "mensaje" => $mensaje,
            "type"    => $type
        ];
        return $resultado;
    }

    function buscar($dep_id)
    {
        try {

            $sql = "select * from dependencia where dep_id = ?";
            $ps = $this->conexion->getConexion()->prepare($sql);
            $ps->execute(array(
                $dep_id
            ));
            $resultado = [];
            while ($row = $ps->fetch(PDO::FETCH_OBJ)) {
                $dependencia = new dependencia();
                $dependencia->setDepId($row->dep_id);
                $dependencia->setDepNombre($row->dep_nombre);
                array_push($resultado, $dependencia);
            }
            $this->conexion = null;
        } catch (PDOException $e) {
            echo "Falló la conexión " . $e->getMessage();
        }
        return $resultado;
    }

    function actualizar($dependencia)
    {
        $resultado = [];
        $sql = "update dependencia set dep_nombre=? where dep_id=?";
        $ps = $this->conexion->getConexion()->prepare($sql);
        $ps->execute(array(
            $dependencia->getDepNombre(),
            $dependencia->getDepId()
        ));
        if ($ps->rowCount() > 0) {
            $mensaje = "Se actualizó la dependencia correctamente";
            $type = "success";
        } else {
            $mensaje = "No se pudo actualizar la dependencia";
            $type = "error";
        }
        $resultado = [
            "mensaje" => $mensaje,
            "type"    => $type
        ];
        $this->conexion = null;
        return $resultado;
    }
    
    function eliminar($dependencia)
    {
        try {
            if ($this->validarComponentes($dependencia)) {
                $sql = "delete from dependencia where dep_id=?";
                $ps = $this->conexion->getConexion()->prepare($sql);
                $ps->execute(array(
                    $dependencia->getDepId()
                ));
                if ($ps->rowCount() > 0) {
                    $mensaje = "Se eliminó la dependencia correctamente";
                    $type = "success";
                } else {
                    $mensaje = "No se pudo eliminar la dependencia";
                    $type = "error";
                }
                $this->conexion = null;
            } else {
                $mensaje = "No se pudo eliminar la dependencia porque contiene uno o varios componentes";
                $type = "error";
            }
        } catch (PDOException $pe) {
            $mensaje = "No se pudo eliminar la dependencia " . $pe->getMessage();
            $type = "error";
        }
        $resultado = [
            "mensaje" => $mensaje,
            "type"    => $type
        ];
        return $resultado;
    }

    function validarComponentes($dependencia)
    {
        try {
            $sql = "select * from listado where pz_dependencia_id=?";
            $ps = $this->conexion->getConexion()->prepare($sql);
            $ps->execute(array(
                $dependencia->getDepId()
            ));
            if ($ps->rowCount() > 0) {
                return false;
            } else {
                return true;
            }
            $this->conexion = null;
        } catch (PDOException $e) {
            echo "Falló la conexión " . $e->getMessage();
        }
    }

}