<?php
Class ConexionNomina {

   public function conectar(){
      $mysqli = new mysqli('localhost','root','','bdnomina');

      if ($mysqli->connect_errno)
         header('Location: /');

      $mysqli->set_charset('utf8');

      return $mysqli;
   }


   public static function ruta() {
      return "http://localhost/Informe/";
      
   }

   public function comillas_inteligentes($valor) {
      // Retirar las barras
      if (get_magic_quotes_gpc()) {
         $valor = stripslashes($valor);
      }
      // Colocar comillas si no es entero
      if (!is_numeric($valor)) {
         $valor = "'" . $this->mysqli->real_escape_string($valor) . "'";
      }
      return $valor;
   }

}