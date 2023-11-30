<?php
require("class/Docente.php");
include "header.php";

$objdocente = new Docente();
$Docentes = $objdocente->Docentes();
if(sizeof($Docentes) > 0){
	?>
	<table id="clinica" class="display table table-bordered table-stripe" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>IDENTIFICACION</th>
				<th>PRIMER NOMBRE</th>
				<th>SEGUNDO NOMBRE</th>
				<th>PRIMER APELLIDO</th>
				<th>HOJA DE VIDA</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($Docentes as $row){
				?>
				<tr>
					<td><?php echo $row['Identificacion']; ?></td>
					<td><?php echo $row['PrimerNombre']; ?></td>
					<td><?php echo $row['SegundoNombre']; ?></td>
					<td><?php echo $row['PrimerApellido']; ?></td>
					<td><?php echo $row['SegundoApellido']; ?></td>
					<td>
						<a href="HojaVida.php?id=<?php echo $row['Identificacion'] ?>"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Hoja de vida</a>


					</td>
				</tr>
				<?php
			}
			?>
		</tbody>
	</table>
	<?php
}else{
	echo "No hay resultados...";
}

include "footer.php";