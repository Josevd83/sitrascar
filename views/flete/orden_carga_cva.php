<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Orden de Carga CVA</title>

</head>

<style type="text/css">
.titulo3 {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 14px;
	font-weight: bold;
	text-align: center;
}
.titulo 1{
    font-family: "New Century", Schoolbook, serif;
    font-size: 26px;
    font-style: italic;
    font-weight: bold;
    margin: 0 auto;
    text-align: center;
    text-decoration: underline;
    width: 80%;
    line-height:0.1;
}
table {
	border: 1px solid black;
	font-size: 14px;
}
table th{
	padding: 5px;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 14px;
	font-style: normal;
	line-height: normal;
	font-weight: bold;
	font-variant: normal;
	color: #000;
	text-align: left;
}
.datos{
	padding: 5px 2px 5px 2px;
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #000;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
	font-weight: normal;
}
.titulo {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 16px;
	font-style: normal;
	font-weight: bold;
}
.titulo2 {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 14px;
	font-style: normal;
	font-weight: bold;
}
.espacio-encabezado{
    padding-bottom: 85px;
}
</style>
<body>
<div class="espacio-encabezado"></div>
<table width="800" align="center">
    <tr>
    	<td colspan="3">Logo Gobierno Bolivariano</td>
        <td colspan="3">Logo CVA</td>
    </tr>
    <tr>
    	<td width="17%"></td>
        <td width="16%"></td>
        <td width="17%"></td>
        <td width="17%"></td>
        <td width="16%"></td>
        <td width="17%"></td>      
    </tr>
    <tr>
    	<td colspan="6" align="center" class="titulo">ORDEN DE CARGA
        </td>   
    </tr>
    <tr>
    	<td colspan="3" align="right" class="titulo2">LISTA NUMERO:
        </td>
        <td colspan="3" align="left"><?= $modelLista->ID ?>
        </td>
    </tr>
    <tr>
   	  <th>Número</th>
        <td class="datos"><?= $modelFlete->ID ?></td>
        <td colspan="2">&nbsp;</td>
        <th>GUIA SADA</th>
        <td class="datos"><?= $modelFlete->GUIA_SADA ?></td>
    </tr>
    <tr>
    	<td colspan="4">&nbsp;</td>
        <th>Fecha</th>
        <td class="datos">17/06/17</td>      
    </tr>
    <tr>
    	<th colspan="4">Por medio de la Presente se hace constar que el ciudadano:</th>
        <th>Numero</th>
        <td class="datos">CVA - OC - 001</td>      
    </tr>
    <tr>
    	<td class="datos"><?= $modelFlete->eMPRESACHOFER->cHOFER->PRIMER_NOMBRE ?></td>
        <td class="datos"><?= $modelFlete->eMPRESACHOFER->cHOFER->SEGUNDO_NOMBRE ?></td>
        <td class="datos"><?= $modelFlete->eMPRESACHOFER->cHOFER->PRIMER_APELLIDO ?></td>
        <td class="datos"><?= $modelFlete->eMPRESACHOFER->cHOFER->SEGUNDO_APELLIDO ?></td>
        <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
    	<th>Cedula Nro:</th>
        <td><?= $modelFlete->eMPRESACHOFER->cHOFER->CEDULA ?></td>
        <th colspan="2" align="right">Esta Autorizado a Cargar: </th>
        <td colspan="2" class="datos"><?= $modelCarga->rUBROS->NOMBRE ?></td>
    </tr>
    <tr>
    	<th>Desde:</th>
        <td colspan="5" class="datos">Bolipuertos, Puerto Cabellos, Estado Carabobo</td>
    </tr>
    <tr>
    	<th>Hasta:</th>
        <td colspan="5" class="datos"><?= $modelDistribucion->cENTRALES->NOMBRE ?></td>
    </tr>
    <tr>
    	<td colspan="4">&nbsp;</td>
        <td align="right" class="datos">27</td>
        <td class="datos">Toneladas</td>      
    </tr>
    <tr>
    	<td colspan="6" align="center" class="titulo2">DATOS DEL CAMION</td>
    </tr>
    <tr>
    	<th>Placa Chuto:</th>
        <td colspan="2" class="datos"><?= $modelFlete->eMPRESACHOFER->vEHICULO->PLACA_CHUTO ?></td>
        <th>Muelle Numero:</th>
        <td colspan="2" class="datos"><?= $modelCarga->MUELLE ?></td>
    </tr>
    <tr>
    	<th>Placa Volqueta:</th>
        <td colspan="2" class="datos"><?= $modelFlete->eMPRESACHOFER->vEHICULO->PLACA_REMOLQUE ?></td>
        <th>Buque:</th>
        <td colspan="2" class="datos"><?= $modelCarga->bUQUE->NOMBRE ?></td>
    </tr>
    <tr>
    	<td colspan="6">&nbsp;</td>
    </tr>
    <tr>
    	<th>Transporte:</th>
        <td colspan="3" class="datos">TRANSPORTE Y MAQUINARIAS 07-24, C.A.</td>
        <td colspan="2">BL1</td>
    </tr>
    <tr>
    	<td colspan="6">&nbsp;</td>
    </tr>
    <tr>
    	<td colspan="2">&nbsp;</td>
        <th colspan="2" align="center" valign="middle" class="titulo3">Movilizacion de Azucar Crudo</th>
        <td colspan="2" class="datos">&nbsp;</td>
    </tr>
    <tr>
    	<td colspan="2">&nbsp;</td>
        <th colspan="2" align="center" class="titulo3">CVA Azucar, S.A.</thd>
        <th colspan="2" align="center" valign="middle" class="titulo3">Firma</th>
    </tr>
</table>

</body>
</html>
