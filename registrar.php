<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <title>Registrar</title>
    <style>
        .form-floating {
            position: relative;
        }
        #advertencia {
            display: none;
        }
    </style>
    <script>
        function validarContraseña() {
            var pass = document.getElementById("password").value;
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
        function mostrarAdvertencia() {
            document.getElementById("advertencia").style.display = "block";
        }
        function ocultarAdvertencia() {
            document.getElementById("advertencia").style.display = "none";
        }
    </script>
</head>
<body class="bg-primary py-3 py-md-5 py-xl-8">
    <section class="bg-primary py-3 py-md-5 py-xl-8">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-12 col-md-6 col-xl-5">
                    <div class="card border-0 rounded-4">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="row">
                                <div class="col-12">
                                    <form action="codigo_registrar.php" method="post" onsubmit="return validarContraseña()">
                                        <div class="row gy-3 overflow-hidden">
                                            <div class="col-12 mb-4">
                                                <h3>Registrar</h3>
                                                <p>¿Ya tienes cuenta? <a href="index.php">Volver</a></p>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <select class="form-control" name="CmbTipoDoc" id="CmbTipoDoc" required>
                                                        <option value="">Seleccionar</option>
                                                        <option value="RC">Registro Civil</option>
                                                        <option value="CC">Cédula de Ciudadanía</option>
                                                        <option value="TI">Tarjeta de Identidad</option>
                                                    </select>
                                                    <label for="CmbTipoDoc" class="form-label">Tipo de documento</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="TxtDoc" id="TxtDoc" placeholder="Documento" required>
                                                    <label for="TxtDoc" class="form-label">Documento</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="TxtPrimerNombre" id="TxtPrimerNombre" placeholder="Primer Nombre" required>
                                                    <label for="TxtPrimerNombre" class="form-label">Primer Nombre</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="TxtSegundoNombre" id="TxtSegundoNombre" placeholder="Segundo Nombre">
                                                    <label for="TxtSegundoNombre" class="form-label">Segundo Nombre</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="TxtPrimerApellido" id="TxtPrimerApellido" placeholder="Primer Apellido" required>
                                                    <label for="TxtPrimerApellido" class="form-label">Primer Apellido</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="TxtSegundoApellido" id="TxtSegundoApellido" placeholder="Segundo Apellido" required>
                                                    <label for="TxtSegundoApellido" class="form-label">Segundo Apellido</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="email" class="form-control" name="TxtCorreo" id="TxtCorreo" placeholder="Correo" required>
                                                    <label for="TxtCorreo" class="form-label">Correo</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="date" class="form-control" name="TxtFecha" id="TxtFecha" placeholder="Fecha de Nacimiento" required>
                                                    <label for="TxtFecha" class="form-label">Fecha de Nacimiento</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" name="TxtNumero" id="TxtNumero" placeholder="Celular" required>
                                                    <label for="TxtNumero" class="form-label">Celular</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <select class="form-control" name="CmbRol" id="CmbRol" required>
                                                        <option value="">Seleccionar</option>
                                                        <option value="1">Rector</option>
                                                        <option value="2">Coordinador</option>
                                                        <option value="3">Docente</option>
                                                        <option value="4">Estudiante</option>
                                                    </select>
                                                    <label for="CmbRol" class="form-label">Rol</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="password" class="form-control" name="pass" id="password" placeholder="Contraseña" required
                                                        onfocus="mostrarAdvertencia()" onblur="ocultarAdvertencia()">
                                                    <label for="password" class="form-label">Contraseña</label>
                                                </div>
                                            </div>
                                            <div id="advertencia" class="alert alert-warning">
                                                <h6>La contraseña debe tener:</h6>
                                                <p>Una mayúscula, una minúscula, al menos 3 números y no puede contener un signo "=".</p>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="password" class="form-control" name="CPass" placeholder="Confirmar Contraseña" required>
                                                    <label for="confirm-password" class="form-label">Confirmar Contraseña</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <input class="btn btn-primary btn-lg" type="submit" name="BtnRegistrar" value="Registrar">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-6">
                    <div class="d-flex justify-content-end text-bg-primary">
                        <div class="col-12 col-xl-9 text-end">
                            <center><img class="img-fluid rounded mb-4" loading="lazy" src="img/eatbot.png" width="245" height="80" alt="EatBot Logo"></center>
                            <hr class="border-primary-subtle mb-4">
                            <h2 class="h1 mb-4 text-start">EatBot</h2>
                            <p class="lead mb-5 text-start">Abordamos el problema del desperdicio de alimentos mediante la implementación de tecnologías.</p>
                            <div class="text-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-grip-horizontal" viewBox="0 0 16 16">
                                    <path d="M2 8a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
