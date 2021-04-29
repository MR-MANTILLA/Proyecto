<?php
//include_once '../modelo/conexion.php';
//include_once '../modelo/componente.php';

class controladorComponentes{
    private $conexion;

    function __construct(){                                             //Establece una conexion con la base de datos
        $this->conexion=new conexion();
        $this->conexion->getConexion()->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }

    /* Listar los datos de los componentes (Read) */

    function listar(){
        try{
            $sql="select * from listado inner join dependencia on listado.pz_dependencia_id = dependencia.dep_id";                               //guarda la seleccion de la tabla de la base de datos
            $ps=$this->conexion->getConexion()->prepare($sql);          //
            $ps->execute(NULL);
            $resultado=[];
            while($row=$ps->fetch(PDO::FETCH_OBJ)){                     //permite la impresion de tipo registro
                $dependencia=new dependencia();
                $dependencia->setDepId($row->dep_id);
                $dependencia->setDepNombre($row->dep_nombre);

                $componente=new componente();
                $componente->setPzReferencia($row->pz_referencia);
                $componente->setPzMotherboard($row->pz_motherboard);
                $componente->setPzProcesador($row->pz_procesador);
                $componente->setPzRam($row->pz_ram);
                $componente->setPzVideo($row->pz_video);
                $componente->setPzFuente($row->pz_fuente);
                $componente->setDependencia($dependencia);
                array_push($resultado,$componente);                     //Inserta uno o más elementos al final de un array
            }
            $this->conexion=null;                                       //cerrar la conexion
        }catch(PDOException $e){
            echo "Falló la conexion" . $e->getMessage();
        }
        return $resultado;
    }

    function crear($componente){
        try{
            $sql="insert into listado values (?,?,?,?,?,?,?)";
            $ps=$this->conexion->getConexion()->prepare($sql);
            $ps->execute(array(
                $componente->getPzReferencia(),
                $componente->getPzMotherboard(),
                $componente->getPzProcesador(),
                $componente->getPzRam(),
                $componente->getPzVideo(),
                $componente->getPzFuente(),
                $componente->getPzDependenciaId()
            ));

            if($ps->rowCount()>0){
                $mensaje="Se creó el registro correctamente";
            }else{
                $mensaje="No se pudo registrar";
            }
            $this->conexion=null;

        }catch(PDOException $e){
            $mensaje="Error al crear el regitro de componentes" . $e->getMessage();
        }
        
        return $mensaje;
    }

    function buscar($pz_referencia){
        try{
            $sql="select * from listado where pz_referencia = ?";
            $ps=$this->conexion->getConexion()->prepare($sql);
            $ps->execute(array(
                $pz_referencia
            ));
            $resultado=[];
            while($row=$ps->fetch(PDO::FETCH_OBJ)){                     //permite la impresion de tipo registro
                $componente=new componente();
                $componente->setPzReferencia($row->pz_referencia);
                $componente->setPzMotherboard($row->pz_motherboard);
                $componente->setPzProcesador($row->pz_procesador);
                $componente->setPzRam($row->pz_ram);
                $componente->setPzVideo($row->pz_video);
                $componente->setPzFuente($row->pz_fuente);
                $componente->setPzDependenciaId($row->pz_dependencia_id);
                array_push($resultado,$componente);                     //Inserta uno o más elementos al final de un array
            }
            $this->conexion=null;
        }catch(PDOException $e){
            echo "Fallo la conexion " . $e->getMessage();
        }
        return $resultado;
    }

    function actualizar($componente){
        $sql="update listado set pz_motherboard=?,pz_procesador=?,pz_ram=?,pz_video=?,pz_fuente=?,pz_dependencia_id=? where pz_referencia=?";
        $ps=$this->conexion->getConexion()->prepare($sql);
        $ps->execute(array(
            $componente->getPzMotherboard(),
            $componente->getPzProcesador(),
            $componente->getPzRam(),
            $componente->getPzVideo(),
            $componente->getPzFuente(),
            $componente->getPzDependenciaId(),
            $componente->getPzReferencia()
        ));

        if($ps->rowCount()>0){
            $mensaje="Se actualizó el registro correctamente";
        }else{
            $mensaje="No se pudo actualizar";
        }
        $resultado=(
            $mensaje
        );
        $this->conexion=null;
        return $resultado;
    }

    function eliminar($componente){
            $sql="delete from listado where pz_referencia=?";
            $ps=$this->conexion->getConexion()->prepare($sql);
            $ps->execute(array(
                $componente->getPzReferencia()
            ));
            if($ps->rowCount()>0){
                $mensaje="Se eliminaron los datos correctamente";
            }else{
                $mensaje="No se pudo eliminar";
            }
            $this->conexion=null;

            $resultado=(
                $mensaje
            );
            $this->conexion=null;
            return $resultado;
    }

}
