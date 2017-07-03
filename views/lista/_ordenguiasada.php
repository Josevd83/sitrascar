<style type="text/css">
.encabezado{
	font-family: "New Century", Schoolbook, serif;
	font-size: 26px;
	font-style: italic;
	font-weight: bold;
	text-align: center;
	text-decoration: underline;

}
.espacio-encabezado{
	padding-bottom: 50px;
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
	width:100%;
    border-collapse: collapse;
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

<p class="interlineado-1">SEÑORES:<br />
C.V.A.<br />
PRESENTE.<br /></p>

<p class="interlineado-1_15 texto-izquierda sangria">
Nos dirigimos a ustedes en la oportunidad de solicitar la emisión de las guías Sada para la asignación de La C.V.A. azúcar S.A. de un total de 7.000 Toneladas con destinos a Caja Seca y Santa Clara. De la cual solicitamos el siguiente destino:</p>

<ul>
	<li>
		<p>INDUSTRIA AZUCARERA SANTA CLARA<br />
		RIF: J30038757-7<br />
		CODIGO SICA: 1570<br />
		TONELADAS  ASIGNADAS:  3.000<br />
		BL03</p>
	</li>
</ul>

<table>
	<tr>
		<th>Nro</th>
		<th>NOMBRE Y APELLIDO</th>
		<th>C.I.</th>
		<th>Placa<br />Chuto</th>
		<th>Placa<br />Volqueta</th>
		<th>GUIA</th>
		<th>TELEFONO</th>
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
	?>
	<tr>
   	  <td class="datos"><?= $contador ?></td>
    	<td class="datos"><?= $nombre1." ".$nombre2." ".$apellido1." ".$apellido2 ?></td>
    	<td class="datos"><?= $cedula ?></td>
    	<td class="datos"><?= $placaChuto ?></td>
    	<td class="datos"><?= $placaRemolque ?></td>
    	<td class="datos"></td>
    	<td class="datos"><?= $telefono1 ?></td>
	</tr>
    <?php $contador ++; ?>
    <?php endforeach; ?>
</table>

<p>Listado No. <?= $modelLista->ID ?></p>

<p class="texto-derecha">Atentamente,</p>

<p class="texto-derecha">Marilu Burgos<br />
	Operaciones
</p>