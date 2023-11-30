<?php
session_start();
require 'conexion.php';
$Usuario = $_SESSION['Usuario'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Listado de aspirantes a docente - SIMULASOFT</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
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
                                <li><a class="treeview-item" href="GestionDocente.php"><i class="icon fa fa-circle-o"></i>Formato de puntos</a></li>
                                
                            </ul>
                        </li>
                    </ul>
                </aside>
            <?php } ?>

            <main class="app-content">
               <div class="app-title">
                <div>
                    <h4> En esta sección podra encontrar información de los aspirantes a docente registrados en el sistema.</h4>
                </div>
            </div>
            <div >
                <h4><i class="fa fa-edit"></i> Aspirantes a docente sin revisar</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">        
                                   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Identificacion</th>
                                            <th>Primer Nombre</th>
                                            <th>Segundo Nombre</th>
                                            <th>Primer Apellido</th>
                                            <th>Segundo Apellido</th>
                                            <th>Sexo</th>
                                            <th>Celular</th>
                                            <th>Facultad</th>
                                            <th>Asignar puntos</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $query = "SELECT * FROM docente where TotalLiquidacionDocente =0";
                                        $result_tasks = mysqli_query($mysqli, $query);

                                        while ($row = mysqli_fetch_assoc($result_tasks)) { ?>
                                            <tr>
                                                <td><?php echo $row['Identificacion']; ?></td>
                                                <td><?php echo $row['PrimerNombre']; ?></td>
                                                <td><?php echo $row['SegundoNombre']; ?></td>
                                                <td><?php echo $row['PrimerApellido']; ?></td>
                                                <td><?php echo $row['SegundoApellido']; ?></td>
                                                <td><?php echo $row['Sexo']; ?></td>
                                                <td><?php echo $row['Celular']; ?></td>
                                                <td><?php echo $row['Facultad']; ?></td>
                                                <td>
                                                    <a href="CalcularPuntaje.php?Identificacion=<?php echo $row['Identificacion'] ?>" class="btn btn-primary">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div >
            <h4><i class="fa fa-edit"></i> Aspirantes a docente revisados</h4>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">        
                               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Identificacion</th>
                                        <th>Primer Nombre</th>
                                        <th>Segundo Nombre</th>
                                        <th>Primer Apellido</th>
                                        <th>Segundo Apellido</th>
                                        <th>Sexo</th>
                                        <th>Celular</th>
                                        <th>Facultad</th>
                                        <th>Consultar</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $query = "SELECT * FROM docente WHERE TotalLiquidacionDocente >0";
                                    $result_tasks = mysqli_query($mysqli, $query);

                                    while ($row = mysqli_fetch_assoc($result_tasks)) { ?>
                                        <tr>
                                            <td><?php echo $row['Identificacion']; ?></td>
                                            <td><?php echo $row['PrimerNombre']; ?></td>
                                            <td><?php echo $row['SegundoNombre']; ?></td>
                                            <td><?php echo $row['PrimerApellido']; ?></td>
                                            <td><?php echo $row['SegundoApellido']; ?></td>
                                            <td><?php echo $row['Sexo']; ?></td>
                                            <td><?php echo $row['Celular']; ?></td>
                                            <td><?php echo $row['Facultad']; ?></td>
                                            <td>
                                                <a href="Informe/HojaVida.php?id=<?php echo $row['Identificacion'] ?>"
                                                    class="btn btn-primary">
                                                    <i class="fa fa-search"></i>
                                                </a>

                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formUsuarios">    
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Apellido(s) del aspirante</label>
                                <input type="text" class="form-control" id="Apellidos"
                                placeholder="*Ingrese Apellidos" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" 
                                required="required" minlength="5" maxlength="30" title="Solamente se admiten caracteres">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Nombre(s) del aspirante</label>
                                <input type="text" class="form-control" id="Nombres" required="required">
                            </div> 
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Lugar de nacimiento</label>
                                <input type="text" class="form-control" id="lugarnacimiento"
                                placeholder="*Ingrese Lugar de nacimiento" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,25}" 
                                required="required" minlength="4" maxlength="25" title="Solamente se admiten caracteres">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Fecha de nacimiento</label>
                                <input class="form-control" type="text" id="fechanacimiento"
                                placeholder="*Ingrese Fecha de nacimiento" required="required">
                            </div> 
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="control-label">Dirección de domicilio/Barrio </label>
                                <input type="text" class="form-control" id="direccion"
                                placeholder="*Ingrese Direccion" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ#/°- ]{1,60}" 
                                required="required" minlength="10" maxlength="60">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Correo electrónico</label>
                                <input class="form-control" type="email" id="correo"
                                placeholder="*Ingrese Correo electrónico" required="required">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Celular</label>
                                <input type="text" class="form-control" id="celular"
                                placeholder="*Ingrese Celular" minlength="10" maxlength="10"
                                pattern="[0-9]{1,10}" title="Solamente se admiten números"
                                required="required">
                            </div> 
                        </div>    
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                    </div>
                </div>
            </form>    
        </div>
    </div>
</div>  
<script src="assets/jquery/jquery-3.3.1.min.js"></script>
<script src="assets/popper/popper.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/main.js"></script>
<script type="text/javascript" src="main.js"></script>
<script src="assets/sweetalert.min.js"></script>
<script src="assets/datatables/datatables.min.js"></script>  

</body>

</html>