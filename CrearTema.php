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
     * Este archivo sirve para crear temas 
     */
    include "Conexion.php";
    include "Menu.php";
    Men();
    session_start();
    echo "
    <form action='CrearTema.php' method='post'>
        <p>Codigo: </p><input type='number' name='cod'><br/>
        <p>Nombre: </p><input type='text' name='nom'><br/>
        <p>Fecha Creacion: </p><input type='date' name='fc'><br/>
        <p>Tema: </p><input type='text' name='te'><br/>
        <p>Titulo Comentario: </p><input type='text' name='tc'><br/>
        <input type='submit' name='Enviar'>
    </form>";

    if (isset($_POST["Enviar"])) {
        if (isset($_SESSION["usu"])) {
            $av = $_SESSION["usu"];
            $av = $av[0];
            $sql = "insert into tema values (" . $_POST["cod"] . ", '" . $_POST["nom"] . "', 0, '" . $_POST["fc"] . "', 0 , '" . $_POST["te"] . "', '$av', '" . $_POST["tc"] . "');";
        }

        $conexion->query($sql);
        $conexion->close();
    }
    ?>
</body>

</html>