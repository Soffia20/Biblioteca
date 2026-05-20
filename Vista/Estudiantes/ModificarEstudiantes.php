<?php require_once "core/auth.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Modificar</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="icon" href="img/favicon.png" type="image/png">

    <style>
        /* Imagen */
            #preview {
                max-width: 300px;
                max-height: 300px;
                display: block;
                margin: 10px auto;
            }

            .input-imagen {
                width: 100%;
                padding: 10px 12px;
                border: 1px solid #ccc;
                border-radius: 8px;
                font-size: 1rem;
                margin-top: 5px;
            }

            .contenedor-imagen {
                text-align: center;
                margin-top: 15px;
            }

            .contenedor-imagen img {
                max-width: 300px;
                max-height: 300px;
                border-radius: 8px;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
                display: block;
                margin: 0 auto;
            }

            .controls {
                display: flex;
                justify-content: center;
                gap: 20px;
                margin-top: 10px;
            }

            .btn-eliminar-imagen {
                background-color: #e74c3c;
                color: white;
                border: none;
                padding: 8px 16px;
                border-radius: 6px;
                cursor: pointer;
                font-size: 0.9rem;
                transition: background-color 0.3s;
            }

            .btn-eliminar-imagen:hover {
                background-color: #c0392b;
            }

        /* Validaciones */
            input.v_correcto {
                font-size: 14px;
                margin-top: 5px;
                display: block;
            }
            .v_correcto {
                background-color:rgb(232, 255, 231);
            }
            input.v_error {
                font-size: 14px;
                margin-top: 5px;
                display: block;
            }
        /* END */

        /* Form */
            h2 {
                margin-top: 40px;
                margin-left: 100px;
                color: #333;
            }

            .formulario {
                /* background-color: #ffffff; */
                /* padding: 30px 40px; */
                margin-top: 20px;
                /* border-radius: 12px; */
                /* box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); */
                width: 100%;
                max-width: 700px;
                margin-left: 200px;
            }

            label {
                display: block;
                margin-top: 15px;
                margin-bottom: 5px;
                font-weight: 500;
                color: #555;
            }

            input[type="text"],
            input[type="date"],
            select {
                width: 100%;
                padding: 10px 12px;
                border: 1px solid #ccc;
                border-radius: 8px;
                font-size: 1rem;
            }

            .contenedor-botones {
                display: flex;
                justify-content: center;
                gap: 20px;
                margin-top: 10px;
            }


        /* Botón Guardar */
            .boton {
                margin-top: 20px;
                width: 20%;
                padding: 10px;
                background-color: #00c6c9ff;
                color: white;
                font-size: 1rem;
                border: none;
                border-radius: 8px;
                cursor: pointer;
                transition: background-color 0.3s ease;
                height: 50px;
            }

        /* Botón Regresar */
            .botonRegresar {
                width: 20%;
                padding: 10px;
                background-color: #00c6c9ff;
                color: white;
                font-size: 1rem;
                border: none;
                border-radius: 8px;
                cursor: pointer;
                transition: background-color 0.3s ease;
                text-align: center;
                text-decoration: none;
            }

            .botonRegresar:focus,
            .botonRegresar:active,
            .botonRegresar:hover,
            .boton:focus,
            .boton:active,
            .boton:hover {
                text-decoration: none;
                background-color: #00c6c9ff;
                outline: none;
            }
            button:hover {
                background-color: #0056b3;
            }

            a.botonRegresar {
                display: inline-block;
                margin-top: 20px;
                text-decoration: none;
                color: #ffffff;
                transition: color 0.3s;
            }

            a.botonRegresar:hover {
                color: #ffffff;
            }
    </style>
