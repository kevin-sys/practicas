<?php
require "conexion.php";
session_start();

$Usuario = $_SESSION['Usuario'];

$PrimerNombre = '';
$SegundoNombre = '';

$PrimerApellido = '';
$SegundoApellido = '';
$FechaNacimiento = '';
$Sexo = '';
$Celular = '';
$Correo = '';
$TipoIdentificacion = '';
$Direccion = '';


if (isset($_GET['Identificacion'])) 
{
	$Identificacion = $_GET['Identificacion'];
	$query = "SELECT * FROM docente WHERE Identificacion=$Identificacion";
	$result = mysqli_query($mysqli, $query);
	if (mysqli_num_rows($result) == 1) 
	{
		$row = mysqli_fetch_array($result);
		$PrimerNombre = $row['PrimerNombre'];
		$PrimerApellido = $row['PrimerApellido'];
		$SegundoNombre = $row['SegundoNombre'];
		$SegundoApellido = $row['SegundoApellido'];
		$FechaNacimiento = $row['FechaNacimiento'];
		$Sexo = $row['Sexo'];
		$Celular = $row['Celular'];
		$Correo = $row['Correo'];
		$Facultad = $row['Facultad'];
	}

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Asignación de puntos</title>
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
								<li><a class="treeview-item" href="GestionDocente.php"><i class="icon fa fa-circle-o"></i>Formato de puntos</a></li>

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
									<div class="row">
										<div class="col-lg-12">
											<h5>Datos básicos
											</h5>
										</div>
									</div>
									<br>
									<form action="insertaliquidacion.php" method="POST" id="FormularioPuntaje">
										<div class="row">
											<div class="col-lg-3">
												<div class="form-group">
													<label class="control-label">Identificación</label>
													<input type="text" class="form-control" name="Identificacion"
													value="<?php echo $Identificacion; ?>" readonly minlength="6" maxlength="11"
													pattern="[0-9]{1,12}" title="Solamente se admiten números"
													required="required">
												</div>
											</div>
											<div class="col-lg-3">
												<div class="form-group">
													<label class="control-label">Primer Nombre</label>
													<input type="text" class="form-control" name="PrimerNombre"
													value="<?php echo $PrimerNombre; ?>" readonly pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" 
													required="required" minlength="3" maxlength="15" title="Solamente se admiten caracteres">
												</div>
											</div>

											<div class="col-lg-3">
												<div class="form-group">
													<label class="control-label">Segundo Nombre</label>
													<input type="text" class="form-control" name="SegundoNombre"
													value="<?php echo $SegundoNombre; ?>" readonly pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" 
													required="required" minlength="3" maxlength="15" title="Solamente se admiten caracteres">
												</div>
											</div>
											<div class="col-lg-3">
												<div class="form-group">
													<label class="control-label">Primer Apellido</label>
													<input type="text" class="form-control" name="PrimerApellido"
													value="<?php echo $PrimerApellido; ?>" readonly pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,25}" 
													required="required" minlength="3" maxlength="80" title="Solamente se admiten caracteres">
												</div>
											</div>

										</div>

										<br>
										<div class="row">

											<div class="col-lg-3">
												<div class="form-group">
													<label class="control-label">Segundo Apellido</label>
													<input type="text" class="form-control" name="SegundoApellido"
													value="<?php echo $SegundoApellido; ?>" readonly pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,25}" 
													required="required" minlength="3" maxlength="15" title="Solamente se admiten caracteres">
												</div>
											</div>

											<div class="col-lg-3">
												<div class="form-group">
													<label class="control-label">Sexo</label>
													<input type="text" class="form-control" name="Sexo"
													value="<?php echo $Sexo; ?>" readonly pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,25}" 
													required="required" minlength="1" maxlength="2" title="Solamente se admiten caracteres">
												</div>
											</div>
											<div class="col-lg-3">
												<div class="form-group">
													<label class="control-label">Fecha de nacimiento</label>
													<input type="text" class="form-control" name="FechaNacimiento"
													value="<?php echo $FechaNacimiento; ?>" readonly pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,25}" 
													required="required" minlength="3" maxlength="30" title="Solamente se admiten caracteres">
												</div>
											</div>

											<div class="col-lg-3">
												<div class="form-group">
													<label class="control-label">Celular</label>
													<input type="text" class="form-control" name="Celular"
													value="<?php echo $Celular; ?>" readonly minlength="10" maxlength="10"
													pattern="[0-9]{1,10}" title="Solamente se admiten números"
													required="required">
												</div>
											</div>

										</div>
										<br>
										<div class="row">

											<div class="col-lg-6">
												<div class="form-group">
													<label class="control-label">Correo electrónico</label>
													<input class="form-control" type="email" name="Correo"
													value="<?php echo $Correo; ?>" readonly required="required">
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label class="control-label">Facultad</label>
													<input type="text" class="form-control" name="Facultad"
													value="<?php echo $Facultad; ?>" readonly pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ#/°- ]{1,60}" 
													required="required" minlength="12" maxlength="255">
												</div>
											</div>

										</div>

										<br>

										<div class="row">
											<div class="col-lg-4">
												<h5>Titulos en el área de desempeño</h5>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-lg-3">
												<div class="form-group">
													<label class="control-label">Área de desempeño</label>
													<select class="form-control" name="TipoAreaDesempeño" onchange="AsignarPuntoAreaDesempeño(this.value)"  required>
														<option>Seleccione</option>
														<option value="E1">Especialización (1)</option>
														<option value="E2">Especialización (2)</option>
														<option value="M1">Maestria (1)</option>
														<option value="M2">Maestria (2)</option>
														<option value="D1">Doctorado (1)</option>
														<option value="D2">Doctorado (2)</option>
													</select>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="form-group">
													<label class="control-label">Puntos por área de desempeño</label>
													<input type="text" class="form-control" name="PuntosAreaDesempeño" id="PuntosAreaDesempeño"
													readonly
													required="required" placeholder="Puntos por área de desempeño">
												</div>
											</div>

											<div class="col-lg-3">
												<div class="form-group">
													<label class="control-label">Bonificación mensual factor de un S.M.M.L.V</label>
													<input type="text" class="form-control" name="BonificacionAreaDesempeño" id="BonificacionAreaDesempeño"
													readonly
													required="required" placeholder="Bonificación mensual factor de S.M.M.L.V">
												</div>
											</div>
											<div class="col-lg-3">
												<div class="form-group">
													<label class="control-label">Total a liquidar por bonificación de área</label>
													<input type="text" class="form-control" name="TotalBonificacionAreaDesempeño" id="TotalBonificacionAreaDesempeño"
													readonly
													required="required" placeholder="Total liquidacion por bonificación de area">
												</div>
											</div>

										</div>
										<br>

										<div class="row">
											<div class="col-lg-4">
												<h5> Categorias docente</h5>
											</div>
										</div>


										<br>
										<div class="row">
											<div class="col-lg-3">
												<div class="form-group">
													<label class="control-label">Categoria</label>
													<select class="form-control" name="TipoCategoriaDocente" onchange="AsignarPuntoCategoriaDocente(this.value)"  required>
														<option>Seleccione</option>
														<option value="Auxiliar de tiempo completo">Auxiliar de tiempo completo</option>
														<option value="Auxiliar de medio tiempo">Auxiliar de medio tiempo</option>
														<option value="Asistente de tiempo completo">Asistente de tiempo completo</option>
														<option value="Asistente de medio tiempo">Asistente de medio tiempo</option>
														<option value="Asociado de tiempo completo">Asociado de tiempo completo</option>
														<option value="Asociado de medio tiempo">Asociado de medio tiempo</option>
														<option value="Titular de tiempo completo">Titular de tiempo completo</option>
														<option value="Titular de medio tiempo">Titular de medio tiempo</option>

													</select>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="form-group">
													<label class="control-label">Puntos por categoria docente</label>
													<input type="text" class="form-control" name="PuntosCategoriaDocente" id="PuntosCategoriaDocente"
													readonly
													required="required" placeholder="Puntos por categoria">
												</div>
											</div>

											<div class="col-lg-3">
												<div class="form-group">
													<label class="control-label">Remuneración por categoría docente</label>
													<input type="text" class="form-control" name="RemuneracionCategoriaDocente" id="RemuneracionCategoriaDocente"
													readonly
													required="required" placeholder="Remuneración por categoria">
												</div>
											</div>

											<div class="col-lg-3">
												<div class="form-group">
													<label class="control-label">Total a liquidar por categoría docente</label>
													<input type="text" class="form-control" name="TotalLiquidarCategoriaDocente" id="TotalLiquidarCategoriaDocente"
													readonly
													required="required" placeholder="Total liquidacion por categoria">
												</div>
											</div>

										</div>
										<br>

										<div class="row">
											<div class="col-lg-4">
												<h5>Experiencia calificada
												</h5>
											</div>
										</div>

										<br>
										<div class="row">
											<div class="col-lg-3">
												<div class="form-group">
													<label class="control-label">Nivel de experiencia</label>
													<select class="form-control" name="TipoExperienciaDocente" id="TipoExperienciaDocente" onchange="AsignarPuntoExperienciaDocente(this.value)"  required>
														<option>Seleccione</option>
														<option value="Docente de tiempo completo">Docente de tiempo completo</option>
														<option value="Docente de medio tiempo">Docente de medio tiempo</option>
														<option value="Docente de catedra">Docente de catedra</option>
														<option value="Experiencia profesional">Experiencia profesional</option>

													</select>
												</div>
											</div>

											<div class="col-lg-3">
												<div class="form-group">
													<label class="control-label">Puntaje por año de experiencia</label>
													<input type="text" class="form-control" name="PuntosAñoExperiencia" id="PuntosAñoExperiencia"
													readonly
													required="required" placeholder="Puntaje por año">
												</div>
											</div>

											<div class="col-lg-3">
												<div class="form-group">
													<label class="control-label">Años de experiencia</label>
													<input type="text" class="form-control" name="CantidadAniosExperiencia" id="CantidadAniosExperiencia"
													minlength="1" maxlength="2"
													pattern="\d*" title="Solamente se admiten números"
													required="required" placeholder="Años de experiencia"  oninput="BotonCalcularPuntosExperienciaDocente()">
												</div>
											</div>

											<div class="col-lg-3">
												<div class="form-group">
													<label class="control-label">Puntos Totales por experiencia</label>
													<input type="text" class="form-control" name="PuntosTotalesExperienciaDocente" id="PuntosTotalesExperienciaDocente"
													readonly
													required="required" placeholder="Puntos por experiencia">
												</div>
											</div>

										</div>
										<br>

										<div class="row">
											<div class="col-lg-4">
												<h5>Producción académica</h5>
											</div>
										</div>

										<br>
										<h5><b>Seleccione el grupo de investigación, si pertenece a mas de un grupo, seleccione el grupo con mayor puntaje de la categoría.</b></h5>
										<br>

										<div class="row">
											<div class="col-lg-2">
												<div class="form-group">
													<label class="control-label">GRUPO A1 (20 PUNTOS)
														<input type="radio" class="form-control" name="PuntoGrupoInvestigacion" id="PuntoGrupoInvestigacion"
														required="required" value="20"></label>
													</div>
												</div>

												<div class="col-lg-2">
													<div class="form-group">
														<label class="control-label">GRUPO A (15 PUNTOS)
															<input type="radio" class="form-control" name="PuntoGrupoInvestigacion" id="PuntoGrupoInvestigacion"
															required="required" value="15"></label>
														</div>
													</div>

													<div class="col-lg-2">
														<div class="form-group">
															<label class="control-label">GRUPO B (12 PUNTOS)
																<input type="radio" class="form-control" name="PuntoGrupoInvestigacion" id="PuntoGrupoInvestigacion"
																required="required" value="12"></label>
															</div>
														</div>

														<div class="col-lg-2">
															<div class="form-group">
																<label class="control-label">GRUPO C (10 PUNTOS)
																	<input type="radio" class="form-control" name="PuntoGrupoInvestigacion" id="PuntoGrupoInvestigacion"
																	required="required" value="10"></label>
																</div>
															</div>

															<div class="col-lg-2">
																<div class="form-group">
																	<label class="control-label">COLCIENCIAS (6 PUNTOS)
																		<input type="radio" class="form-control" name="PuntoGrupoInvestigacion" id="PuntoGrupoInvestigacion"
																		required="required" value="6"></label>
																	</div>
																</div>

																<div class="col-lg-2">
																	<div class="form-group">
																		<label class="control-label">SEMILLERO (0 PUNTOS)
																			<input type="radio" class="form-control" name="PuntoGrupoInvestigacion" id="PuntoGrupoInvestigacion"
																			required="required" value="0"></label>
																		</div>
																	</div>
																</div>
																<br>

																<div class="row">
																	<div class="col-lg-12">
																		<h5>Seleccione la categoría como investigador.
																		</h5>
																	</div>
																</div>

																<div class="row">

																	<div class="col-lg-3">
																		<div class="form-group">
																			<label class="control-label">INVESTIGADOR SENIOR (10 PUNTOS)</label>
																			<input type="radio" class="form-control" name="PuntosInvestigador" id="PuntosInvestigador"
																			required="required" value="10">
																		</div>
																	</div>

																	<div class="col-lg-3">
																		<div class="form-group">
																			<label class="control-label">INVESTIGADOR ASOCIADO (5 PUNTOS)</label>
																			<input type="radio" class="form-control" name="PuntosInvestigador" id="PuntosInvestigador"
																			required="required" value="5">
																		</div>
																	</div>

																	<div class="col-lg-3">
																		<div class="form-group">
																			<label class="control-label">INVESTIGADOR JUNIOR (3 PUNTOS)</label>
																			<input type="radio" class="form-control" name="PuntosInvestigador" id="PuntosInvestigador"
																			required="required" value="3">
																		</div>
																	</div>

																	<div class="col-lg-3">
																		<div class="form-group">
																			<label class="control-label">NO ES INVESTIGADOR (0 PUNTOS)</label>
																			<input type="radio" class="form-control" name="PuntosInvestigador" id="PuntosInvestigador"
																			required="required" value="0">
																		</div>
																	</div>

																</div>
																<br>


																<div class="row">
																	<div class="col-lg-12">
																		<h5>Publicaciones, software y patentes
																		</h5>
																	</div>
																</div>
																<br>

																<div class="row">
																	<div class="col-lg-12">
																		<h5>Marque la opción o las opciones dependiendo de las publicaciones, sofware o patentes que esten asociadas al docente.
																		</h5>
																	</div>
																</div>

																<br>
																<div class="row">
																	<div class="col-lg-4">
																		<div class="form-group">
																			<label class="control-label">ARTICULOS EN REVISTAS INDEXADAS COLCIENCIAS (10 PUNTOS)</label>
																			<input type="checkbox" class="form-control" name="PuntosArticulosRevistasIdexadas" id="PuntosArticulosRevistasIdexadas"
																			value="10">
																		</div>
																	</div>

																	<div class="col-lg-4">
																		<div class="form-group">
																			<label class="control-label">ARTICULOS EN MEDIOS RECONOCIDOS (ISSN e ISBN) (5 PUNTOS)</label>
																			<input type="checkbox" class="form-control" name="PuntosArticulosMediosReconocidosISBN" id="PuntosArticulosMediosReconocidosISBN"
																			value="5">
																		</div>
																	</div>

																	<div class="col-lg-4">
																		<div class="form-group">
																			<label class="control-label">LIBROS CON ISBN (20 PUNTOS)</label>
																			<input type="checkbox" class="form-control" name="PuntosLibrosISBN" id="PuntosLibrosISBN"
																			value="20">
																		</div>
																	</div>
																</div>


																<div class="row">
																	<div class="col-lg-4">
																		<div class="form-group">
																			<label class="control-label">PARTICIPACION EN CAPITULOS DE LIBROS CON ISBN (5 PUNTOS)</label>
																			<input type="checkbox" class="form-control" name="PuntosCapitulosLibrosISBN" id="PuntosCapitulosLibrosISBN"
																			value="5">
																		</div>
																	</div>

																	<div class="col-lg-4">
																		<div class="form-group">
																			<label class="control-label">MODULOS CON ISBN (10 PUNTOS)</label>
																			<input type="checkbox" class="form-control" name="PuntosModulosISBN" id="PuntosModulosISBN"
																			value="10">
																		</div>
																	</div>

																	<div class="col-lg-4">
																		<div class="form-group">
																			<label class="control-label">SOFTWARE REGISTRADO CON DERECHO DE AUTOR (20 PUNTOS)</label>
																			<input type="checkbox" class="form-control" name="PuntosSoftwareDerechoAutor" id="PuntosSoftwareDerechoAutor"
																			value="20">
																		</div>
																	</div>
																</div>


																<div class="row">
																	<div class="col-lg-4">
																		<div class="form-group">
																			<label class="control-label">PATENTES (60 PUNTOS)</label>
																			<input type="checkbox" class="form-control" name="PuntosPatentes" id="PuntosPatentes"
																			value="60">
																		</div>
																	</div>

																	<div class="col-lg-4">
																		<div class="form-group">
																			<label class="control-label">ASESOR DE MONOGRAFIAS O PROYECTOS DE GRADO (5 PUNTOS)</label>
																			<input type="checkbox" class="form-control" name="PuntosAsesorMonografias" id="PuntosAsesorMonografias"
																			value="5">
																		</div>
																	</div>

																	<div class="col-lg-4">
																		<div class="form-group">
																			<label class="control-label">ASESORIAS DE PRACTICAS CON OPCION DE GRADO (2 PUNTOS)</label>
																			<input type="checkbox" class="form-control" name="PuntosAsesoriasPracticasOpcionGrado" id="PuntosAsesoriasPracticasOpcionGrado"
																			value="2">
																		</div>
																	</div>
																</div>

																<div class="modal-footer">
																	<button type="submit" name="insertaliquidacion" class="btn btn-success"><i
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
<script src="js/main.js?"></script>
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