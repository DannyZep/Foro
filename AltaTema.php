<?php
/**
 *  @author Daniel 
 * 
 * @access public
 * 
 * 
 * Este archivo php sirve para dar de alta un tema 
 * 
 */
include "Conexion.php";
$fecha = "Select curdate()";
$f = $conexion->query($fecha);
while ($arra = mysqli_fetch_row($f)) {
    $a = $arra[0];
}
$titulo = $_POST["tit"];
$comentario = $_POST["com"];
$tema = $_POST["tem"];
$sql = "insert into comentarios values(null,'$tema', '$titulo', '$comentario', '$a')";
$conexion->query($sql);
$sql = "Select n_resp from tema where nombre='$tema'";
$fecth = $conexion->query($sql);
$arr = 0;
while ($arra = mysqli_fetch_row($fecth)) {
    $arr = $arra[0];
}
$arr++;
$sql = "Update tema set n_resp = $arr";
$conexion->query($sql);
$conexion->close();
header("Location:ComentarTema.php");