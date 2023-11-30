<?php
require_once 'ConexionNomina.php';
class Docente extends ConexionNomina {

    public $mysqli;
    public $data;

    public function __construct() {
        $this->mysqli = parent::conectar();
        $this->data = array();
    }

    public function Docentes(){
        $resultado = $this->mysqli->query("SELECT * FROM docente");

        while( $fila = $resultado->fetch_assoc() ){
            $data[] = $fila;
        }

        if (isset($data)) {
            return $data; 
        } 
        
    }

    public function DocenteIdentificacion($id){

        $consulta = sprintf("SELECT
            *
            FROM
            docente
            WHERE
            Identificacion = %s", 
            parent::comillas_inteligentes($id)
        );

        $resultado = $this->mysqli->query($consulta);
        $fila = $resultado->fetch_array();
        return $fila;
    }

}