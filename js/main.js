const SMMLV=1000000;
const E1=20;
const E2=30;
const M1=40;
const M2=60;
const D1=80;
const D2=120;
const BonificacionMensualEspecializacion=0.10;
const BonificacionMensualMaestria=0.45;
const BonificacionDoctorado=0.90;

function AsignarPuntoAreaDesempeño(value){
  if(value !== "Seleccione")
  {
    document.getElementById("PuntosAreaDesempeño").value= value;
  }
  if(value == "Seleccione")
  {
    document.getElementById("PuntosAreaDesempeño").value= "Seleccione área de desempeño";
    document.getElementById("BonificacionAreaDesempeño").value="Seleccione área de desempeño";
    document.getElementById("TotalBonificacionAreaDesempeño").value="Seleccione área de desempeño";
  }

  if(value == "E1")
  {
    document.getElementById("PuntosAreaDesempeño").value= E1;
    document.getElementById("BonificacionAreaDesempeño").value= BonificacionMensualEspecializacion;
    document.getElementById("TotalBonificacionAreaDesempeño").value= BonificacionMensualEspecializacion*SMMLV;

  }

  if(value == "E2")
  {

    document.getElementById("PuntosAreaDesempeño").value= E2;
    document.getElementById("BonificacionAreaDesempeño").value= BonificacionMensualEspecializacion;
    document.getElementById("TotalBonificacionAreaDesempeño").value= BonificacionMensualEspecializacion*SMMLV;

  }

  if(value == "M1")
  {
    document.getElementById("PuntosAreaDesempeño").value= M1;
    document.getElementById("BonificacionAreaDesempeño").value= BonificacionMensualMaestria;
    document.getElementById("TotalBonificacionAreaDesempeño").value= BonificacionMensualMaestria*SMMLV;

  }

  if(value == "M2")
  {
    document.getElementById("PuntosAreaDesempeño").value= M2;
    document.getElementById("BonificacionAreaDesempeño").value= BonificacionMensualMaestria;
    document.getElementById("TotalBonificacionAreaDesempeño").value= BonificacionMensualMaestria*SMMLV;

  }

  if(value == "D1")
  {
    document.getElementById("PuntosAreaDesempeño").value= D1;
    document.getElementById("BonificacionAreaDesempeño").value= BonificacionDoctorado;
    document.getElementById("TotalBonificacionAreaDesempeño").value= BonificacionDoctorado*SMMLV;
  }
  if(value == "D2")
  {
    document.getElementById("PuntosAreaDesempeño").value= D2;
    document.getElementById("BonificacionAreaDesempeño").value= BonificacionDoctorado;
    document.getElementById("TotalBonificacionAreaDesempeño").value= BonificacionDoctorado*SMMLV;
  }
}


//CONSTANTES PARA ASIGNACION DE PUNTOS POR CATEGORIA
const PuntosAuxiliar=27;
const PuntosAsistente=58;
const PuntosAsociado=74;
const PuntosTitular=96;

const RemunueracionAuxiliarTiempoCompleto=2.645;
const RemunueracionAuxiliarMedioTiempo=1.509;

const RemuneracionAsistenteTiempoCompleto=3.125;
const RemuneracionAsistenteMedioTiempo=1.749;

const RemunueracionAsociadoTiempoCompleto=3.606;
const RemunueracionAsociadoMedioTiempo=1.990;

const RemunueracionTitularTiempoCompleto=3.918;
const RemunueracionTitularMedioTiempo=2.146;



