<?php
require('fpdf/fpdf.php');
require("class/Docente.php");
require("class/ConsultaDocente.php");
class PDF extends FPDF
{
	var $widths;
	var $aligns;

	function SetWidths($w)
	{

		$this->widths=$w;
	}

	function SetAligns($a)
	{

		$this->aligns=$a;
	}

	function Row($data)
	{

		$nb=0;
		for($i=0;$i<count($data);$i++)
			$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
		$h=8*$nb;

		$this->CheckPageBreak($h);

		for($i=0;$i<count($data);$i++)
		{
			$w=$this->widths[$i];
			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';

			$x=$this->GetX();
			$y=$this->GetY();


			$this->Rect($x,$y,$w,$h);

			$this->MultiCell($w,8,$data[$i],0,$a,'true');

			$this->SetXY($x+$w,$y);
		}

		$this->Ln($h);
	}

	function CheckPageBreak($h)
	{

		if($this->GetY()+$h>$this->PageBreakTrigger)
			$this->AddPage($this->CurOrientation);
	}

	function NbLines($w,$txt)
	{

		$cw=&$this->CurrentFont['cw'];
		if($w==0)
			$w=$this->w-$this->rMargin-$this->x;
		$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
		$s=str_replace("\r",'',$txt);
		$nb=strlen($s);
		if($nb>0 and $s[$nb-1]=="\n")
			$nb--;
		$sep=-1;
		$i=0;
		$j=0;
		$l=0;
		$nl=1;
		while($i<$nb)
		{
			$c=$s[$i];
			if($c=="\n")
			{
				$i++;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
				continue;
			}
			if($c==' ')
				$sep=$i;
			$l+=$cw[$c];
			if($l>$wmax)
			{
				if($sep==-1)
				{
					if($i==$j)
						$i++;
				}
				else
					$i=$sep+1;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
			}
			else
				$i++;
		}
		return $nl;
	}

	function Header()
	{
		$this->SetFont('Arial','B',12);
		$this->SetTextColor(66,165,66,25); 
		$this->Text(20,15,'UNIVERSIDAD POPULAR DEL CESAR, FORMATO DE PUNTOS Y LIQUIDACION.',0,'B', 0);
		$this->Ln(10);
	}

	function Footer()
	{
		$this->SetY(-15);
		$this->SetFont('Arial','B',8);
		$this->Cell(100,10,'Realizado por KGC 2022, todos los derechos reservados.',0,0,'L');
	}

}

$DocenteIdentificacion= $_GET['id'];

$objdocente = new Docente();

$docente = $objdocente->DocenteIdentificacion($DocenteIdentificacion);

$pdf=new Pdf();

$pdf->AddPage();

$pdf->SetMargins(20,20,20);

$pdf->Ln(10);

$pdf->SetFont('Arial','',12);

$pdf->Cell(30,6,'Cedula: ',0,0);
$pdf->Cell(0,6,$docente['Identificacion'],0,1);
$pdf->Cell(30,6,'Nombre: ',0,0);
$pdf->Cell(0,6,$docente['PrimerNombre'].' '.$docente['PrimerApellido'].' '.$docente['SegundoApellido'],0,1);
$pdf->Cell(30,6,'Sexo: ',0,0);
$pdf->Cell(0,6,$docente['Sexo'],0,1);
$pdf->Cell(30,6,'Direccion: ',0,0); 
$pdf->Cell(0,6,$docente['Direccion'],0,1);
$pdf->Image(ConexionNomina::ruta().'upload/img/'.$docente['Foto'],155,20,30,30);
$pdf->Ln(10);

