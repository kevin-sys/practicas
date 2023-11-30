
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Gestión de Docentes - Comite investigación</title>
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
                    <li><a class="dropdown-item" href="#"><i class="fa fa-sign-out fa-lg"></i>Salir</a>
                    </li>
                </ul>
            </li>
        </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <?php if (2 == 2) { ?>
        <aside class="app-sidebar">
            <div class="app-sidebar__user"><img class="app-sidebar__user-avatar"
                src="images/logoUpc.png" width="60" height="50" alt="User Image">
                <div>
                    <p class="app-sidebar__user-name">Administrador</p>
                    <p class="app-sidebar__user-designation"></p>
                </div>
            </div>
            <ul class="app-menu">
                <li><a class="app-menu__item" href="principal.php"><i class="app-menu__icon fa fa-home fa-lg"></i><span
                    class="app-menu__label">Menu Principal</span></a></li>

                    <li><a class="app-menu__item" href="principal.php"><i class="app-menu__icon fa fa-home fa-lg"></i><span
                        class="app-menu__label">Registrar estudiante</span></a></li>

                        <li><a class="app-menu__item" href="principal.php"><i class="app-menu__icon fa fa-home fa-lg"></i><span
                            class="app-menu__label">Registrar Facultad</span></a></li>

                            <li><a class="app-menu__item" href="principal.php"><i class="app-menu__icon fa fa-home fa-lg"></i><span
                                class="app-menu__label">Consultar estudiantes</span></a></li>

                                <li><a class="app-menu__item" href="principal.php"><i class="app-menu__icon fa fa-home fa-lg"></i><span
                                    class="app-menu__label">Consultar docentes</span></a></li>

                                    <li><a class="app-menu__item" href="principal.php"><i class="app-menu__icon fa fa-home fa-lg"></i><span
                                        class="app-menu__label">Consultar facultades</span></a></li>



                                    </ul>

                                </aside>
                            <?php } ?>

                            <main class="app-content">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="tile">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                 <form action="procesar.php" method="POST">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label class="control-label">Identificación</label>
                                                                <input type="text" class="form-control" id="identificacion" name="identificacion"
                                                                placeholder="Digite Identificación" minlength="6" maxlength="11"
                                                                pattern="[0-9]{1,12}" title="Solamente se admiten números"
                                                                required="required">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label class="control-label">Nombres</label>
                                                                <input type="text" class="form-control" id="nombres" name="nombres"
                                                                placeholder="Digite el nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" 
                                                                required="required" minlength="3" maxlength="50" title="Solamente se admiten caracteres">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label class="control-label">Apellidos</label>
                                                                <input type="text" class="form-control" id="apellidos" name="apellidos"
                                                                placeholder="Digite apellidos" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" 
                                                                minlength="3" maxlength="50" title="Solamente se admiten caracteres">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label class="control-label">Tipo de identificación</label>
                                                                <select class="form-control" id="tipoIdentificacion" name="tipoIdentificacion"  required="required">
                                                                    <option>Seleccione</option>
                                                                    <option value="CC">CC</option>
                                                                    <option value="CE">CE</option>
                                                                    <option value="PEP">PEP</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label class="control-label">Correo electrónico</label>
                                                                <input class="form-control" type="email" id="correo" name="correo"
                                                                placeholder="Digite el Correo electrónico" required="required">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label class="control-label">Celular</label>
                                                                <input type="text" class="form-control" id="celular" name="celular"
                                                                placeholder="Digite el Celular" minlength="10" maxlength="10"
                                                                pattern="[0-9]{1,10}" title="Solamente se admiten números"
                                                                required="required">
                                                            </div>
                                                        </div>
                                                    </div>




                                                    <div class="row">
                                                       <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Facultad</label>
                                                            <select class="form-control" id="idFacultad" name="idFacultad"  required="required">
                                                                <option>Seleccione</option>
                                                                <option value="1">Ingenierias y tecnologicas</option>
                                                                <option value="2">Administrativas y contables</option>
                                                                <option value="3">Licenciaturas</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Programa</label>
                                                            <select class="form-control" id="idPrograma" name="idPrograma"  required="required">
                                                                <option>Seleccione</option>
                                                                <option value="1">Ingenierias de sistemas</option>
                                                                <option value="2">Ingenieria electronica</option>
                                                                <option value="3">Contaduria</option>
                                                                <option value="3">Administración de empresas</option>

                                                                <option value="4">Licenciatura en matematica y fisicas</option>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Sede</label>
                                                            <select class="form-control" id="idSede" name="idSede"  required="required">
                                                                <option>Seleccione</option>
                                                                <option value="1">Aguachica</option>
                                                                <option value="2">Sabanas</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary"><i
                                                        class="fa fa-fw fa-lg fa-check-circle"></i>Registrar
                                                    </button>

                                                    <button type="button" id="btnLimpiar" class="btn btn-danger"><i
                                                        class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar
                                                    </button>
                                                </div>
                                            </form>
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