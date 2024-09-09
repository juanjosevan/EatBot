<?php
include "conexion.php";

// Mostrar datos recibidos para depuración
// var_dump($_POST);

if (isset($_POST["BtnRegistrar"])) {
    // Obtener y limpiar las contraseñas
    $pass = trim($_POST["pass"]);
    $CPass = trim($_POST["CPass"]);

    // Mostrar las contraseñas para depuración (opcional)
    // echo "Contraseña 1: " . $pass . "<br>";
    // echo "Contraseña 2: " . $CPass . "<br>";

    if ($pass === $CPass) {
        $TipoDoc = $_POST["CmbTipoDoc"];
        $Doc = $_POST["TxtDoc"];
        $PrimerNombre = $_POST["TxtPrimerNombre"];
        $SegundoNombre = $_POST["TxtSegundoNombre"];
        $PrimerApellido = $_POST["TxtPrimerApellido"];
        $SegundoApellido = $_POST["TxtSegundoApellido"];
        $Correo = $_POST["TxtCorreo"];
        $Telefono = $_POST["TxtNumero"];
        $FechaNacimiento = $_POST["TxtFecha"];
        $Rol = $_POST["CmbRol"];
        $encript = md5($pass);

        $registrar = mysqli_query($conexion, "INSERT INTO `usuarios` (`documento`, `tipo_documento`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `correo`, `telefono`, `fecha_nacimiento`, `clave`, `estado`, `id_rol`) VALUES ('$Doc', '$TipoDoc', '$PrimerNombre', '$SegundoNombre', '$PrimerApellido', '$SegundoApellido', '$Correo', '$Telefono', '$FechaNacimiento', '$encript', '1', '$Rol')") or die("Error al registrar: " . mysqli_error($conexion));

        echo "<script>alert('Registro exitoso');</script>";
        echo "<script>window.location='index.php';</script>";
    } else {
        echo "<script>alert('Las contraseñas no coinciden');</script>";
        echo "<script>window.location='registrar.php';</script>";
    }
}
?>