$parrafo="Después de haber pasado por una meticulosa revisión de los datos y documentos suministrados por el/la aspirante a docente, se procede a notificar el total de puntos obtenidos y el total de la liquidación, si llega a quedar contratado como docente de la Universidad Popular Del cesar, se le notificará vía correo los pasos a seguir.
NOTA: Las bonificaciones son calculadas con el factor de un S.M.M.L.V que es igual a 1.000.000 pesos COP.
A continuación, podrá encontrar una lista detallada con los ítems asociados a su solicitud, si tiene alguna duda o reclamo acercarse a la oficina de recursos humanos, bloque 2 tercer piso, sede Hurtado.";

$parrafo = utf8_decode($parrafo);
$pdf->SetFont('Arial','',12);
$pdf->MultiCell(165,5,$parrafo);



$Experiencia="AÑOS DE EXPERIENCIA";
$Experiencia = utf8_decode($Experiencia);

$Titulos="Títulos en el área de desempeño";
$Titulos = utf8_decode($Titulos);


$CategoriaDocente="Categoría del docente";
$CategoriaDocente = utf8_decode($CategoriaDocente);

$CategoriaInvestigador="Categoría como investigador";
$CategoriaInvestigador = utf8_decode($CategoriaInvestigador);

$Grupo="Grupo de investigación";
$Grupo = utf8_decode($Grupo);




$Categoria="CATEGORÍA";
$Categoria = utf8_decode($Categoria);

$pdf->Ln(5);
$pdf->SetWidths(array(55, 30, 40, 40));
$pdf->SetFont('Arial','B',10);		
$pdf->SetFillColor(66,165,66,255);
$pdf->SetTextColor(255);

$pdf->Row(array('DESCRIPCION', 'PUNTAJE', 'BONIFICACION', 'SUBTOTAL'));

$objconsultadocente = new ConsultaDoocente();
$consultas = $objconsultadocente->consultasDocentes($DocenteIdentificacion);


$i = 0;

$n=0;
foreach ($consultas as $consulta)
{

	if ($consulta['PuntoGrupoInvestigacion']==20) 
	{
		$AuxBonificacionGrupoInvestigacion=0.56;
	}
	if ($consulta['PuntoGrupoInvestigacion']==15) 
	{
		$AuxBonificacionGrupoInvestigacion=0.47;
	}
	if ($consulta['PuntoGrupoInvestigacion']==12) 
	{
		$AuxBonificacionGrupoInvestigacion=0.42;
	}
	if ($consulta['PuntoGrupoInvestigacion']==10) 
	{
		$AuxBonificacionGrupoInvestigacion=0.38;
	}
	if ($consulta['PuntoGrupoInvestigacion']==6) 
	{
		$AuxBonificacionGrupoInvestigacion=0.33;
	}
	if ($consulta['PuntoGrupoInvestigacion']==0) 
	{
		$AuxBonificacionGrupoInvestigacion=0.19;
	}

	$n++;
	$pdf->SetFont('Arial','',9);

	if($i%2 == 1)
	{
		$pdf->SetFillColor(212,204,202);
		$pdf->SetTextColor(0);
		$pdf->Row(array($Titulos, $consulta['PuntosAreaDesempeño'], $consulta['BonificacionAreaDesempeño'], $consulta['TotalBonificacionAreaDesempeño']));
		
		$pdf->Row(array($CategoriaDocente, $consulta['PuntosCategoriaDocente'], $consulta['RemuneracionCategoriaDocente'], $consulta['TotalLiquidarCategoriaDocente']));

		$pdf->Row(array("Experiencia calificada", $consulta['PuntosTotalesExperienciaDocente'], "N/A", "N/A"));

		$pdf->Row(array($Grupo, $consulta['PuntoGrupoInvestigacion'], $AuxBonificacionGrupoInvestigacion, $consulta['TotalBonificacionInvestigacion']));
		
		$pdf->Row(array($CategoriaInvestigador, $consulta['PuntosInvestigador'], "N/A", "N/A"));
		
		$i++;
	}
	else
	{
		$pdf->SetFillColor(212,204,202);
		$pdf->SetTextColor(0);
		$pdf->Row(array($Titulos, $consulta['PuntosAreaDesempeño'], $consulta['BonificacionAreaDesempeño'], $consulta['TotalBonificacionAreaDesempeño']));
		
		$pdf->Row(array($CategoriaDocente, $consulta['PuntosCategoriaDocente'], $consulta['RemuneracionCategoriaDocente'], $consulta['TotalLiquidarCategoriaDocente']));

		$pdf->Row(array("Experiencia calificada", $consulta['PuntosTotalesExperienciaDocente'], "N/A", "N/A"));

		$pdf->Row(array($Grupo, $consulta['PuntoGrupoInvestigacion'], $AuxBonificacionGrupoInvestigacion, $consulta['TotalBonificacionInvestigacion']));
		
		$pdf->Row(array($CategoriaInvestigador, $consulta['PuntosInvestigador'], "N/A", "N/A"));
		
		$i++;
	}
	$pdf->Ln(10);
	$parrafo="Publicaciones, software y patentes.";

	$parrafo = utf8_decode($parrafo);
	$pdf->SetFont('Arial','',12);
	$pdf->MultiCell(165,5,$parrafo);
}