function AsignarPuntoCategoriaDocente(value){
  if(value !== "Seleccione")
  {
    document.getElementById("PuntosCategoriaDocente").value= value;
  }
  if(value == "Seleccione")
  {
    document.getElementById("PuntosCategoriaDocente").value= "Seleccione área de desempeño";
    document.getElementById("RemuneracionCategoriaDocente").value="Seleccione área de desempeño";
    document.getElementById("TotalLiquidarCategoriaDocente").value="Seleccione área de desempeño";
  }

  if(value == "Auxiliar de tiempo completo")
  {
    document.getElementById("PuntosCategoriaDocente").value= PuntosAuxiliar;
    document.getElementById("RemuneracionCategoriaDocente").value= RemunueracionAuxiliarTiempoCompleto;
    document.getElementById("TotalLiquidarCategoriaDocente").value= RemunueracionAuxiliarTiempoCompleto*SMMLV;
  }
  if(value == "Auxiliar de medio tiempo")
  {
    document.getElementById("PuntosCategoriaDocente").value= PuntosAuxiliar;
    document.getElementById("RemuneracionCategoriaDocente").value= RemunueracionAuxiliarMedioTiempo;
    document.getElementById("TotalLiquidarCategoriaDocente").value= RemunueracionAuxiliarMedioTiempo*SMMLV;
  }

  if(value == "Asistente de tiempo completo")
  {
    document.getElementById("PuntosCategoriaDocente").value= PuntosAsistente;
    document.getElementById("RemuneracionCategoriaDocente").value= RemuneracionAsistenteTiempoCompleto;
    document.getElementById("TotalLiquidarCategoriaDocente").value= RemuneracionAsistenteTiempoCompleto*SMMLV;
  }

  if(value == "Asistente de medio tiempo")
  {
    document.getElementById("PuntosCategoriaDocente").value= PuntosAsistente;
    document.getElementById("RemuneracionCategoriaDocente").value= RemuneracionAsistenteMedioTiempo;
    document.getElementById("TotalLiquidarCategoriaDocente").value= RemuneracionAsistenteMedioTiempo*SMMLV;
  }

  if(value == "Asociado de tiempo completo")
  {
    document.getElementById("PuntosCategoriaDocente").value= PuntosAsociado;
    document.getElementById("RemuneracionCategoriaDocente").value= RemunueracionAsociadoTiempoCompleto;
    document.getElementById("TotalLiquidarCategoriaDocente").value= RemunueracionAsociadoTiempoCompleto*SMMLV;
  }

  if(value == "Asociado de medio tiempo")
  {
    document.getElementById("PuntosCategoriaDocente").value= PuntosAsociado;
    document.getElementById("RemuneracionCategoriaDocente").value= RemunueracionAsociadoMedioTiempo;
    document.getElementById("TotalLiquidarCategoriaDocente").value= RemunueracionAsociadoMedioTiempo*SMMLV;
  }

  if(value == "Titular de tiempo completo")
  {
    document.getElementById("PuntosCategoriaDocente").value= PuntosTitular;
    document.getElementById("RemuneracionCategoriaDocente").value= RemunueracionTitularTiempoCompleto;
    document.getElementById("TotalLiquidarCategoriaDocente").value= RemunueracionTitularTiempoCompleto*SMMLV;
  }

  if(value == "Titular de medio tiempo")
  {
    document.getElementById("PuntosCategoriaDocente").value= PuntosTitular;
    document.getElementById("RemuneracionCategoriaDocente").value= RemunueracionTitularMedioTiempo;
    document.getElementById("TotalLiquidarCategoriaDocente").value= RemunueracionTitularMedioTiempo*SMMLV;
  }
}


//CONSTANTES PARA ASIGNACION DE PUNTOS POR EXPERIENCIA CALIFICADA
const PuntosExperienciaDocenteTiempoCompleto=4;
const PuntosExperienciaDocenteMedioTiempo=2;
const PuntosExperienciaDocenteCatedra=1;
const PuntosExperienciaProfesional=2;



