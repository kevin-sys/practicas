<?php
require_once 'ConexionNomina.php';
class ConsultaDoocente extends ConexionNomina {

    public $mysqli;
    public $data;

    public function __construct() {
        $this->mysqli = parent::conectar();
        $this->data = array();
    }


    public function consultasDocentes($id){
        $consulta = sprintf("SELECT
            liquidacion.TipoAreaDesempeño,
            liquidacion.TipoCategoriaDocente,
            liquidacion.TipoExperienciaDocente,
            liquidacion.CantidadAniosExperiencia,
            liquidacion.Facultad,
            liquidacion.PuntosAreaDesempeño,
            liquidacion.BonificacionAreaDesempeño,
            liquidacion.TotalBonificacionAreaDesempeño,
            liquidacion.TipoCategoriaDocente,
            liquidacion.PuntosCategoriaDocente,
            liquidacion.RemuneracionCategoriaDocente,
            liquidacion.TotalLiquidarCategoriaDocente,
            liquidacion.PuntoGrupoInvestigacion,
            liquidacion.TotalBonificacionInvestigacion,
            liquidacion.PuntosTotalesExperienciaDocente,
            liquidacion.PuntosInvestigador,

            liquidacion.PuntosArticulosRevistasIdexadas,
            liquidacion.PuntosArticulosMediosReconocidosISBN,
            liquidacion.PuntosLibrosISBN,
            liquidacion.PuntosCapitulosLibrosISBN,
            liquidacion.PuntosModulosISBN,
            liquidacion.PuntosSoftwareDerechoAutor,
            liquidacion.PuntosPatentes,
            liquidacion.PuntosAsesorMonografias,
            liquidacion.PuntosAsesoriasPracticasOpcionGrado,
            liquidacion.FechaRegistro,

      


            

            

            docente.PrimerNombre
            FROM
            liquidacion
            INNER JOIN docente ON liquidacion.Identificacion = docente.Identificacion
            WHERE
            liquidacion.Identificacion = %s", 
            parent::comillas_inteligentes($id)
        );

        $resultado = $this->mysqli->query($consulta);

        while( $fila = $resultado->fetch_assoc() ){
            $data[] = $fila;
        }

        if (isset($data)) {
            return $data; 
        } 
    }

}