<?php
include ("../conexion.php");
if (isset($_POST["btn_eliminar"])) {
    $doc_eliminar = $_POST["dato_eliminar"];
    $eliminar = mysqli_query($conexion, "DELETE FROM usuarios WHERE documento = '$doc_eliminar'") or die(mysqli_error($conexion));
    echo "<script>alert('Usuario eliminado exitosamente');</script>";
    echo "<script>window.location='dashboard.php?mod=Gestion';</script>";
}
if (isset($_POST["btn_actualizar"])) {
    $doc = $_POST["documento"];
    $p_n = $_POST["primer_nombre"];
    $s_n = $_POST["segundo_nombre"];
    $p_a = $_POST["primer_apellido"];
    $s_a = $_POST["segundo_apellido"];
    $correo = $_POST["correo"];
    $f_n = $_POST["fecha_nacimiento"];
    $tel = $_POST["telefono"];
    $modificar = mysqli_query($conexion,"UPDATE `usuarios` SET `primer_nombre` = '$p_n', `segundo_nombre` = '$s_n', `primer_apellido` = '$p_a', `segundo_apellido` = '$s_a', `correo` = '$correo', `telefono` = '$tel', `fecha_nacimiento` = '$f_n' WHERE `usuarios`.`documento` = '$doc'") or die (mysqli_error($conexion));
    echo "<script>alert('Actualización exitosa');</script>";
    echo "<script>window.location='dashboard.php?mod=Gestion';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Gestión de usuarios</title>
    <style>
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #4B71DD;
            color: white;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>
<body>
    <h2>Gestión De Usuarios</h2>
    <form action="dashboard.php?mod=Gestion" method="post">
        <input type="text" name="txt_buscar" placeholder="Nombre"><br>
        <input type="submit" value="Buscar" name="btn_buscar">
    </form>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Documento</th>
                <th>Primer Nombre</th>
                <th>Segundo Nombre</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Fecha de Nacimiento</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_POST['btn_buscar']) || isset($_POST['btn_modi'])) {
                $dato = '';
                if (isset($_POST['btn_buscar'])) {
                    $dato = $_POST['txt_buscar'];
                    $query = "SELECT * FROM usuarios WHERE primer_nombre LIKE '%$dato%'";
                } elseif (isset($_POST['btn_modi'])) {
                    $dato_modi = $_POST['dato_modificar'];
                    $query = "SELECT * FROM usuarios WHERE documento = '$dato_modi'";
                }
                $read = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
                while ($arreglo = mysqli_fetch_array($read)) {
            ?>
            <tr>
                <td><?php echo $arreglo['documento']; ?></td>
                <td><?php echo $arreglo['primer_nombre']; ?></td>
                <td><?php echo $arreglo['segundo_nombre']; ?></td>
                <td><?php echo $arreglo['primer_apellido']; ?></td>
                <td><?php echo $arreglo['segundo_apellido']; ?></td>
                <td><?php echo $arreglo['correo']; ?></td>
                <td><?php echo $arreglo['telefono']; ?></td>
                <td><?php echo $arreglo['fecha_nacimiento']; ?></td>
                <td>
                    <form action="dashboard.php?mod=Gestion#modi" method="post">
                        <input type="text" name="dato_modificar" value="<?php echo $arreglo['documento']; ?>" readonly hidden>
                        <button type="submit" name="btn_modi" class="btn btn-warning"><i class="fas fa-pen-square"></i></button>
                    </form>
                </td>
                <td>
                    <form action="dashboard.php?mod=Gestion" method="post">
                        <input type="hidden" name="dato_eliminar" value="<?php echo $arreglo['documento']; ?>">
                        <button type="submit" name="btn_eliminar" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
    <a href="" id="modi"></a>
    <?php
    if (isset($_POST['btn_modi'])) {
        $dato_modi = $_POST['dato_modificar'];
        $consulta_modi = mysqli_query($conexion, "SELECT * FROM usuarios WHERE documento = '$dato_modi'") or die(mysqli_error($conexion));
        if ($arreglo_modi = mysqli_fetch_array($consulta_modi)) {
    ?>
    <h2>Formulario para modificar usuario</h2>
    <form class="p-3 mt-3" action="dashboard.php?mod=Gestion" method="post" onsubmit="return validarContraseña()">
        <input type="hidden" name="documento" value="<?php echo $arreglo_modi['documento']; ?>">
        <div>
            <select name="CmbTipoDoc" class="form-field d-flex align-items-center select" required>
                <option value="">Tipo de Documento</option>
                <option value="RC" <?php echo ($arreglo_modi['tipo_documento'] == 'RC') ? 'selected' : ''; ?>>Registro Civil</option>
                <option value="CC" <?php echo ($arreglo_modi['tipo_documento'] == 'CC') ? 'selected' : ''; ?>>Cédula de Ciudadanía</option>
                <option value="TI" <?php echo ($arreglo_modi['tipo_documento'] == 'TI') ? 'selected' : ''; ?>>Tarjeta de Identidad</option>
            </select>
        </div><br>
        <div class="form-field d-flex align-items-center">
            <input type="text" name="primer_nombre" placeholder="Primer Nombre" required value="<?php echo $arreglo_modi['primer_nombre']; ?>">
        </div><br>
        <div class="form-field d-flex align-items-center">
            <input type="text" name="segundo_nombre" placeholder="Segundo Nombre" value="<?php echo $arreglo_modi['segundo_nombre']; ?>">
        </div><br>
        <div class="form-field d-flex align-items-center">
            <input type="text" name="primer_apellido" placeholder="Primer Apellido" required value="<?php echo $arreglo_modi['primer_apellido']; ?>">
        </div><br>
        <div class="form-field d-flex align-items-center">
            <input type="text" name="segundo_apellido" placeholder="Segundo Apellido" value="<?php echo $arreglo_modi['segundo_apellido']; ?>">
        </div><br>
        <div class="form-field d-flex align-items-center">
            <input type="email" name="correo" placeholder="Correo" required value="<?php echo $arreglo_modi['correo']; ?>">
        </div><br>
        <div class="form-field d-flex align-items-center">
            <input type="date" name="fecha_nacimiento" placeholder="Fecha de Nacimiento" required value="<?php echo $arreglo_modi['fecha_nacimiento']; ?>">
        </div><br>
        <div class="form-field d-flex align-items-center">
            <input type="number" name="telefono" placeholder="Número de Teléfono" required value="<?php echo $arreglo_modi['telefono']; ?>">
        </div><br>
        <input type="submit" name="btn_actualizar" value="Modificar" class="btn mt-3"><br><br>
    </form>
    <?php
        }
    }
    ?>
</body>
</html>