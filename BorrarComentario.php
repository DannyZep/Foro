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
     * 
     * Este archivo sirve para Borrar un comentario
     */
    include "Conexion.php";
    include "Menu.php";
    Men();
    echo "<form action='BorrarComentario.php' method='post'>
    <p>Selecciona el comentario a borrar</p>
    <select name='com'>";
    $sql = "Select titulo from comentarios;";
    $ver = $conexion->query($sql);
    while ($arra = mysqli_fetch_row($ver)) {
        $arr = $arra[0];
        echo "<option value='$arr'>$arr</option>";
    }
    echo "</select>
    <input type='submit' name='Enviar'>
    </form>";
    if (isset($_POST["Enviar"])) {
        $comentario = $_POST["com"];
        $sql = "Select tema from comentarios where titulo='$comentario'";
        $fecth = $conexion->query($sql);
        while ($arra = mysqli_fetch_row($fecth)) {
            $arr = $arra[0];
        }
        $sql = "Select n_resp from tema where nombre='$arr'";
        $fecth = $conexion->query($sql);
        $arr = 0;
        while ($arra = mysqli_fetch_row($fecth)) {
            $arr = $arra[0];
        }
        $arr--;
        $sql = "Update tema set n_resp = $arr";
        $conexion->query($sql);
        $sql = "Delete  From comentarios where titulo='$comentario';";
        $conexion->query($sql);
        $conexion->close();
    }
    ?>
</body>

</html>