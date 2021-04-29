<?php

class componente{
    private $pz_referencia;
    private $pz_motherboard;
    private $pz_procesador;
    private $pz_ram;
    private $pz_video;
    private $pz_fuente;
    private $pz_dependencia_id;
    private $dependencia;

    function __construct(/*$pz_referencia,$pz_motherboard,$pz_procesador,$pz_ram,$pz_video,$pz_fuente*/){
        /*$this->pz_referencia=$pz_referencia;
        $this->pz_motherboard=$pz_motherboard;
        $this->pz_procesador=$pz_procesador;
        $this->pz_ram=$pz_ram;
        $this->pz_video=$pz_video;
        $this->pz_fuente=$pz_fuente;*/
    }

    function setPzReferencia($pz_referencia){
        $this->pz_referencia=$pz_referencia;
    }
    function setPzMotherboard($pz_motherboard){
        $this->pz_motherboard=$pz_motherboard;
    }
    function setPzProcesador($pz_procesador){
        $this->pz_procesador=$pz_procesador;
    }
    function setPzRam($pz_ram){
        $this->pz_ram=$pz_ram;
    }
    function setPzVideo($pz_video){
        $this->pz_video=$pz_video;
    }
    function setPzFuente($pz_fuente){
        $this->pz_fuente=$pz_fuente;
    }
    function setPzDependenciaId($pz_dependencia_id){
        $this->pz_dependencia_id=$pz_dependencia_id;
    }
    function setDependencia($dependencia){
        $this->dependencia=$dependencia;
    }


    
    function getPzReferencia(){
        return $this->pz_referencia;
    }
    function getPzMotherboard(){
        return $this->pz_motherboard;
    }
    function getPzProcesador(){
        return $this->pz_procesador;
    }
    function getPzRam(){
        return $this->pz_ram;
    }
    function getPzVideo(){
        return $this->pz_video;
    }
    function getPzFuente(){
        return $this->pz_fuente;
    }
    function getPzDependenciaId(){
        return $this->pz_dependencia_id;
    }
    function getDependencia(){
        return $this->dependencia;
    }
}