function AsignarPuntoExperienciaDocente(value){
  if(value !== "Seleccione")
  {
    document.getElementById("PuntosAñoExperiencia").value= value;
  }
  if(value == "Seleccione")
  {
    document.getElementById("PuntosAñoExperiencia").value= "Seleccione el nivel de experiencia";
    document.getElementById("CantidadAniosExperiencia").value="";
    document.getElementById("PuntosTotalesExperienciaDocente").value="";
  }

  if(value == "Docente de tiempo completo")
  {
    document.getElementById("PuntosAñoExperiencia").value=PuntosExperienciaDocenteTiempoCompleto;
    document.getElementById("CantidadAniosExperiencia").value="";
    document.getElementById("PuntosTotalesExperienciaDocente").value="";
  }

  if(value == "Docente de medio tiempo" || value == "Experiencia profesional")
  {
    document.getElementById("PuntosAñoExperiencia").value=PuntosExperienciaDocenteMedioTiempo;
    document.getElementById("CantidadAniosExperiencia").value="";
    document.getElementById("PuntosTotalesExperienciaDocente").value="";
  }

  if(value == "Docente de catedra")
  {
    document.getElementById("PuntosAñoExperiencia").value=PuntosExperienciaDocenteCatedra;
    document.getElementById("CantidadAniosExperiencia").value="";
    document.getElementById("PuntosTotalesExperienciaDocente").value="";
  }

/*
  var combo = document.getElementById("TipoExperienciaDocente");
  var selected = combo.options[combo.selectedIndex].text;
  //alert(selected);
  var ValorCmb=value;
  */
}



function CalcularTotalExperienciaCalificada(PuntosAñoExperiencia, CantidadAniosExperiencia, PuntosTotalesExperienciaDocente) {

  if(CantidadAniosExperiencia<=0 || isNaN(CantidadAniosExperiencia))
  {
    alert("... VERIFIQUE CANTIDAD DE AÑOS DE EXPERIENCIA ...");
    document.getElementById("CantidadAniosExperiencia").value="";
    document.getElementById("PuntosTotalesExperienciaDocente").value="";
  }
  else
  {
    var PuntosTotalesExperienciaDocente = 0;
    PuntosTotalesExperienciaDocente = parseInt(PuntosAñoExperiencia) * parseInt(CantidadAniosExperiencia);
    document.getElementById("PuntosTotalesExperienciaDocente").value = PuntosTotalesExperienciaDocente;
    return PuntosTotalesExperienciaDocente;
  }
}


function InyectarJsonExperienciaCalificada() {

  var PuntosAñoExperiencia = document.getElementById("PuntosAñoExperiencia").value;
  var CantidadAniosExperiencia = document.getElementById("CantidadAniosExperiencia").value;
  var PuntosTotalesExperienciaDocente=CalcularTotalExperienciaCalificada(PuntosAñoExperiencia, CantidadAniosExperiencia, PuntosTotalesExperienciaDocente);
  console.log(PuntosTotalesExperienciaDocente);

  var json = {
    "PuntosAñoExperiencia":PuntosAñoExperiencia,
    "CantidadAniosExperiencia":CantidadAniosExperiencia,
    "PuntosTotalesExperienciaDocente":PuntosTotalesExperienciaDocente
  }
  return json;
}


function BotonCalcularPuntosExperienciaDocente(json) {
  var Total = InyectarJsonExperienciaCalificada();
}



/*
var Auxiliar=0;
var Contador=0;

const PuntosA1=20;
const PuntosA=15;
const PuntosB=12;
const PuntosC=10;
const PuntosReconocidosColciencias=6;


var CheckBoxGrupoInvestigacionA1 = document.getElementById('GrupoInvestigacionA1');
CheckBoxGrupoInvestigacionA1.addEventListener("change", ValidarCheckGrupoInvestigacionA1, false);

function ValidarCheckGrupoInvestigacionA1(){
  var CheckedGrupoInvestigacionA1 = CheckBoxGrupoInvestigacionA1.checked;
  if(CheckedGrupoInvestigacionA1)
  {
    Auxiliar=Auxiliar+PuntosA1;
    Contador=Contador+1;
  }
  else
  {
    Auxiliar=Auxiliar-PuntosA1;
    Contador=Contador-1;
  }
 // console.log(Contador);
}
*/


var CheckBoxGrupoInvestigacionA = document.getElementById('PuntoGrupoInvestigacion');

function test(value){
  var CheckedGrupoInvestigacionA = CheckBoxGrupoInvestigacionA.checked;
  if(value !="" & CheckedGrupoInvestigacionA)
  {
    console.log(value);
  }
}
