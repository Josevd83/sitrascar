<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
//use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\DepDrop;
use yii\web\View;
//use softark\duallistbox\DualListbox;

/* @var $this yii\web\View */
/* @var $model app\models\Lista */
/* @var $form yii\widgets\ActiveForm */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<style type="text/css">
.titulo3 {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 14px;
	font-weight: bold;
	text-align: center;
	border: thin solid #000;
}
.titulo1{
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
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
	font-weight: normal;
	border: 1px solid #000;
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
	border: 1px solid #000;
}
</style>
<body>
<p align="center" class="titulo">TRANSPORTE Y MAQUINARIAS 07-24, C.A.</p>
<p align="center" class="titulo">RIF. J-40837971-6</p>

<table width="600">
	<tr>
    	<td width="200" class="titulo2">LISTADO DE CHOFERES:
        </td>
    	<td width="400" class="datos"><?= "Nº ".$modelLista->ID." ".$modelDistribucion->cENTRALES->NOMBRE ?>
        </td>
    </tr>
	<tr>
    	<td class="titulo2">CODIGO SICA:
        </td>
    	<td class="datos"><?= $modelDistribucion->CODIGO_SICA ?>
        </td>
    </tr>
	<tr>
    	<td class="titulo2">DESTINO:
        </td>
    	<td class="datos"><?= $modelDistribucion->cENTRALES->NOMBRE ?>
        </td>
    </tr>
	<tr>
    	<td class="titulo2">RIF:
        </td>
    	<td class="datos"><?= $modelDistribucion->cENTRALES->RIF ?></td>
    </tr>
</table>

<table width="1000">
	<tr>
    	<td class="titulo3">Nº</td>
    	<td class="titulo3">NOMBRES</td>
        <td class="titulo3">APELLIDOS</td>
    	<td class="titulo3">C.I.</td>
    	<td class="titulo3">PLACA CHUTO</td>
    	<td class="titulo3">PLACA VOLQUETA</td>
    	<td class="titulo3">TELEFONO</td>
    	<td class="titulo3">TELEFONO</td>
        <td class="titulo3">OBSERVACIONES</td>  
    </tr>
    <?php $contador = 1; ?>
    <?php foreach($modelFlete as $flete): ?>
    <?php
		$nombre1 = $flete->eMPRESACHOFER->cHOFER->PRIMER_NOMBRE;
		$nombre2 = $flete->eMPRESACHOFER->cHOFER->SEGUNDO_NOMBRE;
		$apellido1 = $flete->eMPRESACHOFER->cHOFER->PRIMER_APELLIDO;
		$apellido2 = $flete->eMPRESACHOFER->cHOFER->SEGUNDO_APELLIDO;
		$cedula = $flete->eMPRESACHOFER->cHOFER->CEDULA;
		$placaChuto = $flete->eMPRESACHOFER->vEHICULO->PLACA_CHUTO;
		$placaRemolque = $flete->eMPRESACHOFER->vEHICULO->PLACA_REMOLQUE;
		$telefono1 = $flete->eMPRESACHOFER->cHOFER->TELEFONO_1;
		$telefono2 = $flete->eMPRESACHOFER->cHOFER->TELEFONO_2;
	?>
	<tr>
   	  <td class="datos"><?= $contador ?></td>
    	<td class="datos"><?= $nombre1." ".$nombre2 ?></td>
        <td class="datos"><?= $apellido1." ".$apellido2 ?></td>
    	<td class="datos"><?= $cedula ?></td>
    	<td class="datos"><?= $placaChuto ?></td>
    	<td class="datos"><?= $placaRemolque ?></td>
    	<td class="datos"><?= $telefono1 ?></td>
    	<td class="datos"><?= $telefono2 ?></td>
        <td class="datos"></td>  
	</tr>
    <?php $contador ++; ?>
    <?php endforeach; ?>
</table>

</body>
</html>