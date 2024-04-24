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
     * Este archivo sirve para Comentar un tema
     */
    include "Conexion.php";
    include "Menu.php";
    Men();
    $av = $_SESSION["usu"];
    $av = $av[1];
    if ($av != "lector") {
        echo "<form action='ComentarTema.php' method='post'>
    <select name='tema'>";
        $sql = "Select nombre from tema;";
        $ver = $conexion->query($sql);
        while ($arra = mysqli_fetch_row($ver)) {
            $arr = $arra[0];
            echo "<option value='$arr'>$arr</option>";
        }
        echo "</select>
    <input type='submit' name='Enviar'>
    </form>";
        if (isset($_POST["Enviar"])) {
            echo "<form action='AltaTema.php' method='post'>
        <input type='hidden' name='tem' value='" . $_POST["tema"] . "'>
        <p>Titulo de comentario: </p>
        <input type='text' name='tit'></br>
        <p>Comentario: </p>
        <textarea name='com' rows='4' cols='50'></textarea></br>
        <input type='submit' name='Enviar>
        </form>'";
        }
        $conexion->close();
    }
    ?>
</body>

</html>