<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/logins/login-9/assets/css/login-9.css">
    <title>Registrar</title>
</head>
<body class="bg-primary py-3 py-md-5 py-xl-8">
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
<section class="bg-primary py-3 py-md-5 py-xl-8">
    <div class="container">
        <div class="row d-flex justify-content-between">
            <!-- Columna para el formulario a la izquierda -->
            <div class="col-12 col-md-6 col-xl-5">
                <div class="card border-0 rounded-4">
                    <div class="card-body p-3 p-md-4 p-xl-5">
                        <div class="row">
                            <div class="col-12">
                                <form action="registrar.php" method="post" onsubmit="return validarContraseña()">
                                    <div class="row gy-3 overflow-hidden">
                                        <!-- Campos del formulario -->
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <select class="form-control" name="CmbTipoDoc" required>
                                                    <option value="">Seleccionar</option>
                                                    <option value="RC">Registro Civil</option>
                                                    <option value="CC">Cédula de Ciudadanía</option>
                                                    <option value="TI">Tarjeta de Identidad</option> 
                                                </select>
                                                <label for="email" class="form-label">Tipo de documento</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="TxtDoc" placeholder="Documento" required>
                                                <label for="text" class="form-label">Documento</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control" name="TxtPass" id="pwd" placeholder="Password" required>
                                                <label for="password" class="form-label">Contraseña</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <input class="btn btn-primary btn-lg" type="submit" name="BtnIngresar" value="Ingresar" class="btn mt-3"><br><br>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Columna para el contenido de EatBot a la derecha -->
            <div class="col-12 col-md-6 col-xl-6">
                <div class="d-flex justify-content-end text-bg-primary">
                    <div class="col-12 col-xl-9 text-end">
                        <center><img class="img-fluid rounded mb-4" loading="lazy" src="img/eatbot.png" width="245" height="80" alt="EatBot Logo"></center>
                        <hr class="border-primary-subtle mb-4">
                        <h2 class="h1 mb-4">EatBot</h2>
                        <p class="lead mb-5">Abordamos el problema del desperdicio de alimentos mediante la implementación de tecnologías.</p>
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


