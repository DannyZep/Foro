<?php
/**
 *  @author Daniel 
 * @access public
 * 
 * Este archivo sirve para cerrar un tema
 */
include "Menu.php";
include "Conexion.php";
Men();
session_start();
if (isset($_SESSION["usu"])) {
    $av = $_SESSION["usu"];
    echo "<form action='CerrarTema.php' method='post'>";
    $sql = "Select nombre from tema";
    $ver = $conexion->query($sql);
    echo "<select name='tema'>";
    while ($arra = mysqli_fetch_row($ver)) {
        $arr = $arra[0];
        echo "<option value='$arr'>$arr</option>";
    }
    echo "</select>
    <input type='submit' name='Enviar'>
        </form>";
    if (isset($_POST["Enviar"])) {
        $tema=$_POST["tema"];
        $fecha="Select curdate()";
        $f=$conexion->query($fecha);
        while($arra=mysqli_fetch_row($f)){
            $a=$arra[0];
        }
        $consulta="Select creador from tema where nombre='$arr'";
        $creador=$conexion->query($consulta);
        if($av[1]=="admin" ||$av[0]==$creador){
            echo "Tema cerrado con exito";
            $sql="update tema set fecha_cierre ='$a'";
            $conexion->query($sql);
        }
        $conexion->close();
    }
}