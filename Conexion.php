<?php
/**
 *  @author Daniel 
 * @access public
 * 
 * Este archivo sirve para conectar a la vase de datos "foro"
 */
$host = "localhost";
$usuario = "root";
$password = "";
$db = "foro";
$conexion = new mysqli($host, $usuario, $password, $db);

if (mysqli_connect_errno()) {
    echo "Fallo: no se pudo conectar debido al error" . mysqli_connect_error();

} else {

}
