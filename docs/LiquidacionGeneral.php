<?php

require '../conexion.php';
session_start();
if (!isset($_SESSION['Identificacion'])) 
{
  echo" 
  <script language='javascript'> 
  alert(':... Inicia sesión para acceder a este recurso ...:') 
  window.location='../index.php' 
  </script>"; 
  exit(); 
  header("Location: ../index.php");
}
$Usuario = $_SESSION['Usuario'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
  <!-- Twitter meta-->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:site" content="@pratikborsadiya">
  <meta property="twitter:creator" content="@pratikborsadiya">
  <!-- Open Graph Meta-->
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Vali Admin">
  <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
  <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
  <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
  <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
  <title>Liquidación General - SIMULASOFT</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
          <li><a class="dropdown-item" href="../logout.php"><i class="fa fa-sign-out fa-lg"></i>Salir</a>
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
        src="../images/logoUpc.png" width="60" height="50" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">Administrador</p>
          <p class="app-sidebar__user-designation">SimulaSoft</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="../Principal.php"><i class="app-menu__icon fa fa-home fa-lg"></i><span
          class="app-menu__label">Menu Principal</span></a></li>

          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
            class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Gestión General</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="../GestionDocente.php"><i class="icon fa fa-circle-o"></i>Registro del aspirante</a></li>
              <li><a class="treeview-item" href="../ConsultarDocente.php"><i class="icon fa fa-circle-o"></i> Listado de aspirantes</a></li>
              <li><a class="treeview-item" href="http://www2.unicesar.edu.co/unicesar/hermesoft/vortal/miVortal/logueo.jsp"><i class="icon fa fa-circle-o"></i>Vortal HermeSoft</a></li>
              <li><a class="treeview-item" href="https://github.com/kevin-sys"><i class="icon fa fa-circle-o"></i>Contactar al desarrollador</a></li>
            </ul>
          </li>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
            class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Gestión financiera</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="LiquidacionGeneral.php"><i class="icon fa fa-circle-o"></i>Liquidación general</a></li>
              <li><a class="treeview-item" href="CargarDocumentos.php"><i class="icon fa fa-circle-o"></i>Cargar hoja de vida</a></li>

            </ul>
          </li>
        </ul>
      </aside>
    <?php } ?>

    <?php if ($Usuario != "Administrador") { ?>
      <aside class="app-sidebar">
        <div class="app-sidebar__user"><img class="app-sidebar__user-avatar"
          src="../images/logoUpc.png" width="60" height="50" alt="User Image">
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
                <li><a class="treeview-item" href="../GestionDocente.php"><i class="icon fa fa-circle-o"></i>Formato de puntos</a></li>

              </ul>
            </li>
          </ul>
        </aside>
      <?php } ?>
      <main class="app-content">

        <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <section class="invoice">
                <div class="row mb-4">
                  <div class="col-6">
                    <h2 class="page-header"><i class="fa fa-globe"></i> Liquidación general</h2>
                  </div>


                  <div class="col-6">
                   <h5 class="text-right">Fecha: 
                    <script>
                      date = new Date().toLocaleDateString();
                      document.write(date);
                    </script>
                  </h5>
                </div>
              </div>
              <div class="row invoice-info">
                <div class="col-4">De
                  <address><strong>Recursos Humanos</strong><br>UPC, sede Hurtado<br>Kevin Gómez Cantillo<br>Valledupar-Cesar<br>Correo: recursoshumanos@unicesar.edu.co</address>
                </div>
                <div class="col-4">Para
                  <address><strong>Oficina financiera</strong><br>UPC, sede Hurtado
                    <br>Robert Romero<br>Valledupar-Cesar<br>Correo: oficinafinanciera@unicesar.edu.co</address>
                  </div>
                  <div class="col-4"><b>Factura #00001</b><br><br><b>ID de pedido:</b> K11G10C99<br><b>Vencimiento de pago:</b> INMEDIATO<br><b>Cuenta:</b> 0324-565-0170</div>
                </div>
                <div class="row">
                  <div class="col-12 table-responsive">
                    <table class="table table-striped">
                     <thead>
                      <tr>
                        <th>Identificacion</th>
                        <th>Primer Nombre</th>
                        <th>Segundo Nombre</th>
                        <th>Primer Apellido</th>
                        <th>Segundo Apellido</th>
                        <th>Liquidación</th>
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
                          <td><?php echo $row['TotalLiquidacionDocente']; ?></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                    <tr>
                      <th>TOTAL</th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th><?php
                      $query = "SELECT SUM(TotalLiquidacionDocente) as Total FROM docente"; 
                      $result_tasks = mysqli_query($mysqli, $query);
                      while ($row = mysqli_fetch_assoc($result_tasks)) { ?>
                        <?php echo $row['Total']; ?>
                        <?php } ?></th>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="row d-print-none mt-2">
                  <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print</a></div>
                </div>
              </section>
            </div>
          </div>
        </div>
      </main>
      <!-- Essential javascripts for application to work-->
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
      <!-- The javascript plugin to display page loading on top-->
      <script src="js/plugins/pace.min.js"></script>
      <!-- Page specific javascripts-->
      <!-- Google analytics script-->
      <script type="text/javascript">
        if(document.location.hostname == 'pratikborsadiya.in') {
         (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
           (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
           m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
         })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
         ga('create', 'UA-72504830-1', 'auto');
         ga('send', 'pageview');
       }
     </script>
   </body>
   </html>