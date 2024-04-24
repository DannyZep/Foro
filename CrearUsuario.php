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
     * @author Daniel 
     * @access public
     * 
     * Incluir Archivos conexion y menu
     */
    include "Conexion.php";
    include "Menu.php";
    Men();
    session_start();
    ?>
    <form action="CrearUsuario.php" method="post">
        <p>Nombre de Usuario: </p><input type="text" name="nom"><br />
        <p>Contraseña: </p><input type="password" name="pass"><br />
        <p>Email: </p><input type="text" name="email"><br />
        <p>Tipo de usuario: </p>
        <?php
        /**
         *  Metodo para comprobar mediante sesion si el usuario registrado es admin y 
         * en caso afirmativo mostrarle opciones extras
         */
        if (isset($_SESSION["usu"])) {
            $av = $_SESSION["usu"];
            $av = $av[1];
        } else {
            $av = "";
        }
        if ($av == "admin") {
            echo "<select name='ti'>
            <option value='admin'>Admin</option>
            <option value='comentador'>Comentador</option>
            <option value='lector'>Lector</option>
        </select>";
        }
        ?>
        <input type="submit" name="Enviar">
    </form>
    <?php
    /**
     * Metodo para comprobar y validar los datos  introducidos y en caso
     * de que esten puestos darlos de alta en la base de datos
     * 
     */
    if (isset($_POST["Enviar"])) {
        $pass = $_POST["pass"];
        include "Conexion.php";
        if ($av == "admin") {
            $sql = "insert into usuarios values ('" . $_POST["nom"] . "', '" . $_POST["pass"] . "', '" . $_POST["email"] . "', 0, 0, null, '" . $_POST["ti"] . "');";
        } else {
            $sql = "insert into usuarios values ('" . $_POST["nom"] . "', '" . $_POST["pass"] . "', '" . $_POST["email"] . "', 0, 0, null, 'lector');";
        }
        $conexion->query($sql);
        $conexion->close();
    }
    ?>
</body>

</html>