<?php
session_start();
$cont = "2";
$datos = "";
if (isset($_POST["btnIniciar"])) {
    
    if (session_start()) {
        session_destroy();
    }
    include("logn/conection.php");
    $queryP = "call mostrarUsuariosEmpVent ('" . $_POST["txtUsuario"] . "', '" . $_POST["txtPassword"] . "')";
    echo $queryP;
    $exeqQuery = mysqli_query($conn, $queryP);

    while ($tabla = mysqli_fetch_array($exeqQuery)) {
        $cont = $tabla[0];
        if ($cont == "2") {
            $datos = "Bienvenido " . $tabla[1] . " " . $tabla[2] . " " . $tabla[3] . " " . $tabla[4] . " " . $tabla[5] . " " . $tabla[6] . " " . $tabla[7] . " " . $tabla[8] . " ";
            session_start();
            $_SESSION['rol']=$tabla[9];
            $_SESSION['usuario'] = $_POST["txtUsuario"];
            $_SESSION['pasword'] = $_POST["txtPassword"];
        }
    }
}
if (session_status()==2) {
    if (isset($_SESSION['usuario'])) {
        if (isset($_SESSION['pasword']) && $cont == "2" && $_SESSION['rol']=="administrador") {
#L4T3M1BL3$
?>

            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>TIENE</title>

                <!-- Google Font: Source Sans Pro -->
                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
                <!-- Font Awesome -->
                <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
                <!-- Ionicons -->
                <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                <!-- Tempusdominus Bootstrap 4 -->
                <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
                <!-- iCheck -->
                <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
                <!-- JQVMap -->
                <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
                <!-- Theme style -->
                <link rel="stylesheet" href="dist/css/adminlte.min.css">
                <!-- overlayScrollbars -->
                <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
                <!-- Daterange picker -->
                <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
                <!-- summernote -->
                <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
            </head>

            <body class="hold-transition sidebar-mini layout-fixed">
                <div class="wrapper">

                    <!-- Preloader -->
                    <div class="preloader flex-column justify-content-center align-items-center">
                        <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
                    </div>

                    <!-- Navbar -->
                    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                        <!-- Left navbar links -->
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                            </li>
                            <li class="nav-item d-none d-sm-inline-block">
                                <a class="nav-link">Home</a>
                                <?php echo "<a  class='nav-link'>" . $datos . " </a>";
                                ?>
                            </li>
                            <li class="nav-item d-none d-sm-inline-block">
                                <a href="#" class="nav-link">Contact</a>
                            </li>
                        </ul>

                        <!-- Right navbar links -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Navbar Search -->
                            <li class="nav-item">
                                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                                    <i class="fas fa-search"></i>
                                </a>
                                <div class="navbar-search-block">
                                    <form class="form-inline">
                                        <div class="input-group input-group-sm">
                                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                            <div class="input-group-append">
                                                <button class="btn btn-navbar" type="submit">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                                    <i class="fas fa-expand-arrows-alt"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                                    <i class="fas fa-th-large"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.navbar -->

                    <!-- Main Sidebar Container -->
                    <aside class="main-sidebar sidebar-dark-primary elevation-4">
                        <!-- Brand Logo -->
                        <a href="index.php" class="brand-link">
                            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                            <span class="brand-text font-weight-light">AdminLTE 3</span>
                        </a>

                        <!-- Sidebar -->
                        <div class="sidebar">
                            <!-- Sidebar user panel (optional) -->
                            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                                <div class="image">
                                    <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                                </div>
                                <div class="info">
                                    <a href="#" class="d-block"><?php echo $_SESSION['usuario']; ?></a>
                                </div>
                            </div>

                            <!-- SidebarSearch Form -->
                            <div class="form-inline">
                                <div class="input-group" data-widget="sidebar-search">
                                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-sidebar">
                                            <i class="fas fa-search fa-fw"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Sidebar Menu -->
                            <nav class="mt-2">
                                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                                    <li class="nav-item menu-open">
                                        <a href="#" class="nav-link active">
                                            <!--<i class="nav-icon fas fa-tachometer-alt"></i>-->
                                            <i class=" fas fa-car-battery "></i>

                                            <i class="right fas fa-angle-left"></i>
                                            <p> Productos Pilas </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="./index.php" class="nav-link active">
                                                    <!--<i class="far fa-circle nav-icon"></i>-->
                                                    <i class="fas fa-cart-plus"></i>

                                                    <p>Registrar</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="./index2.php" class="nav-link">
                                                    <!--- <i class="far fa-circle nav-icon"></i>-->
                                                    <i class="fas fa-spinner"></i>
                                                    <p>Actualizar</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="./index3.php" class="nav-link">
                                                    <!--<i class="far fa-circle nav-icon"></i>-->
                                                    <i class=""></i>

                                                    <p>Consulta</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                </ul>
                            </nav>
                            <!-- /.sidebar-menu -->
                        </div>
                        <!-- /.sidebar -->
                    </aside>

                    <!-- Content Wrapper. Contains page content -->
                    <div class="content-wrapper">
                        <!-- Content Header (Page header) -->
                        <div class="content-header">
                            <div class="container-fluid">
                                <form class="needs-validation" action="/admin/logn/procesar_ing_prod.php" method="post">
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">Clave Producto</label>
                                            <input type="text" class="form-control" id="validationCustom01" placeholder="clave" name="claveP" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom02">Nombre Producto</label>
                                            <input type="text" class="form-control" id="validationCustom02" placeholder="nombre" name="nombreP" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustomUsername">Descripcion Producto</label>
                                            <input type="text" class="form-control" id="validationCustom03" placeholder="Descripcion" name="descP" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">Nombre Corto</label>
                                            <input type="text" class="form-control" id="validationCustom04" placeholder="nom corto" name="nomCP" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">Precio Actual</label>
                                            <input type="text" class="form-control" id="validationCustom05" placeholder="precio act" name="precioA" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">Excitencia</label>
                                            <input type="text" class="form-control" id="validationCustom06" placeholder="existencia" name="exist" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">Stock Min</label>
                                            <input type="text" class="form-control" id="validationCustom07" placeholder="stock min" name="stockMn" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">Stock Max</label>
                                            <input type="text" class="form-control" id="validationCustom08" placeholder="stock max" name="stockMx" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">Contenido neto</label>
                                            <input type="text" class="form-control" id="validationCustom09" placeholder="cont neto" name="contN" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <?php
                                        include "logn/logn.php";
                                        ?>
                                        <div class="form-group col-md-4">
                                            <label for="imputState">Precentacion</label>
                                            <select name="imputState" class="form-control">
                                                <?php
                                                $query = "SELECT * FROM jarmando_presentacion WHERE JAMANDO_STATUS_PRESENTACION = 1";
                                                $colID = "JAMANDO_ID_PRESENTACION";
                                                $ColNom = "JAMANDO_DESCRIPCION_PRESENTACION";
                                                datosIDs($query, $ColNom);
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="imputState">Familia</label>
                                            <select name="imputState1" class="form-control">
                                                <?php
                                                $query = "SELECT * FROM jarmando_familia  WHERE JAMANDO_STATUS_FAMILIA= 1";
                                                $colID = "JAMANDO_ID_FAMILIA";
                                                $ColNom = "JAMANDO_DESCRIPCION_FAMILIA";
                                                datosIDs($query, $ColNom);
                                                ?>
                                            </select>
                                        </div>


                                        <div class="form-group col-md-4">
                                            <label for="imputState">Marca</label>
                                            <select name="imputState2" class="form-control">
                                                <?php
                                                $query = "SELECT * FROM jarmando_marca WHERE JAMANDO_STATUS_MARCA= 1";
                                                $colID = "JAMANDO_ID_MARCA";
                                                $ColNom = "JAMANDO_NOMBRE_MARCA";
                                                datosIDs($query, $ColNom);
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom10">descuento</label>
                                            <input type="text" class="form-control" id="validationCustom10" placeholder="descuento" name="desc" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>


                                    <input class="btn btn-primary" type="submit" value="Ingresar">
                                    <input class="btn btn-secundary" type="reset" value="Cancelar">
                                </form>
                            </div>
                            <script>
                                // Example starter JavaScript for disabling form submissions if there are invalid fields
                                (function() {
                                    'use strict';
                                    window.addEventListener('load', function() {
                                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                        var forms = document.getElementsByClassName('needs-validation');
                                        // Loop over them and prevent submission
                                        var validation = Array.prototype.filter.call(forms, function(form) {
                                            form.addEventListener('submit', function(event) {
                                                if (form.checkValidity() === false) {
                                                    event.preventDefault();
                                                    event.stopPropagation();
                                                }
                                                form.classList.add('was-validated');
                                            }, false);
                                        });
                                    }, false);
                                })();
                            </script>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
                    </div>
                    <!-- /.content-header -->

                    <!-- Main content -->

                </div>
                <!-- /.content-wrapper -->
                <footer class="main-footer">
                    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
                    <div class="float-right d-none d-sm-inline-block">
                        <b>Version</b> 3.1.0
                    </div>
                </footer>

                <!-- Control Sidebar -->
                <aside class="control-sidebar control-sidebar-dark">
                    <!-- Control sidebar content goes here -->
                </aside>
                <!-- /.control-sidebar -->
                </div>
                <!-- ./wrapper -->

                <!-- jQuery -->
                <script src="plugins/jquery/jquery.min.js"></script>
                <!-- jQuery UI 1.11.4 -->
                <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
                <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
                <script>
                    $.widget.bridge('uibutton', $.ui.button)
                </script>
                <!-- Bootstrap 4 -->
                <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
                <!-- ChartJS -->
                <script src="plugins/chart.js/Chart.min.js"></script>
                <!-- Sparkline -->
                <script src="plugins/sparklines/sparkline.js"></script>
                <!-- JQVMap -->
                <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
                <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
                <!-- jQuery Knob Chart -->
                <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
                <!-- daterangepicker -->
                <script src="plugins/moment/moment.min.js"></script>
                <script src="plugins/daterangepicker/daterangepicker.js"></script>
                <!-- Tempusdominus Bootstrap 4 -->
                <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
                <!-- Summernote -->
                <script src="plugins/summernote/summernote-bs4.min.js"></script>
                <!-- overlayScrollbars -->
                <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
                <!-- AdminLTE App -->
                <script src="dist/js/adminlte.js"></script>
                <!-- AdminLTE for demo purposes -->
                <script src="dist/js/demo.js"></script>
                <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
                <script src="dist/js/pages/dashboard.js"></script>
            </body>

            </html>
<?php
        }else if (isset($_SESSION['pasword']) && $cont == "2"&& $_SESSION['rol']=="cliente"){
            header("location:index3.php");
        }else{
            echo "<h3>No se pudo master</h3>";
        }
    } else {
        echo "<h4>Debe iniciar sesion</h4>";
        echo "<a href='inicio-session.php'>Iniciar sesion</a>";
    }
}
?>