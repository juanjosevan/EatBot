<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['doc'])) {
    header("Location: index.php");
    exit();
}
if (!isset($_SESSION['pn']) || !isset($_SESSION['pa'])) {
    echo "Error: Las variables de sesión no están definidas.";
    exit();
}

include("../conexion.php");

// Manejo de la acción del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete_id'])) {
        // Eliminar menú
        $delete_id = intval($_POST['delete_id']);
        mysqli_query($conexion, "DELETE FROM menus WHERE id = $delete_id");
    } elseif (isset($_POST['menu_id'])) {
        // Editar menú
        $id = intval($_POST['menu_id']);
        $ingredientes = mysqli_real_escape_string($conexion, $_POST['ingredientes']);
        $peso_promedio = mysqli_real_escape_string($conexion, $_POST['peso_promedio']);
        $ultima_entrega = mysqli_real_escape_string($conexion, $_POST['ultima_entrega']);
        if ($id) {
            mysqli_query($conexion, "UPDATE menus SET ingredientes='$ingredientes', peso_promedio='$peso_promedio', ultima_entrega='$ultima_entrega' WHERE id = $id");
        } else {
            // Añadir nuevo menú
            mysqli_query($conexion, "INSERT INTO menus (ingredientes, peso_promedio, ultima_entrega) VALUES ('$ingredientes', '$peso_promedio', '$ultima_entrega')");
        }
    }
    exit(); // Salir después de procesar el formulario
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>EatBot - Gestión de Menús</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        .details-row {
            display: none;
        }
        .details-row.show {
            display: table-row;
        }
        .toggle-details {
            cursor: pointer;
        }
    </style>
</head>
<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <!-- (Tu código de la barra lateral aquí) -->
        <!-- End of Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                <!-- (Tu código de la barra superior aquí) -->
                <!-- End of Topbar -->
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Gestión de Menús</h1>
                    <p class="mb-4">Aquí puedes gestionar los menús, añadir nuevos, modificar o eliminar existentes.</p>
                    <!-- Formulario para añadir/editar menú -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Añadir/Editar Menú</h6>
                        </div>
                        <div class="card-body">
                            <form id="menu_form" method="post">
                                <input type="hidden" id="menu_id" name="menu_id">
                                <div class="form-group">
                                    <label for="ingredientes">Ingredientes</label>
                                    <input type="text" class="form-control" id="ingredientes" name="ingredientes" required>
                                </div>
                                <div class="form-group">
                                    <label for="peso_promedio">Peso Promedio</label>
                                    <input type="text" class="form-control" id="peso_promedio" name="peso_promedio" required>
                                </div>
                                <div class="form-group">
                                    <label for="ultima_entrega">Última Entrega</label>
                                    <input type="date" class="form-control" id="ultima_entrega" name="ultima_entrega" required>
                                </div>
                                <button type="submit" id="add_menu_btn" class="btn btn-primary">Añadir Menú</button>
                                <button type="submit" id="edit_menu_btn" class="btn btn-warning" style="display: none;">Actualizar Menú</button>
                            </form>
                        </div>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Listado de Menús</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Ingredientes</th>
                                            <th>Peso Promedio</th>
                                            <th>Última Entrega</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = mysqli_query($conexion, "SELECT * FROM menus");
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr class='toggle-details' data-id='{$row['id']}'>";
                                            echo "<td>{$row['id']}</td>";
                                            echo "<td>{$row['ingredientes']}</td>";
                                            echo "<td>{$row['peso_promedio']}</td>";
                                            echo "<td>{$row['ultima_entrega']}</td>";
                                            echo "<td>
                                                    <button class='btn btn-warning btn-sm edit-btn' data-id='{$row['id']}' data-ingredientes='{$row['ingredientes']}' data-peso='{$row['peso_promedio']}' data-entrega='{$row['ultima_entrega']}'>Editar</button>
                                                    <form style='display: inline;' method='post' class='delete-form'>
                                                        <input type='hidden' name='delete_id' value='{$row['id']}'>
                                                        <button type='submit' class='btn btn-danger btn-sm'>Eliminar</button>
                                                    </form>
                                                  </td>";
                                            echo "</tr>";
                                            echo "<tr class='details-row' id='details-{$row['id']}'>
                                                    <td colspan='5'>
                                                        <strong>Ingredientes:</strong> {$row['ingredientes']}<br>
                                                        <strong>Peso Promedio:</strong> {$row['peso_promedio']}<br>
                                                        <strong>Última Entrega:</strong> {$row['ultima_entrega']}
                                                    </td>
                                                  </tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; EatBot 2024</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Listo para salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="index.php">Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('menu_form');
        const addMenuBtn = document.getElementById('add_menu_btn');
        const editMenuBtn = document.getElementById('edit_menu_btn');

        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const ingredientes = this.getAttribute('data-ingredientes');
                const pesoPromedio = this.getAttribute('data-peso');
                const ultimaEntrega = this.getAttribute('data-entrega');

                document.getElementById('menu_id').value = id;
                document.getElementById('ingredientes').value = ingredientes;
                document.getElementById('peso_promedio').value = pesoPromedio;
                document.getElementById('ultima_entrega').value = ultimaEntrega;

                addMenuBtn.style.display = 'none';
                editMenuBtn.style.display = 'inline-block';
            });
        });

        form.addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(form);
            fetch('', {
                method: 'POST',
                body: formData
            }).then(response => response.text()).then(result => {
                location.reload();
            });
        });

        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                if (confirm('¿Estás seguro de que quieres eliminar este menú?')) {
                    fetch('', {
                        method: 'POST',
                        body: new FormData(this)
                    }).then(response => response.text()).then(result => {
                        location.reload();
                    });
                }
            });
        });

        document.querySelectorAll('tr.toggle-details').forEach(row => {
            row.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const detailsRow = document.getElementById(`details-${id}`);
                detailsRow.classList.toggle('show');
            });
        });
    });
    </script>
</body>
</html>
