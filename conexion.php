<?php
  fuction conexion(){
      $host = "localhost";
      $user = "pablo";
      $pass = "1234";
      $db = "prueba_php";
      $conexion = new mysqli($host,$user,$pass,$db);
      return $conexion;
    }
?>
