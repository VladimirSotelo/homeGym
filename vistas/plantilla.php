<?php
session_start();
$url = ControladorPlantilla::url();
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8" />
    <title>Sistema de Gestión GYM </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema de Gestión GYM" />
    <meta name="author" content="Ana y Vladimir" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="vistas/assets/images/favicon.ico">

    <!-- Flatpickr Timepicker css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- App css -->
    <link href="<?php echo $url; ?>vistas/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Iconos -->
    <link href="<?php echo $url; ?>vistas/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <!-- Otros iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

    <!-- Datatables web -->
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <link href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.1.8/b-3.1.2/b-colvis-3.1.2/b-html5-3.1.2/b-print-3.1.2/kt-2.12.1/r-3.0.3/sl-2.1.0/datatables.min.css" rel="stylesheet">

    <!-- Datatables Traduccion Español -->
    <script src="<?php echo $url; ?>vistas/assets/js/DataTables-ES.js"></script>

</head>

<?php // if (isset($_SESSION["iniciarSesion"])) { ?>
    <!-- body start -->

    <body data-menu-color="dark" data-sidebar="default">

        <!-- Begin page -->
        <div id="app-layout">

            <!-- Topbar Start -->
            <?php include 'modulos/header.php' ?>
            <!-- end Topbar -->

            <!-- Left Sidebar Start -->
            <?php include 'modulos/menu.php' ?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <?php

                if (isset($_GET["pagina"])) {
                    $rutas = explode('/', $_GET["pagina"]);
                    if (
                        // Agentes
                        $rutas[0] == "usuarios" ||

                        $rutas[0] == "entrenadores" ||

                        $rutas[0] == "clientes" ||
                        $rutas[0] == "nuevo_cliente"||

                        $rutas[0] == "especialidades" ||

                        $rutas[0] == "planes" ||

                        $rutas[0] == "pagos" ||

                        $rutas[0] == "login"


                    ) {
                        include "vistas/modulos/" . $rutas[0] . ".php";
                    } else {
                        include "vistas/modulos/404.php";
                    }
                }

                ?>

                <!-- Footer Start -->
                <?php include 'modulos/footer.php' ?>
                <!-- end Footer -->

            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Vendor -->
        <script src="<?php echo $url; ?>vistas/assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo $url; ?>vistas/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo $url; ?>vistas/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo $url; ?>vistas/assets/libs/node-waves/waves.min.js"></script>
        <script src="<?php echo $url; ?>vistas/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="<?php echo $url; ?>vistas/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
        <script src="<?php echo $url; ?>vistas/assets/libs/feather-icons/feather.min.js"></script>

        <!-- Flatpickr Timepicker Plugin js -->
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script> <!-- Traduccion al español -->
        <script src="<?php echo $url; ?>vistas/assets/js/pages/form-picker.js"></script>


        <!-- DataTables.net web -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>-->
        <script src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.1.8/b-3.1.2/b-colvis-3.1.2/b-html5-3.1.2/b-print-3.1.2/kt-2.12.1/r-3.0.3/sl-2.1.0/datatables.min.js"></script>

            <!--alerts -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11 "></script>
        <script src="<?php echo $url; ?>vistas/assets/js/alerts.js "></script>
        <script src="<?php echo $url; ?>vistas/assets/js/alerts_Confirmaciones.js "></script>

        <!-- App js-->
        <script src="<?php echo $url; ?>vistas/assets/js/app.js"></script>


    </body>
<?php // } else {
    //include "vistas/modulos/login.php";
//}

?>

</html>