<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    /**
     *  @author Daniel 
     * @access public
     * 
     * Este archivo sirve para consultar todos los usuarios
     * y seleccionar uno para darse de alta para trabajar en el
     * resto de archivos 
     */
    include "Menu.php";
    include "Conexion.php";
    Men();
    session_start();
    $sql = " Select `usuario` from usuarios";
    $ver = $conexion->query($sql);
    echo "<form action='SelectUser.php' method='post'>
        <select name='usu' >";
    while ($arra = mysqli_fetch_row($ver)) {
        $arr = $arra[0];
        echo "<option value='$arr'>$arr</option>";
    }

    echo " </select>
    <input type='text' name='pass'>
    <input type='submit' name='Enviar'>
    </form>";
    if (isset($_POST["Enviar"])) {
        $usu = $_POST["usu"];
        $pass = $_POST["pass"];
        $sql = "Select `contraseña` from usuarios where `usuario` = '$usu';";
        $ver = $conexion->query($sql);
        while ($arra = mysqli_fetch_row($ver)) {
            $passbd = $arra[0];
        }
        if ($pass == $passbd) {
            $arru = array();
            echo "Usuario $usu logeado con exito";
            array_push($arru, $usu);
            $sql = "Select `avatar` from usuarios where `usuario` = '$usu';";
            $ver = $conexion->query($sql);
            while ($arra = mysqli_fetch_row($ver)) {
                $av = $arra[0];
            }
            array_push($arru, $av);
            $_SESSION["usu"] = $arru;
        } else {
            echo "error";
        }
    }
    $conexion->close();
    ?>
</body>

</html>