<?php

require "conexion.php";

session_start();
if (!isset($_SESSION['Identificacion'])) 
{
    echo" 
    <script language='javascript'> 
    alert(':... Inicia sesión para acceder a este recurso ...:') 
    window.location='index.php' 
    </script>"; 
    exit(); 
    header("Location: index.php");
}
$Usuario = $_SESSION['Usuario'];


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Menu Principal - SIMULASOFT</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css" />
    <link rel="stylesheet" type="text/css"
    href="assets/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
</head>

<body class="app sidebar-mini">
    <!-- Navbar-->

    <header class="app-header"><a class="app-header__logo" href=""></a>
        <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
        aria-label="Hide Sidebar"></a>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">

            <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown"
                aria-label="Open Profile Menu"><i class="fa fa fa-info"></i></a>
            </li>
            <!-- User Menu-->
            <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown"
                aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i>Salir</a>
                    </li>
                </ul>
            </li>
        </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

    <?php if ($Usuario == "Administrador") { ?>
        <aside class="app-sidebar">
            <div class="app-sidebar__user"><img class="app-sidebar__user-avatar"
                src="images/logoUpc.png" width="60" height="50" alt="User Image">
                <div>
                    <p class="app-sidebar__user-name">Administrador</p>
                    <p class="app-sidebar__user-designation">SimulaSoft</p>
                </div>
            </div>
            <ul class="app-menu">
                <li><a class="app-menu__item" href="principal.php"><i class="app-menu__icon fa fa-home fa-lg"></i><span
                    class="app-menu__label">Menu Principal</span></a></li>

                    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                        class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Gestión General</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a class="treeview-item" href="GestionDocente.php"><i class="icon fa fa-circle-o"></i>Registro del aspirante</a></li>
                            <li><a class="treeview-item" href="ConsultarDocente.php"><i class="icon fa fa-circle-o"></i> Listado de aspirantes</a></li>
                            <li><a class="treeview-item" href="http://www2.unicesar.edu.co/unicesar/hermesoft/vortal/miVortal/logueo.jsp"><i class="icon fa fa-circle-o"></i>Vortal HermeSoft</a></li>
                            <li><a class="treeview-item" href="https://github.com/kevin-sys"><i class="icon fa fa-circle-o"></i>Contactar al desarrollador</a></li>
                        </ul>
                    </li>
                    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                        class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Gestión financiera</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a class="treeview-item" href="docs/LiquidacionGeneral.php"><i class="icon fa fa-circle-o"></i>Liquidación general</a></li>
                            <li><a class="treeview-item" href="docs/CargarDocumentos.php"><i class="icon fa fa-circle-o"></i>Cargar hoja de vida</a></li>
                      
                        </ul>
                    </li>
                </ul>
            </aside>
        <?php } ?>

        <?php if ($Usuario != "Administrador") { ?>
            <aside class="app-sidebar">
                <div class="app-sidebar__user"><img class="app-sidebar__user-avatar"
                    src="images/logoUpc.png" width="60" height="50" alt="User Image">
                    <div>
                        <p class="app-sidebar__user-name">Docente</p>
                        <p class="app-sidebar__user-designation">SimulaSoft</p>
                    </div>
                </div>
                <ul class="app-menu">
                    <li><a class="app-menu__item" href="principal.php"><i class="app-menu__icon fa fa-home fa-lg"></i><span
                        class="app-menu__label">Menu Principal</span></a></li>

                        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                            class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Gestión General</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                            <ul class="treeview-menu">
                                <li><a class="treeview-item" href="ConsultarDocente.php"><i class="icon fa fa-circle-o"></i>Formato de puntos</a></li>
                               
                            </ul>
                        </li>
                    </ul>
                </aside>
            <?php } ?>
            <main class="app-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tile">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3>Acuerdo 006 del 23 de abril de 2018 Reglamento docentes ocasionales y catedráticos UPC</h3>
                                    <br>
                                    <p1>
                                        Por el cual se establece el reglamento de vinculación de los docentes ocasionales y catedráticos de la Universidad Popular Del Cesar.
                                        <a href="http://hojasdevida.unicesar.edu.co/InscripcionDocente/Tablero/Acuerdo036.pdf">(Click aqui para descargar)</a></p1>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="tile">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h3>Acuerdo 039 del 05 de noviembre de 2019; Se reglamenta proceso categorización profesores ocasionales y catedráticos.</h3>
                                        <br>
                                        <p1>
                                            Mediante el cual se reglamenta el proceso de categorización, permanencia y promoción de los profesores universitarios ocasionales y de catedras de la Universidad Popular Del cesar.
                                            <a href="https://www.unicesar.edu.co/index.php/es/normatividad/doc_download/5251-acuerdo-039-del-05-de-noviembre-de-2019-se-reglamenta-proceso-categorizacion-profesores-ocasionales-y-catedraticos#:~:text=ACUERDA%3A,la%20Universidad%20Popular%20del%20Cesar.">(Click aqui para descargar)</a></p1>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </main>
                    <!-- Essential javascripts for application to work-->
                    <script src="assets/jquery/jquery-3.3.1.min.js"></script>
                    <script src="assets/popper/popper.min.js"></script>
                    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
                    <script src="assets/main.js"></script>
                    <script type="text/javascript" src="main.js"></script>
     <!--
    <script type="text/javascript" src="js/plugins/bootstrap-notify.min.js"></script>
-->
<script type="text/javascript" src="assets/sweetalert.min.js"></script>
<script type="text/javascript" src="assets/datatables/datatables.min.js"></script> 
<!-- Page specific javascripts-->
<!-- Google analytics script-->
<script type="text/javascript">
    if (document.location.hostname == 'pratikborsadiya.in') {
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
    }
</script>
</body>

</html>