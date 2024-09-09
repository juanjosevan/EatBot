<?php
if(isset($_POST["BtnIngresar"])){
    session_start();
    include("conexion.php");
    if (isset($_POST["TxtDoc"]) && isset($_POST["TxtPass"])) {
        function validar($dato){
            $dato = trim($dato);
            $dato = stripslashes($dato);
            $dato = htmlspecialchars($dato);
            return $dato;
        }
        $Doc = validar($_POST["TxtDoc"]);
        $Contraseña = validar($_POST["TxtPass"]);
        if (empty($Doc)) {
            header("Location:index.php?error=El documento es requerido");
            exit();
        } elseif (empty($Contraseña)) {
            header("Location:index.php?error=La contraseña es requerida");
            exit();
        } else {
            $Contraseña = md5($Contraseña);
            $sql = "SELECT * FROM usuarios WHERE documento='$Doc' AND clave='$Contraseña'";
            $Resultado = mysqli_query($conexion, $sql);
            if (mysqli_num_rows($Resultado) == 1) {
                while($row=mysqli_fetch_array($Resultado)){
                    $_SESSION["doc"] = $row["documento"];
                    $_SESSION["pn"] = $row["primer_nombre"];
                    $_SESSION["pa"] = $row["primer_apellido"];
                    $_SESSION["rol"] = $row["id_rol"];
                    header("location:dashboard/dashboard.php");
                }
            } else {
                header("location:index.php?error=Numero de documento o contraseña incorrectos");
                exit();
            }
        }
    } else {
        header("location:index.php");
        exit();
    }
}
?>
