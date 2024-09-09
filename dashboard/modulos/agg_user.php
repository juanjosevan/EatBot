<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Añadir Usuario</title>
</head>
<body bgcolor="#ccc">
    <center>
        <div class="wrapper">
        <script>
        function validarContraseña() {
            var pass = document.getElementById("pass").value;
            var mayuscula = /[A-Z]/;
            var minuscula = /[a-z]/;
            var numeros = /[0-9]/;
            var igual = /=/;
            if (!mayuscula.test(pass)) {
                alert("La contraseña debe contener al menos una mayúscula.");
                return false;
            }
            if (!minuscula.test(pass)) {
                alert("La contraseña debe contener al menos una minúscula.");
                return false;
            }
            if (!numeros.test(pass) || (pass.match(/[0-9]/g) || []).length < 3) {
                alert("La contraseña debe contener al menos 3 números.");
                return false;
            }
            if (igual.test(pass)) {
                alert("La contraseña no puede contener el signo igual (=).");
                return false;
            }
            return true;
        }
        </script>
            <h2>Añadir Usuario</h2>
            <form class="p-3 mt-3" action="./codigo_añadir.php" method="post" onsubmit="return validarContraseña()">
                <div>
                    <select name="CmbTipoDoc" class="form-field d-flex align-items-center select" required>
                        <option value="">Tipo de Documento</option>
                        <option value="RC">Registro Civil</option>
                        <option value="CC">Cédula de Ciudadanía</option>
                        <option value="TI">Tarjeta de Identidad</option>
                    </select>
                    </div>
                    <div class="form-field d-flex align-items-center">
                        <input type="text" name="TxtDoc" placeholder="Documento" required>
                    </div>
                    <div class="form-field d-flex align-items-center">
                        <input type="text" name="TxtPrimerNombre" placeholder="Primer Nombre" required>
                    </div>
                    <div class="form-field d-flex align-items-center">
                        <input type="text" name="TxtSegundoNombre" placeholder="Segundo Nombre">
                    </div>
                    <div class="form-field d-flex align-items-center">
                        <input type="text" name="TxtPrimerApellido" placeholder="Primer Apellido" required>
                    </div>
                    <div class="form-field d-flex align-items-center">
                        <input type="text" name="TxtSegundoApellido" placeholder="Segundo Apellido">
                    </div>
                    <div class="form-field d-flex align-items-center">
                        <input type="email" name="TxtCorreo" placeholder="Correo" required>
                    </div>
                    <div class="form-field d-flex align-items-center">
                        <input type="date" name="TxtFecha" placeholder="Fecha de Nacimiento" required>
                    </div>
                    <div class="form-field d-flex align-items-center">
                        <input type="number" name="TxtNumero" placeholder="Número de Teléfono" required>
                    </div>
                    <div>
                        <select class="form-field d-flex align-items-center select" name="CmbRol" required>
                            <option value=""><center>Rol</center></option>
                            <option value="1">Rector</option>
                            <option value="2">Coordinador</option>
                            <option value="3">Docente</option>
                            <option value="4">Estudiante</option>
                        </select>
                    </div>
                    <h6 class="collapse-header">La contraseña debe tener:</h6>
                    <h6 class="collapse-header">Una mayúscula, una minúscula, al menos 3 número y no puede contener un signo "="</h6>
                    <div class="form-field d-flex align-items-center">
                        <input type="password" name="pass" id="pass" placeholder="Contraseña" required>
                    </div>
                    <div class="form-field d-flex align-items-center">
                        <input type="password" name="CPass" id="CPass" placeholder="Confirmar Contraseña" required>
                </div>
                <input type="submit" name="BtnRegistrar" value="Registrar" class="btn mt-3"><br><br>
                    <a href="index.php" id="UserName" font-size="18px">Volver</a>
            </form>
        </div>
    </center>
</body>
</html>