</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?c=inicio&a=index">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Biblioteca</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php?c=inicio&a=index">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Inicio</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Datos</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Datos:</h6>
                        <a class="collapse-item" href="index.php?c=Estudiantes&a=index">Estudiantes</a>
                        <a class="collapse-item" href="index.php?c=Carreras&a=index">Carreras</a>
                        <a class="collapse-item" href="index.php?c=Servicios&a=index">Servicios</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" href="index.php?c=entrada_salida&a=index">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 -960 960 960"
                        width="16px" height="16px"
                        class="nav-icon-svg"
                        style="margin-right: 10px; fill: currentColor;">
                        <path d="M160-80q-33 0-56.5-23.5T80-160v-440q0-33 23.5-56.5T160-680h200v-120q0-33 23.5-56.5T440-880h80q33 0 56.5 23.5T600-800v120h200q33 0 56.5 23.5T880-600v440q0 33-23.5 56.5T800-80H160Zm0-80h640v-440H600q0 33-23.5 56.5T520-520h-80q-33 0-56.5-23.5T360-600H160v440Zm80-80h240v-18q0-17-9.5-31.5T444-312q-20-9-40.5-13.5T360-330q-23 0-43.5 4.5T276-312q-17 8-26.5 22.5T240-258v18Zm320-60h160v-60H560v60Zm-200-60q25 0 42.5-17.5T420-420q0-25-17.5-42.5T360-480q-25 0-42.5 17.5T300-420q0 25 17.5 42.5T360-360Zm200-60h160v-60H560v60ZM440-600h80v-200h-80v200Zm40 220Z"/>
                    </svg>
                    <span>Visitas</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" href="index.php?c=Libros&a=index">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 -960 960 960"
                        width="16px" height="16px"
                        class="nav-icon-svg"
                        style="margin-right: 10px; fill: currentColor;">
                        <path d="M240-80q-50 0-85-35t-35-85v-560q0-50 35-85t85-35h440v640H240q-17 0-28.5 11.5T200-200q0 17 11.5 28.5T240-160h520v-640h80v720H240Zm120-240h240v-480H360v480Zm-80 0v-480h-40q-17 0-28.5 11.5T200-760v447q10-3 19.5-5t20.5-2h40Zm-80-480v487-487Z"/>
                    </svg>
                    <span>Libros</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" href="index.php?c=Prestamos&a=index">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 -960 960 960"
                        width="16px" height="16px"
                        class="nav-icon-svg"
                        style="margin-right: 10px; fill: currentColor;">
                        <path d="M200-80q-33 0-56.5-23.5T120-160v-560q0-33 23.5-56.5T200-800h40v-80h80v80h320v-80h80v80h40q33 0 56.5 23.5T840-720v560q0 33-23.5 56.5T760-80H200Zm0-80h560v-400H200v400Zm0-480h560v-80H200v80Zm0 0v-80 80Zm280 240q-17 0-28.5-11.5T440-440q0-17 11.5-28.5T480-480q17 0 28.5 11.5T520-440q0 17-11.5 28.5T480-400Zm-160 0q-17 0-28.5-11.5T280-440q0-17 11.5-28.5T320-480q17 0 28.5 11.5T360-440q0 17-11.5 28.5T320-400Zm320 0q-17 0-28.5-11.5T600-440q0-17 11.5-28.5T640-480q17 0 28.5 11.5T680-440q0 17-11.5 28.5T640-400ZM480-240q-17 0-28.5-11.5T440-280q0-17 11.5-28.5T480-320q17 0 28.5 11.5T520-280q0 17-11.5 28.5T480-240Zm-160 0q-17 0-28.5-11.5T280-280q0-17 11.5-28.5T320-320q17 0 28.5 11.5T360-280q0 17-11.5 28.5T320-240Zm320 0q-17 0-28.5-11.5T600-280q0-17 11.5-28.5T640-320q17 0 28.5 11.5T680-280q0 17-11.5 28.5T640-240Z"/>
                    </svg>
                    <span>Préstamos</span>
                </a>
            </li>


            <!-- Divider -->
            <!-- <hr class="sidebar-divider"> -->

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" href="index.php?c=Usuarios&a=index">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 -960 960 960"
                        width="16px" height="16px"
                        class="nav-icon-svg"
                        style="margin-right: 10px; fill: currentColor;">
                        <path d="M185-80q-17 0-29.5-12.5T143-122v-105q0-90 56-159t144-88q-40 28-62 70.5T259-312v190q0 11 3 22t10 20h-87Zm147 0q-17 0-29.5-12.5T290-122v-190q0-70 49.5-119T459-480h189q70 0 119 49t49 119v64q0 70-49 119T648-80H332Zm148-484q-66 0-112-46t-46-112q0-66 46-112t112-46q66 0 112 46t46 112q0 66-46 112t-112 46Z"/>
                    </svg>
                    
                    <span>Usuarios</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">UTNC </span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                     <h2><?php echo $data["titulo"]; ?></h2>

                    <form class="formulario" action="index.php?c=estudiantes&a=actualizar" enctype="multipart/form-data" method="POST" id="modificarEst" name="modificarEst" autocomplete="off">
                        <input type="hidden" id="id" name="id" value="<?php echo $data["id"]; ?>" />

                        <label for="matricula">Matrícula</label>
                        <input type="text" id="matricula" name="matricula" required minlength="8" maxlength="20" numeros="true" noSpaces="true" integer="true" value="<?php echo $data["estudiantes"]["Matricula"]?>" />

                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" required minlength="10" maxlength="50" letters="true" value="<?php echo $data["estudiantes"]["Nombre"]?>" />

                        <label for="fecha">Grado</label>
                        <input type="text" id="grado" name="grado" required minlength="1" maxlength="2" numeros="true" integer="true" noSpaces="true" value=" <?php echo $data["estudiantes"]["Grado"] ?>"/>

                        <label for="seccion">Sección</label>
                        <input type="text" id="seccion" name="seccion" required minlength="1" maxlength="2" letters="true" noSpaces="true" value=" <?php echo $data["estudiantes"]["Seccion"] ?>"/>

                        <label for="genero">Género</label>
                        <select id="genero" name="genero" required>
                            <option value="Femenino" <?php if($data["estudiantes"]["Genero"] == "Femenino") echo "selected"; ?>>Femenino</option>
                            <option value="Masculino" <?php if($data["estudiantes"]["Genero"] == "Masculino") echo "selected"; ?>>Masculino</option>
                        </select>

                        <label for="carrera">Carrera</label>
                        <select id="carrera" name="carrera" required>
                            <?php foreach ($data["carreras"] as $carrera): ?>
                                <option value="<?php echo $carrera['Id_carrera']; ?>"
                                    <?php if($data["estudiantes"]["Carrera"] == $carrera['Id_carrera']) echo "selected"; ?>>
                                    <?php echo $carrera['Nombre']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <label for="contacto">Contacto</label>
                        <input type="text" id="contacto" name="contacto" required minlength="10" maxlength="50" alphanumeric="true" noSpaces="true" value="<?php echo $data["estudiantes"]["Contacto"] ?>"/>

                        <!-- <label for="imagen">Imagen</label>
                        <input type="hidden" name="imagen_actual" value="<?php echo $data["estudiantes"]["Imagen"]; ?>">

                        <input class="input-imagen" type="file" accept="image/*" id="imageInput" name="imagen">

                        
                        <?php if (!empty($data["estudiantes"]["Imagen"])): ?>
                            <div class="contenedor-imagen">
                                <img src="<?php echo $data["estudiantes"]["Imagen"]; ?>" id="preview" alt="Imagen actual">
                            </div>
                        <?php endif; ?> -->

                        <!-- Previsualización nueva -->
                        <div class="contenedor-imagen">
                            <img id="preview" src="#" alt="Previsualización" style="display: none;">
                        </div>

                        <div class="controls" style="display: none;">
                            <button class="btn-eliminar-imagen" type="button" onclick="clearImage()">Eliminar</button>
                        </div>


                        <div class="contenedor-botones">
                            <button class="boton" id="actualizar" name="actualizar" type="submit">Actualizar</button>
                            <a href="index.php?c=Estudiantes&a=index" class="botonRegresar">Regresar</a>
                        </div>

                    </form>

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Seguro que quieres salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Salir" a continuación si está listo para finalizar su sesión actual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="index.php?c=InicioSesion&a=cerrar">Salir</a>
                </div>
            </div>
        </div>
    </div>

    <!-- imagen
    <script>
        const input = document.getElementById('imageInput');
        const preview = document.getElementById('preview');
        const controls = document.querySelector('.controls');
        let rotation = 0;

        input.addEventListener('change', function () {
        const file = this.files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function (e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
            controls.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
        });

        function clearImage() {
        input.value = '';
        preview.src = '#';
        preview.style.display = 'none';
        controls.style.display = 'none';
        }
    </script> -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <!-- VALIDACIONES jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/localization/messages_es.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
    <script src="Validaciones/Estudiantes_Modificar.js"></script>

</body>
</html>