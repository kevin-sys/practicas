<?php
include('conexionarchivo.php');

$tmp = array();
$res = array();

$sel = $con->query("SELECT * FROM files");
while ($row = $sel->fetch_assoc()) {
  $tmp = $row;
  array_push($res, $tmp);
}
?>

<?php
include_once "../conexion.php";
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
  <title>Cargar hoja de vida - SIMULASOFT</title>
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

        <br>
        <div class="container">

          <div class="row justify-content-md-center">
            <div class="col-8">
              <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal">
                Cargar hoja de vida
              </button>

              <table class="table mt-3">
                <thead>
                  <tr>

                    <th scope="col">Identificación</th>
                    <th scope="col">Fecha de cargue</th>
                    <th scope="col">Acción</th>

                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($res as $val) { ?>
                    <tr>

                      <td><?php echo $val['description'] ?></td>
                      <td><?php echo $val['FechaRegistro'] ?></td>

                      <td>
                        <button onclick="openModelPDF('<?php echo $val['url'] ?>')" class="btn btn-primary btn-block" type="button">Ver hoja de vida</button>

                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cargar hoja de vida</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form enctype="multipart/form-data" id="form1">

                  <div class="form-group">
                    <label for="description">Identificación</label>
                    <input type="text" class="form-control" id="description" name="description" required="required">
                  </div>
                  <div class="form-group">
                    <label for="description">archivo</label>
                    <input type="file" class="form-control" id="file" name="file">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="onSubmitForm()">Cuardar</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="modalPdf" tabindex="-1" aria-labelledby="modalPdf" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ver Reporte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <iframe id="iframePDF" frameborder="0" scrolling="no" width="100%" height="500px"></iframe>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

              </div>
            </div>
          </div>
        </div>
      </main>

      <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
      <script>
        function onSubmitForm() {
          var frm = document.getElementById('form1');
          var data = new FormData(frm);
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function () {
            if (this.readyState == 4) {
              var msg = xhttp.responseText;
              if (msg == 'success') {
                alert(msg);
                $('#exampleModal').modal('hide')
              } else {
                alert(msg);
              }

            }
          };
          xhttp.open("POST", "upload.php", true);
          xhttp.send(data);
          $('#form1').trigger('reset');
        }
        function openModelPDF(url) {
          $('#modalPdf').modal('show');
          $('#iframePDF').attr('src','<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/SIMULASOFT/docs/'; ?>'+url);
        }
      </script>
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