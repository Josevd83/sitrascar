<style type="text/css">
.encabezado{
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
.rif{
    font-size: 12px;
    text-align: right;
    width: 80%;
}
.espacio-encabezado{
    padding-bottom: 85px;
}
p{
    font-size: 11px;
}
.texto-derecha{
    text-align: right;
}
.interlineado-1{
    line-height:1;
}
.interlineado-1_15{
    line-height:1.15;
}
.texto-izquierda{
    text-align: left;
}
.sangria{
    text-indent: 2em
}
table {
    margin: 0 auto;
    border-collapse: collapse;
    width:80%;
}

table, th, td {
    border: 1px solid black;
    text-align: center;
    font-size: 9px;
}
table th{
    padding: 5px;
}
table td{
    padding: 5px 2px 5px 2px;
}
</style>

<div class="espacio-encabezado"></div>
<?php $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");?>
<p class="texto-derecha">Puerto Cabello, <?= date('d') ?> de <?= $meses[date('n')-1] ?> de <?= date('Y') ?></p>

<p class="interlineado-1_15 texto-izquierda">
CUSPAL C.A.<br />
<b><i>CORPORACION UNICA DE SERVICIOS PRODUCTIVOS Y ALIMENTICIOS C.A.</i></b><br />
PRESENTE.
</p>

<p class="interlineado-1_15 texto-izquierda sangria">Nos dirigimos a ustedes en la oportunidad de solicitar la emisión de las guías Sada para la asignación de La C.V.A. azúcar S.A. de 7.000 Toneladas con destino SANTA CLARA Y CAJA SECA de la cual solicitamos el siguiente destino: </p>

<ul>
    <li>
        <p>CENTRAL VENEZUELA C.A.<br />
        RIF: J07000331-6<br />
        CODIGO SICA: 8885<br />
        TONELADAS  ASIGNADAS:  4.000<br />
        BL03</p>
    </li>
</ul>

<table>
    <tr>
        <th>Nro</th>
        <th>NOMBRE Y APELLIDO</th>
        <th>C.I.</th>
        <th>Placa<br />Chuto</th>
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
	?>
	<tr>
   	  <td class="datos"><?= $contador ?></td>
    	<td class="datos"><?= $nombre1." ".$nombre2." ".$apellido1." ".$apellido2 ?></td>
    	<td class="datos"><?= $cedula ?></td>
    	<td class="datos"><?= $placaChuto ?></td>
	</tr>
    <?php $contador ++; ?>
    <?php endforeach; ?>
</table>

<p>Listado No. <?= $modelLista->ID ?></p>

<p class="texto-derecha">Atentamente,</p>

<p class="texto-derecha">Marilu Burgos<br />
    Gerente de Operaciones<br />
    Cel 0414-4135959
</p>