$pdf->Ln(5);
$pdf->SetWidths(array(115, 50));
$pdf->SetFont('Arial','B',10);		
$pdf->SetFillColor(66,165,66,255);
$pdf->SetTextColor(255);
$pdf->Row(array('DESCRIPCION', 'PUNTAJE'));
$objconsultadocente = new ConsultaDoocente();
$consultas = $objconsultadocente->consultasDocentes($DocenteIdentificacion);
$i = 0;

$n=0;
foreach ($consultas as $consulta)
{



	$n++;
	$pdf->SetFont('Arial','',9);

	if($i%2 == 1)
	{
		$pdf->SetFillColor(200,175,175);
		$this->SetTextColor(66,165,66,25); 
		$pdf->SetTextColor(0);
		$pdf->Row(array($Titulos, $consulta['PuntosAreaDesempeño']));
		$i++;
	}
	else
	{
		$pdf->SetFillColor(212,204,202);
		$pdf->SetTextColor(0);
		$pdf->Row(array("Articulos en revistas indexadas por COLCIENCIAS", $consulta['PuntosArticulosRevistasIdexadas']));
		$pdf->Row(array("Articulos en medios reconocidos (ISSN e ISBN)", $consulta['PuntosArticulosMediosReconocidosISBN']));
		$pdf->Row(array("Libros con ISBN", $consulta['PuntosLibrosISBN']));
		$pdf->Row(array("Participacion en capitulos de libros con ISBN", $consulta['PuntosCapitulosLibrosISBN']));
		$pdf->Row(array("Modulos con ISBN", $consulta['PuntosModulosISBN']));
		$pdf->Row(array("Software registrado con derecho de autor", $consulta['PuntosSoftwareDerechoAutor']));
		$pdf->Row(array("Patentes", $consulta['PuntosPatentes']));
		$pdf->Row(array("Asesor de monografias o proyecto de grado", $consulta['PuntosAsesorMonografias']));
		$pdf->Row(array("Asesorias de practicas con opcion de grado", $consulta['PuntosAsesoriasPracticasOpcionGrado']));


		
		$i++;
	}
	$pdf->Ln(10);
	$pdf->SetFont('Arial','',12);
	$pdf->MultiCell(165,5,"Para finalizar nos permitimos informar que el aspirante a docente obtuvo un puntaje total de ".''. $docente['TotalPuntosDocente'].''." y el total de la liquidacion es de ".''.$docente['TotalLiquidacionDocente'].''." pesos COP.

	Este formato fue generado el dia: ".''.$consulta['FechaRegistro']);
	$pdf->Ln(10);

	$pdf->Image(ConexionNomina::ruta().'upload/img/'.$docente['FotoFirma'],65,60,70,25);



}

$pdf->Output('Formato.pdf','I');
?>
