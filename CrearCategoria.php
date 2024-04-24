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
     * Este archivo sirve para Crear una Categoria
     */
    include "Conexion.php";
    include "Menu.php";
    Men();
    if (isset($_SESSION["usu"])) {
        $av = $_SESSION["usu"];
        $av = $av[1];
        if ($av == "admin" || $av == "creador") {
            echo "
    <form action='CrearCategoria.php' method='post'>
        <p>Codigo: </p><input type='number' name='cod'><br/>
        <p>Nombre: </p><input type='text' name='nom'><br/>
        <p>Descripcion: </p><input type='text' name='desc'><br/>
        <p>Fecha Creacion: </p><input type='date' name='fc'><br/>
        <input type='submit' name='Enviar'>
    </form>";

            if (isset($_POST["Enviar"])) {
                $sql = "insert into categorias values (" . $_POST["cod"] . ", '" . $_POST["nom"] . "', '" . $_POST["desc"] . "', '" . $_POST["fc"] . "');";
                $conexion->query($sql);
                $conexion->close();
            }
        }
    }
    ?>
</body>

</html>